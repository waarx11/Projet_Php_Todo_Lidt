<?php
require_once('Connection.php');
//require_once ('');
class GatewayTache
{
    private $dsn="mysql:host=localhost;dbname=dbnaverdier";
    private $user="naverdier";
    private $pass="achanger";
    private Connection $conx;
    public function __construct(){
        $this->conx=new Connection($this->dsn,$this->user,$this->pass);
    }
    public function inserTache($tache){
        $query="INSERT INTO TACHE VALUES(:nom, :priorite, :dateCreation, :dateFin, :repete, :maliste, :envieTache)";
        //Pas besoin de préciser l'id car il est automatiquement incrémenter.
        if($this->conx->executeQuery($query,array(':nom'=>array($tache->nom,PDO::PARAM_STR_CHAR),
                                                    ':priorite'=>array($tache->priorite,PDO::PARAM_INT),
                                                    ':dateCreation'=>array($tache->dateCreation,date("Y-m-d H:i:s", strtotime($tache->dateCreation)), PDO::PARAM_STR),
                                                    ':dateFin'=>array($tache->dateFin,date("Y-m-d H:i:s", strtotime($tache->dateFin)), PDO::PARAM_STR),
                                                    ':repete'=>array($tache->repete,PDO::PARAM_BOOL),
                                                    ':maliste'=>array($tache->maliste,PDO::PARAM_INT),
                                                    ':envieTache'=>array($tache->envieTache,PDO::PARAM_STR_CHAR)))){
        }else{
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    public function displayAll():array{
        $query="SELECT * FROM TACHE";
        if($this->conx->executeQuery($query)){
            return $this->conx->getResults();
        }else{
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    public function findById($id):array{
        $query="SELECT * FROM TACHE WHERE id=:id";
        if($this->conx->executeQuery($query,array(':id'=>array($id,PDO::PARAM_STR_CHAR)))){
            return $this->conx->getResults();
        }else{
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    public function findByName($name){
        $query="SELECT * FROM TACHE WHERE name=:name";
        if($this->conx->executeQuery($query,array(':name'=>array($name,PDO::PARAM_STR_CHAR)))){
            return $this->conx->getResults();
        }else{
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }
}