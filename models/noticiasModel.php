<?php 

// La clase modelo se comunica con la BD y realiza las consultas
class noticiasModel {
    private $PDO;

    public function __construct () { 
        require_once('C:\xampp\htdocs\CriptoNoticias\config\db.php');
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO


    public function newNoticia ($titulo, $subtitulo, $descripcion) {
        $statement = $this->PDO->prepare('INSERT INTO noticias (titulo, subtitulo, descripcion) VALUES ("'.$titulo.'", "'.$subtitulo.'", "'.$descripcion.'")');
        //Statement es una variable donde almacenamos la query que posteriormente ejecutaremos.
        return ($statement->execute()) ? true : false;
        //En este caso es un condicional ternario, retorna el valor final de la ejecucion, si sale exitosa da true sino false.
        //Como queremos mostrar datos solo enviamos true o false para que el controlador sepa que devolver.
    }


    public function getNoticias () {
        $statement = $this->PDO->prepare('SELECT * FROM noticias');

        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
        //Aqui si mostramos datos ya que cargamos todas las filas y columnas de la tabla noticias
    }

    public function getNoticia ($id) {
        $statement = $this->PDO->prepare('SELECT * FROM noticias WHERE id = '.$id.'');

        return ($statement->execute()) ? $statement->fetch() : false;
        //Aqui solamente retorna el fetch de una fila, ya que busca especificamente una fila.
    }

    public function deleteNoticia ($id) {
        $statement = $this->PDO->prepare('DELETE FROM noticias WHERE id = '.$id.'');

        return ($statement->execute()) ? true : false;
    }

    
    

    
    




    

}










?>