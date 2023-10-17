<?php 

// La clase modelo se comunica con la BD y realiza las consultas
class seccionesModel {
    private $PDO;

    public function __construct () { 
        include_once 'src/config/config.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function getSecciones(){
        $statement = $this->PDO->prepare('SELECT * FROM secciones');

        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }
    
    public function createSeccion($tipo){
        $statement = $this->PDO->prepare('INSERT INTO secciones(tipo) VALUES(?)');

        return ($statement->execute([$tipo])) ? true : false;
    }

    public function deleteSeccion($id){
        $statement = $this->PDO->prepare('DELETE FROM secciones WHERE id = ?');

        return ($statement->execute([$id])) ? true : false;
    }
    
    public function updateSeccion($id, $tipo){
        $statement = $this->PDO->prepare('UPDATE secciones SET tipo = ? WHERE id = ?');

        return ($statement->execute([$tipo, $id])) ? true : false;
    }
}










?>