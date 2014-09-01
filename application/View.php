<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class View{
    
    private $_controlador;
    
    
    public function __construct(Request $peticion) {
        
        $this->_controlador = $peticion->getControlador();
    }
    
    public function renderizar($vista, $item = false)
    {
    $menu = array(
        
        array(
            'id' => 'inicio',
            'titulo' => 'Inicio',
            'enlace' => BASE_URL
        ),
        
        array(
            'id' => 'post',
            'titulo' => 'post',
            'enlace' => BASE_URL . 'post'
        )
        
    );
        
        $_layoutParams = array(
            'ruta_css'=> BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img'=> BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js'=> BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
            'menu'=>$menu
            
        );
        
        $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        
        
        if(is_readable($rutaView)){
            
            include_once ROOT . 'views' . DS . 'layout' . DS .DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaView;
            include_once ROOT . 'views' . DS . 'layout' . DS .DEFAULT_LAYOUT . DS . 'footer.php';
        }
        else {
            
            throw new Exception('Error de vista');
        }
    }
}

?>