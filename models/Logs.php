<?php

class Logs extends \Phalcon\Mvc\Model
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
    public $msg;

    /**
     *
     * @var string
     */
    public $level;

    /**
     *
     * @var string
     */
    public $app;

    /**
     *
     * @var string
     */
    public $tag;

    /**
     *
     * @var integer
     */
    public $pid;

    /**
     *
     * @var integer
     */
    public $tid;

    /**
     *
     * @var string
     */
    public $ts;

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
        return 'logs';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Logs[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Logs
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
            'msg' => 'msg',
            'level' => 'level',
            'app' => 'app',
            'tag' => 'tag',
            'pid' => 'pid',
            'tid' => 'tid',
            'ts' => 'ts',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at'
        );
    }

}
