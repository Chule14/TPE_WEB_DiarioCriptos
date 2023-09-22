<?php

// Esta clase es para crear las vistas dinamicas de las noticias
class noticiasViews {
    //Muestra las noticias, debemos pasarle un array de noticias
    public function showNoticias($noticias){
        echo '<section class="noticias my-3">';
        
        foreach($noticias as $noticia){
            echo 
            '
            <div class="card">
              <img src="images/noticia3.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title">'.$noticia['titulo'].'</h3>
                <p class="card-text">'.$noticia['subtitulo'].'</p>
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
        <h1 class="mb-5">'.$noticia['titulo'].'</h1>
        <img src="images/noticia3.jpg" alt="inversion">
        <p class="lead mt-3">'.$noticia['descripcion'].'</p>
      </section>
      ';
    }

}



?>