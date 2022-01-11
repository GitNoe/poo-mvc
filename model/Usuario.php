<?php
namespace App\Model;

class Usuario {
    
    //Variables o atributos
    var $id;
    var $usuario;
    var $contraseña;
    var $fecha_acceso;
    var $activo;
    var $usuarios;
    var $noticias;
    
    function __construct($data=null){
        $this->id = ($data) ? $data->id : null;
        $this->usuario = ($data) ? $data->usuario : null;
        $this->contraseña = ($data) ? $data->contraseña : null;
        $this->fecha_acceso = ($data) ? $data->fecha_acceso : null;
        $this->activo = ($data) ? $data->activo : null;
        $this->usuarios = ($data) ? $data->usuarios : null;
        $this->noticias = ($data) ? $data->noticias : null;
    }
}