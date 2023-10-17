<?php

// Esta clase es para crear las vistas dinamicas de las noticias
class seccionesViews {

    public function renderAdministrarSecciones($s){
        $secciones = $s;
        include_once 'src/templates/secciones/adminsecciones.phtml';
    }
    
    public function renderCrearSeccion(){
        include_once 'src/templates/secciones/crearsecciones.phtml';
    }

    public function renderEditarSeccion($i){
        $id = $i;
        include_once 'src/templates/secciones/editarsecciones.phtml';
    }
   

}
