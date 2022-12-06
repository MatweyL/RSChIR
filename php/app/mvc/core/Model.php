<?php
namespace mvc\core;

use mvc\lib\Db;

abstract class Model{
    public $db;

    public function __construct(){
        $this->db = new Db;
    }
}