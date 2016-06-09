<?php

class Cities extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var string
     */
    public $key;

    /**
     *
     * @var integer
     */
    public $place_id;

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var string
     */
    public $alt_names;

    /**
     *
     * @var integer
     */
    public $country_id;

    /**
     *
     * @var integer
     */
    public $state_id;

    /**
     *
     * @var integer
     */
    public $part_id;

    /**
     *
     * @var integer
     */
    public $county_id;

    /**
     *
     * @var integer
     */
    public $muni_id;

    /**
     *
     * @var integer
     */
    public $metro_id;

    /**
     *
     * @var integer
     */
    public $pop;

    /**
     *
     * @var integer
     */
    public $area;

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
        return 'cities';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cities[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cities
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
            'name' => 'name',
            'key' => 'key',
            'place_id' => 'place_id',
            'code' => 'code',
            'alt_names' => 'alt_names',
            'country_id' => 'country_id',
            'state_id' => 'state_id',
            'part_id' => 'part_id',
            'county_id' => 'county_id',
            'muni_id' => 'muni_id',
            'metro_id' => 'metro_id',
            'pop' => 'pop',
            'area' => 'area',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at'
        );
    }

}
