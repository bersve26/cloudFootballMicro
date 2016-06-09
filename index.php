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

$app->get('/predict/{team1}/{team2}', function() use ($app){
    $teams = Teams::find();
//    $phql = "SELECT * FROM Teams";
//    $teams = $app->modelsManager->executeQuery($phql);

    $teamIDNames = array();
    foreach($teams as $team){
        $teamIDNames[$team->id] = $team->title;
    }
    $games = Games::find();
    $teamWeightByScore = array();
    foreach ($games as $game){
        //find 'goodness' of each team by adding total goals, then analyzing each game to see how 'valuable' it was
        //to team 'strength'
        $teamWeightByScore[$game->team1_id] += $game->score1;
        $teamWeightByScore[$game->team2_id] +- $game->score2;
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
    //let's predict the season with these numbers.
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
        $victor[] = array(array("prediction" => $pwinner, "actual" => $winner, "correct" => $correct), "numCorrect" => $numCorrect);
    }

    echo json_encode($victor);
});

$app->handle();