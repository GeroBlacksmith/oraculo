<?php

/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 07/11/2016
 * Time: 01:53 PM
 */

/**
 * Class Zona
 */
class Zona
{
    /**
     * @var DB|null
     */
    private $_db, $_data;

    /**
     * Zona constructor.
     * @param null $idZona
     */
    public function __construct($idZona=null)
    {
        $this->_db = DB::getInstance();
        if($idZona){
            $this->setZona($idZona);
        }
    }


    /**
     * @param $idZona
     */
    public function setZona($idZona){
        $this->_data=$this->find($idZona);
    }

    /**
     * @param $id
     * @return bool|DB
     */
    public function find($id){
        return $this->_db->get('zona',['idZona', '=', $id]);
    }

    public function data(){
        return $this->_data;
    }
}