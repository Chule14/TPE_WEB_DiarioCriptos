<?php

// Esta clase es para crear las vistas dinamicas de las noticias
class noticiasViews {
    //Muestra las noticias, debemos pasarle un array de noticias
    public function showNoticias($n, $s){
        $noticias = $n;
        $secciones = $s;

        require('/xampp/htdocs/criptonoticias/templates/noticias.phtml');
    }
    //Muestra una noticia especifica
    public function showNoticia($n){
      $noticia = $n;

      require('/xampp/htdocs/criptonoticias/templates/noticia.phtml');
    }

}



?>