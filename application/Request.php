<?php

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/
class Request
{
   
   private $_Controlador;
   private $_Metodo;
   private $_Argumentos;
   
   public function __construct() {
    if (isset($_GET['url'])){
            $url=  filter_input (INPUT_GET,'url', FILTER_SANITIZE_URL);
            $url=  explode('/',$url);
            $url=  array_filter($url);
            $con= strtolower(array_shift($url));
            $con= explode('.php', $con);
    }  
    $this->_Controlador= strtolower(array_shift($con));
    $this->_Metodo=  strtolower(array_shift($url));
    $this->_Argumentos= $url;
    
    if(!$this->_Controlador){
        
        $this->_Controlador = DEFAULT_CONTROLLER;
    }
    if (!$this->_Metodo){
        $this->_Metodo = 'index';
    }
    if(!isset($this->_Argumentos)){
        $this->_Argumentos= array();  
    }
   }
   
   public function getControlador()
   {
       return $this->_Controlador;
   }
   public function getMetodo()
   {
       return $this->_Metodo;
   }
   public function getArgs()
   {
       return $this->_Argumentos;
   }
}
?>