<?php
require_once('Connection.php');
class GatewayListe
{
    private $dsn="mysql:host=localhost;dbname=dbnaverdier";
    private $user="naverdier";
    private $pass="achanger";
    private Connection $conx;
    public function __construct(){
        $this->conx=new Connection($this->dsn,$this->user,$this->pass);
    }
    public function inserListe($liste){
        $query="INSERT INTO LISTE VALUES(:nom, :priorite, :dateCreation, :dateFin, :repete, :maliste, :envieTache)";
        //Pas besoin de préciser l'id car il est automatiquement incrémenter.
        if($this->conx->executeQuery($query,array(':nom'=>array($liste->nom,PDO::PARAM_STR_CHAR),
            ':priorite'=>array($liste->visibilite,PDO::PARAM_INT),
            ':dateCreation'=>array($liste->description,date("Y-m-d H:i:s", strtotime($liste->dateCreation)), PDO::PARAM_STR),
            ':dateFin'=>array($liste->utilisateur,date("Y-m-d H:i:s", strtotime($liste->dateFin)), PDO::PARAM_STR)))){
        }else{
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    public function displayAll():array{
        $query="SELECT * FROM LISTE";
        if($this->conx->executeQuery($query)){
            return $this->conx->getResults();
        }else{
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    public function findById($id):array{
        $query="SELECT * FROM LISTE WHERE id=:id";
        if($this->conx->executeQuery($query,array(':id'=>array($id,PDO::PARAM_STR_CHAR)))){
            return $this->conx->getResults();
        }else{
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    public function findByName($name){
        $query="SELECT * FROM LISTE WHERE name=:name";
        if($this->conx->executeQuery($query,array(':name'=>array($name,PDO::PARAM_STR_CHAR)))){
            return $this->conx->getResults();
        }else{
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }
}