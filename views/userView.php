<?php


class userView {
    // Este metodo sirve para cargar funciones de exito o de error

    public function renderLoginForm(){
        echo 
        '
        <section class="ingreso">
            <div class="container-md">
                <form class="d-flex flex-column gap-3 w-75 mx-auto" action="iniciar" method="POST">
                    <div class="">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" name="contraseña" class="form-control" id="contraseña" required>
                    </div>

                    <button type="submit" class="w-100 btn btn-block btn-success">Ingresar</button>
        </form>
        ';
    }

    
    public function renderRegisterForm(){
        echo 
        '
        <form class="w-50 mx-auto" action="registrar" method="POST">
            <div class="mb-3">  
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escribe tu email">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Escribe tu email">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Escribe tu email">
            </div>

            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Escribe tu contraseña">
            </div>

            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
        </form>
        ';
    }


    public function renderCrearNoticias($secciones){
        echo 
        '
        <form class="w-50 mx-auto my-5" action="nueva" method="POST" enctype="multipart/form-data">
            <div class="mb-3">  
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Escribe un titulo">
            </div>

            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtitulo</label>
                <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="Escribe un subtitulo">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label"></label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="6"></textarea>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Sube una imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen">
            </div>


            <div class="mb-3">
                <label for="seccion" class="form-label">Seccion</label>
                <select class="form-select form-select-md" name="seccion" id="seccion">
                    ';
                    foreach($secciones as $seccion){
                        echo '<option value="'.$seccion['id'].'">'.$seccion['tipo'].'</option>';
                    }
        echo     '</select>
            </div>

            <button type="submit" class="btn btn-warning w-100">Crear noticia</button>
        </form>
        ';
    }


}