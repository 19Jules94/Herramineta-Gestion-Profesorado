<?php

include_once 'config.php';

class DB
{

    protected $db;

    function __construct(){
        $this->db = $this->connect();
    }

    function __destruct(){
        if ($this->db) {
            $this->db->close();
        }
    }
    
    private function connect(){
        $client = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_NAME);

        if($client->connect_errno){
            $client = false;
        }
        return $client;
    }
}
