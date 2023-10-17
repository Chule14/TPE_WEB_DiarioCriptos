<?php

// Esta clase es para crear las vistas dinamicas de las noticias
class noticiasViews {

    //Muestra las noticias, debemos pasarle un array de noticias
    public function showNoticias($n, $s){
        $noticias = $n;
        $secciones = $s;

        require('/xampp/htdocs/criptonoticias/templates/noticias/noticias.phtml');
    }
    //Muestra una noticia especifica
    public function showNoticia($n){
      $noticia = $n;

      require('/xampp/htdocs/criptonoticias/templates/noticias/noticia.phtml');
    }

    public function renderAdministrarNoticias($n){
      $noticias = $n;
      require('/xampp/htdocs/criptonoticias/templates/noticias/adminnoticias.phtml');
    }

    public function renderCrearNoticia($s){
      $secciones = $s;
      require('/xampp/htdocs/criptonoticias/templates/noticias/crearnoticias.phtml');
    }

    public function renderEditarNoticia($s, $i){
      $secciones = $s;
      $id = $i;
      require('/xampp/htdocs/criptonoticias/templates/noticias/editarNoticias.phtml');
    }
}
