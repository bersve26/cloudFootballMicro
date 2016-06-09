<?php

class Events extends \Phalcon\Mvc\Model
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
    public $league_id;

    /**
     *
     * @var integer
     */
    public $season_id;

    /**
     *
     * @var string
     */
    public $start_at;

    /**
     *
     * @var string
     */
    public $end_at;

    /**
     *
     * @var string
     */
    public $team3;

    /**
     *
     * @var string
     */
    public $sources;

    /**
     *
     * @var string
     */
    public $config;

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
        return 'events';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Events[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Events
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
            'league_id' => 'league_id',
            'season_id' => 'season_id',
            'start_at' => 'start_at',
            'end_at' => 'end_at',
            'team3' => 'team3',
            'sources' => 'sources',
            'config' => 'config',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at'
        );
    }

}
