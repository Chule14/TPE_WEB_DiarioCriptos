<?php

// Esta clase es para crear las vistas dinamicas de las noticias
class noticiasViews {

      public function showAlert($msg, $type){
          if($type == "error"){
              echo 
              '
                  <div class="alert alert-danger" role="alert">
                      <strong>ERROR:</strong> '.$msg.'
                  </div>
              ';
          }

          if($type == "success"){
              echo 
              '
                  <div class="alert alert-success" role="alert">
                      <strong>EXITO:</strong> '.$msg.'
                  </div>
              ';
          }

      }
    //Muestra las noticias, debemos pasarle un array de noticias
    public function showNoticias($noticias){
        echo '<section class="noticias my-3">';
        
        foreach($noticias as $noticia){
            echo 
            '
            <div class="card">
              <img src="'.$noticia['imagen'].'" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title">'.$noticia['titulo'].'</h3>
                <p class="card-text">'.$noticia['subtitulo'].'</p>
                <p class="card-text">Seccion: '.$noticia['tipo'].'</p>
                <a href="/criptonoticias/noticia/'.$noticia['id'].'" class="btn btn-outline-primary">Leer más</a>
              </div>
            </div>';
        }

        echo '</section>';
    }
    //Muestra una noticia especifica
    public function showNoticia($noticia){
      echo 
      '
      <section class="noticia">
        <div class="card mb-4">
            <img src="'.$noticia['imagen'].'" class="card-img-top">
            <div class="card-body">
                <h1 class="card-title">'.$noticia['titulo'].'</h1>
                <p class="card-text">'.$noticia['descripcion'].'</p>
                <p class="card-text">Seccion: '.$noticia['tipo'].'</p>
            </div>
        </div>
      </section>
      ';
    }

}



?>