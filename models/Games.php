<?php

class Games extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $key;

    /**
     *
     * @var integer
     */
    public $round_id;

    /**
     *
     * @var integer
     */
    public $pos;

    /**
     *
     * @var integer
     */
    public $group_id;

    /**
     *
     * @var integer
     */
    public $team1_id;

    /**
     *
     * @var integer
     */
    public $team2_id;

    /**
     *
     * @var string
     */
    public $play_at;

    /**
     *
     * @var string
     */
    public $postponed;

    /**
     *
     * @var string
     */
    public $play_at_v2;

    /**
     *
     * @var string
     */
    public $play_at_v3;

    /**
     *
     * @var integer
     */
    public $ground_id;

    /**
     *
     * @var integer
     */
    public $city_id;

    /**
     *
     * @var string
     */
    public $knockout;

    /**
     *
     * @var string
     */
    public $home;

    /**
     *
     * @var integer
     */
    public $score1;

    /**
     *
     * @var integer
     */
    public $score2;

    /**
     *
     * @var integer
     */
    public $score1et;

    /**
     *
     * @var integer
     */
    public $score2et;

    /**
     *
     * @var integer
     */
    public $score1p;

    /**
     *
     * @var integer
     */
    public $score2p;

    /**
     *
     * @var integer
     */
    public $score1i;

    /**
     *
     * @var integer
     */
    public $score2i;

    /**
     *
     * @var integer
     */
    public $score1ii;

    /**
     *
     * @var integer
     */
    public $score2ii;

    /**
     *
     * @var integer
     */
    public $next_game_id;

    /**
     *
     * @var integer
     */
    public $prev_game_id;

    /**
     *
     * @var integer
     */
    public $winner;

    /**
     *
     * @var integer
     */
    public $winner90;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $updated_at;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'games';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Games[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Games
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'id' => 'id',
            'key' => 'key',
            'round_id' => 'round_id',
            'pos' => 'pos',
            'group_id' => 'group_id',
            'team1_id' => 'team1_id',
            'team2_id' => 'team2_id',
            'play_at' => 'play_at',
            'postponed' => 'postponed',
            'play_at_v2' => 'play_at_v2',
            'play_at_v3' => 'play_at_v3',
            'ground_id' => 'ground_id',
            'city_id' => 'city_id',
            'knockout' => 'knockout',
            'home' => 'home',
            'score1' => 'score1',
            'score2' => 'score2',
            'score1et' => 'score1et',
            'score2et' => 'score2et',
            'score1p' => 'score1p',
            'score2p' => 'score2p',
            'score1i' => 'score1i',
            'score2i' => 'score2i',
            'score1ii' => 'score1ii',
            'score2ii' => 'score2ii',
            'next_game_id' => 'next_game_id',
            'prev_game_id' => 'prev_game_id',
            'winner' => 'winner',
            'winner90' => 'winner90',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at'
        );
    }

}
