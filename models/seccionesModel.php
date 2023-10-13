<?php 

// La clase modelo se comunica con la BD y realiza las consultas
class seccionesModel {

    public static function getSecciones(){
        require_once('C:\xampp\htdocs\CriptoNoticias\config\db.php');
        $conex = new db(); // Instacia de la clase DB
        $conex = $conex->conexion();
        $statement = $conex->prepare('SELECT * FROM secciones');

<<<<<<< HEAD
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
=======
        return ($statement->execute()) ? $statement->fetchAll() : false;
>>>>>>> b9cf47e60db9209855a85ed675667503a77343e2
    }
    
    
}










?>