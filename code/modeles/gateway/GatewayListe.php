<?php

namespace gateway;

require_once('Connection.php');

class GatewayListe
{
    private Connection $conx;

    public function __construct()
    {
        global $base,$login,$mdp;
        $this->conx = new Connection($base, $login,$mdp);
    }

    public function inserListe($liste)
    {
        $query = "INSERT INTO LISTE(nom,visibilite,description,userid) VALUES(:nom, :visibilite, :description, :userid)";
        //Pas besoin de préciser l'id car il est automatiquement incrémenter.
        if ($this->conx->executeQuery($query, array(
            ':nom' => array($liste->nom, PDO::PARAM_STR_CHAR),
            ':visibilite' => array($liste->visibilite, PDO::PARAM_INT),
            ':description' => array($liste->description, PDO::PARAM_STR_CHAR),
            ':userid' => array($liste->userid, PDO::PARAM_STR_CHAR)))) {
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    private function resultsToArrayList($results):array{
        $resArray=Array();
        Foreach ($results as $row) { //parcours
            $resArray[$row['id']]=new Liste($row['id'],$row['nom'],(bool)$row['visibilite'],$row['description'],$row['userid']);
        }
        return $resArray;
    }

    public function displayAll(): array
    {
        $query = "SELECT * FROM LISTE";
        if ($this->conx->executeQuery($query)) {
            return  resultsToArrayTache($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    public function findById($id): array
    {
        $query = "SELECT * FROM LISTE WHERE id=:id";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_STR_CHAR)))) {
            return resultsToArrayTache($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }

    public function findByName($name)
    {
        $query = "SELECT * FROM LISTE WHERE name=:name";
        if ($this->conx->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR_CHAR)))) {
            return resultsToArrayTache($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache insert : la query n'est pas executable");
        }
    }
}