<?php

// Esta clase es para crear las vistas dinamicas de las noticias
class seccionesViews {

    public function renderAdministrarSecciones($s){
        $secciones = $s;
        require('/xampp/htdocs/criptonoticias/templates/secciones/adminsecciones.phtml');
    }
    
    public function renderCrearSeccion(){
        require('/xampp/htdocs/criptonoticias/templates/secciones/crearsecciones.phtml');
    }

    public function renderEditarSeccion($i){
        $id = $i;
        require('/xampp/htdocs/criptonoticias/templates/secciones/editarsecciones.phtml');
    }
   

}
