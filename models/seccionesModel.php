<?php 

// La clase modelo se comunica con la BD y realiza las consultas
class seccionesModel {

    public static function getSecciones(){
        require_once('C:\xampp\htdocs\CriptoNoticias\config\db.php');
        $conex = new db(); // Instacia de la clase DB
        $conex = $conex->conexion();
        $statement = $conex->prepare('SELECT * FROM secciones');

        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }
    
    
}










?>