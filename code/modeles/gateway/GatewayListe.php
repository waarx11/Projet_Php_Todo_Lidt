<?php

class GatewayListe
{
    private Connection $conx;

    public function __construct()
    {
        global $base,$login,$mdp;
        $this->conx = new Connection($base, $login,$mdp);
    }

    public function inserListe(Liste $liste)
    {
        $query = "INSERT INTO LISTE(nom,visibilite,description,userid) VALUES(:nom, :visibilite, :description, :userid)";
        //Pas besoin de préciser l'id car il est automatiquement incrémenter.
        if ($this->conx->executeQuery($query, array(
            ':nom' => array($liste->getNom(), PDO::PARAM_STR_CHAR),
            ':visibilite' => array($liste->getVisibilite(), PDO::PARAM_INT),
            ':description' => array($liste->getDescription(), PDO::PARAM_STR_CHAR),
            ':userid' => array($liste->getUserid(), PDO::PARAM_STR_CHAR)))) {
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayListe inserListe : la query n'est pas executable");
        }
    }

    public function supprList(string $id)
    {
        $query = "DELETE FROM LISTE WHERE id=:id;  ";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)))){
            return true;
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayListe supprList : la query n'est pas executable");
        }
    }

    private function resultsToArrayList(array $results):array{
        $resArray=Array();
        Foreach ($results as $row) { //parcours
            $resArray[ $row['id'] ]=new Liste( ((int)$row['id']),$row['nom'], ((bool)$row['visibilite']) , $row['description'], (string)$row['userid']);
        }
        return $resArray;
    }

    public function displayAll($idUser): array
    {
        $query = "SELECT * FROM LISTE where visibilite OR userid=:user";
        $this->conx->executeQuery($query,array(
            ':user' => array($idUser  , $idUser  == null ? PDO::PARAM_NULL : PDO::PARAM_STR_CHAR)
        ));

        $res=$this->resultsToArrayList($this->conx->getResults());
        if ($res!=null) {
            return $res;
        } else {
            throw new Exception("No task for you ");
        }
    }

    public function deleteList(string $userid,string $liste)
    {
        $gwTache=new GatewayTache();
        $gwTache->deleteTacheByList($liste);
        $query = "DELETE FROM LISTE WHERE userid=:userid AND liste=:liste;";
        if ($this->conx->executeQuery($query, array(
            ':userid' => array($userid, PDO::PARAM_STR_CHAR),
            ':liste' => array($liste, PDO::PARAM_STR_CHAR)
        ))){
            return true;
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache supprTache : la query n'est pas executable");
        }
    }


    public function findById($id): array
    {
        $query = "SELECT * FROM LISTE WHERE id=:id";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)))) {
            return $this->resultsToArrayList($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayListe findById : la query n'est pas executable");
        }
    }

    public function findByName($name)
    {
        $query = "SELECT * FROM LISTE WHERE name=:name";
        if ($this->conx->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR_CHAR)))) {
            return $this->resultsToArrayList($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayListe findByName : la query n'est pas executable");
        }
    }
    public function findByNamePublic($name)
    {
        $query = "SELECT * FROM LISTE WHERE name=:name AND visibilite=true";
        if ($this->conx->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR_CHAR)))) {
            return $this->resultsToArrayList($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayListe findByNamePublic : la query n'est pas executable");
        }
    }

    public function findByUser($usrid)
    {
        $query = "SELECT * FROM LISTE WHERE usrid=:usrid";
        if ($this->conx->executeQuery($query, array(':name' => array($usrid, PDO::PARAM_STR_CHAR)))) {
            return $this->resultsToArrayList($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayListe findByUser : la query n'est pas executable");
        }
    }

    public function PrcCheckedList($id)
    {
        $query = "SELECT (Count(*)*100)/(SELECT Count(*) FROM LISTE l,TACHE t WHERE l.id=t.liste AND l.id=:id)  FROM LISTE l,TACHE t WHERE l.id=t.liste AND l.id=:id AND t.checked; ";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)))) {
            $res=$this->conx->getResults()[0][0];
            return $res;
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayListe findByUser : la query n'est pas executable");
        }
    }

}