<?php
/**
 * Created by PhpStorm.
 * User: svenb
 * Date: 6/9/16
 * Time: 9:25 AM
 */

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

$loader = new Loader();

$loader->registerDirs(
    array(
        __DIR__ . '/models/'
    )
)->register();

$di = new FactoryDefault();

// Set up the database service
$di->set('db', function () {
    return new PdoMysql(
        array(
            "host"     => "cfootballproduction.cpmcch5mnlup.us-west-2.rds.amazonaws.com",
            "username" => "cFootball",
            "password" => "cFootballDevelopment",
            "dbname"   => "cFootball_prod"
        )
    );
});

$app = new Micro($di);

// Define the routes here

$app->get('/predict', function() use ($app){
    $app->response->setHeader("Content-Type", "application/json");
    $teamGoodness = getTeamGoodness();
    $games = Games::find();
    //let's predict the season with these numbers.
    //amusingly, the "official" dataset includes teamids without corresponding teams.
    $victor = array();
    $numCorrect = 0;
    foreach($games as $game){
        $correct = false;
        if($game->score1 == $game->score2){
            $winner = 0;
        } else{
            $winner = $game->score1 < $game->score2 ? $game->team2_id : $game->team1_id;
        }

        if($game->score1 != $game->score2){
            $pwinner = $teamGoodness[$game->team1_id] < $teamGoodness[$game->team2_id] ? $game->team2_id : $game->team1_id;
        } else{
            $pwinner = 0;
        }
        if($pwinner == $winner){
            $correct = true;
            $numCorrect++;
        }
        $victor[] = array(array("results" => array("prediction" => $pwinner, "actual" => $winner, "correct" => $correct), "numCorrect" => $numCorrect));
    }

    echo json_encode($victor);
});

$app->get('/predict/{team1}/{team2}', function($team1, $team2) use ($app) {
    $app->response->setHeader("Content-Type", "application/json");
    if($team1 == $team2){
        echo json_encode(array("message" => "please select 2 teams"));
        return;
    }
    $goodness = getTeamGoodness();
    $teamIDNames = array();
    $teams = Teams::find();
    foreach($teams as $team){
        $teamIDNames[$team->id] = $team->title;
    }
    $winner = $goodness[$team1] < $goodness[$team2] ? $teamIDNames[$team2] : $teamIDNames[$team1];
    echo json_encode(array("results" => array("teams" => array("team1" => $teamIDNames[$team1], "team2" => $teamIDNames[$team2]), "winner" => $winner)));
});

$app->get('/teams', function() use ($app){
    $app->response->setHeader("Content-Type", "application/json");
    $app->response->setHeader("Access-Control-Allow-Origin", "*");
    header('Access-Control-Allow-Origin: *');
    $teams = Teams::find(
        array(
            "order" => "title"
        )
    );
    $teamNames = array();
    foreach($teams as $team){
        $teamNames[] = array("id" => $team->id, "name" => $team->title);
    }
    $results = array("results" => $teamNames);
    echo json_encode($results);
});

function getTeamGoodness(){
    $teams = Teams::find();
//    $phql = "SELECT * FROM Teams";
//    $teams = $app->modelsManager->executeQuery($phql);

    $games = Games::find();
    $teamWeightByScore = array();
    foreach ($games as $game){
        //find 'goodness' of each team by adding total goals, then analyzing each game to see how 'valuable' it was
        //to team 'strength'
        $teamWeightByScore[$game->team1_id] += $game->score1;
        $teamWeightByScore[$game->team2_id] += $game->score2;
    }
    $teamGoodness = array();
    foreach ($games as $game){ //this feels wrong
        // Divide team weight by each other, then multilply by score and add to goodness. We want to add the smaller number.
        // A high scoring team vs a low scoring team is less valuable than two high scoring teams.
        if($teamWeightByScore[$game->team1_id] > $teamWeightByScore[$game->team2_id]){
            $teamGoodness[$game->team2_id] += ($teamWeightByScore[$game->team2_id] * ($game->score2 * ($teamWeightByScore[$game->team2_id] / $teamWeightByScore[$game->team1_id])));
        } elseif($game->score1 == $game->score2){
            continue;
        }
        else{
            $teamGoodness[$game->team1_id] += ($teamWeightByScore[$game->team1_id] * ($game->score1 * ($teamWeightByScore[$game->team1_id] / $teamWeightByScore[$game->team2_id])));
        }
    }
    return $teamGoodness;
}

$app->notFound(function () use ($app) {
    $app->response->setHeader("Content-Type", "application/json");
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo(json_encode(array("message" => 'Invalid handle.')));
});

$app->handle();