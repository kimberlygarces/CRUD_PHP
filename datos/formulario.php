<?php

class FormularioClass
{
    private $idzapato;
    private $foto;
    private $referecia;
    private $name;
    private $laboratorio;
    private $cantidad;
    private $fecha_vencimiento;

    

    public function __construct()
    {
        $this->idzapato = 0;
        $this->foto = "";
        $this->referecia = "";
        $this->name = "";
        $this->laboratorio = "";
        $this->cantidad = 0;
        $this->fecha_vencimiento = "";

    }

    function getIdzapato(){
        return $this->idzapato;
    }
    function setIdzapato($idzapato){
        $this->idzapato = $idzapato;
    }

    function getReferecia(){
        return $this->referecia;
    }
    function setReferencia($referecia){
        $this->referecia = $referecia;
    }

    
    function getFoto(){
        return $this->foto;
    }
    function setFoto($foto){
        $this->foto = $foto;
    }


    function getName(){
        return $this->name;
    }
    function setName($name){
        $this->name = $name;
    }

    
    function getfecha_vencimiento(){
        return $this->fecha_vencimiento;
    }
    function setfecha_vencimiento($fecha_vencimiento){
        $this->fecha_vencimiento = $fecha_vencimiento;
    }
    

    function getLaboratorio(){
        return $this->color;
    }
    function setLaboratorio($color){
        $this->color = $color;
    }


    function getCantidad(){
        return $this->cantidad;
    }
    function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }


    
}
