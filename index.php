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
        //divide team weight by each other, then multilply by score and add to goodness.
        $teamGoodness[$game->team1_id] += $game->score1 * ($teamWeightByScore[$game->team1_id] / $teamWeightByScore[$game->team2_id]);
        $teamGoodness[$game->team2_id] += $game->score2 * ($teamWeightByScore[$game->team2_id] / $teamWeightByScore[$game->team1_id]);
    }
    //now we predict.
    echo json_encode($teamGoodness);
});

$app->handle();