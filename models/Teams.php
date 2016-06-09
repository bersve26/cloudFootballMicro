<?php

class Teams extends \Phalcon\Mvc\Model
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
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $title2;

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var string
     */
    public $synonyms;

    /**
     *
     * @var integer
     */
    public $country_id;

    /**
     *
     * @var integer
     */
    public $city_id;

    /**
     *
     * @var string
     */
    public $club;

    /**
     *
     * @var integer
     */
    public $since;

    /**
     *
     * @var string
     */
    public $address;

    /**
     *
     * @var string
     */
    public $web;

    /**
     *
     * @var integer
     */
    public $assoc_id;

    /**
     *
     * @var string
     */
    public $national;

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
        return 'teams';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Teams[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Teams
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
            'title' => 'title',
            'title2' => 'title2',
            'code' => 'code',
            'synonyms' => 'synonyms',
            'country_id' => 'country_id',
            'city_id' => 'city_id',
            'club' => 'club',
            'since' => 'since',
            'address' => 'address',
            'web' => 'web',
            'assoc_id' => 'assoc_id',
            'national' => 'national',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at'
        );
    }

}
