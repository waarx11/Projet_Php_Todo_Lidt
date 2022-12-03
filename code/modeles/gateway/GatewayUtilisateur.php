<?php

namespace gateway;

require_once('Connection.php');

//require_once ('');
class GatewayTache
{
    private Connection $conx;

    public function __construct()
    {
        global $base,$login,$mdp;
        $this->conx = new Connection($base, $login,$mdp);
    }

    public function inserTache($tache)
    {
        $query = "INSERT INTO TACHE(nom,priorite,dateCreation,dateFin,repete,user,list) VALUES(:nom, :priorite, :dateCreation, :dateFin, :repete, :user, :list)";
        //Pas besoin de préciser l'id car il est automatiquement incrémenter.
        if ($this->conx->executeQuery($query, array(':nom' => array($tache->nom, PDO::PARAM_STR_CHAR),
            ':priorite' => array($tache->priorite, PDO::PARAM_INT),
            ':dateCreation' => array($tache->dateCreation, date("Y-m-d H:i:s", strtotime($tache->dateCreation)), PDO::PARAM_STR),
            ':dateFin' => array($tache->dateFin, date("Y-m-d H:i:s", strtotime($tache->dateFin)), PDO::PARAM_STR),
            ':repete' => array($tache->repete, PDO::PARAM_BOOL),
            ':user' => array($tache->user, PDO::PARAM_STR_CHAR),
            ':list' => array($tache->user, PDO::PARAM_STR_CHAR)))) {
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    public function displayAll(): array
    {
        $query = "SELECT * FROM TACHE";
        if ($this->conx->executeQuery($query)) {
            return $this->conx->getResults();
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    private function resultsToArrayTache($results):array{
        $resArray=Array();
        Foreach ($results as $row) { //parcours
            $resArray[$row['id']]=new Tache($row['id'],$row['nom'],(int)$row['priorite'],$row['dateCreation'],$row['dateFin'],$row['repete'],row['user'],row['list'] );
        }
        return $resArray;
    }

    public function findById($id): array
    {
        $query = "SELECT * FROM TACHE WHERE id=:id";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_STR_CHAR)))) {
            return resultsToArrayTache($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    //a voir pour barre de recherche
    public function findByName($name)
    {
        $query = "SELECT * FROM TACHE WHERE name=:name";
        if ($this->conx->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR_CHAR)))) {
            return resultsToArrayTache($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }
}