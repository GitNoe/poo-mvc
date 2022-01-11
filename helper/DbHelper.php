<?php

namespace App\Helper;

class DbHelper{

    var $db;
    
    function __construct(){
        
        // Conexión mediante PDO
        $opciones = [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
        try {
            $this->db = new \PDO(
                'mysql:host=localhost;dbname=cms_hp',
                'noelia',
                'PassWord?!CMS1234',
            $opciones);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e){
            echo 'Error de conexión: ' . $e->getMessage();
        }
    }
}