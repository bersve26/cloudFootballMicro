<?php

class Countries extends \Phalcon\Mvc\Model
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
    public $slug;

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
     * @var string
     */
    public $hist_names;

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
     * @var integer
     */
    public $continent_id;

    /**
     *
     * @var integer
     */
    public $country_id;

    /**
     *
     * @var string
     */
    public $s;

    /**
     *
     * @var string
     */
    public $c;

    /**
     *
     * @var string
     */
    public $d;

    /**
     *
     * @var string
     */
    public $m;

    /**
     *
     * @var string
     */
    public $motor;

    /**
     *
     * @var string
     */
    public $alpha2;

    /**
     *
     * @var string
     */
    public $alpha3;

    /**
     *
     * @var string
     */
    public $num;

    /**
     *
     * @var string
     */
    public $fifa;

    /**
     *
     * @var string
     */
    public $ioc;

    /**
     *
     * @var string
     */
    public $fips;

    /**
     *
     * @var string
     */
    public $net;

    /**
     *
     * @var string
     */
    public $wikipedia;

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
        return 'countries';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Countries[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Countries
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
            'slug' => 'slug',
            'key' => 'key',
            'place_id' => 'place_id',
            'code' => 'code',
            'alt_names' => 'alt_names',
            'hist_names' => 'hist_names',
            'pop' => 'pop',
            'area' => 'area',
            'continent_id' => 'continent_id',
            'country_id' => 'country_id',
            's' => 's',
            'c' => 'c',
            'd' => 'd',
            'm' => 'm',
            'motor' => 'motor',
            'alpha2' => 'alpha2',
            'alpha3' => 'alpha3',
            'num' => 'num',
            'fifa' => 'fifa',
            'ioc' => 'ioc',
            'fips' => 'fips',
            'net' => 'net',
            'wikipedia' => 'wikipedia',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at'
        );
    }

}
