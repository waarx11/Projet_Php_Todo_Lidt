<?php

class GatewayTache
{
    private Connection $conx;

    public function __construct()
    {
        global $base,$login,$mdp;
        $this->conx = new Connection($base, $login,$mdp);
    }
    private function resultsToArrayTache(array $results):array{
        $resArray=Array();
        Foreach ($results as $row) { //parcours
            if($row['userid']==null){
                $row['userid']='anonyme';
            }
            $resArray[ $row['id'] ]=new Tache($row['id'],$row['nom'],$row['dateCreation'],$row['dateFin'],$row['repete'],(int)$row['priorite'],$row['checked'],$row['userid'],$row['liste'] );
        }
        return $resArray;
    }
    public function inserTache(Tache $tache)
    {
        $query = "INSERT INTO TACHE(nom,priorite,dateCreation,dateFin,repete,checked,userid,list) VALUES(:nom, :priorite, :dateCreation, :dateFin, :repete,:checked, :userid, :list)";
        //Pas besoin de préciser l'id car il est automatiquement incrémenter.
        if ($this->conx->executeQuery($query, array(
            ':nom' => array($tache->getNom(), PDO::PARAM_STR_CHAR),
            ':priorite' => array($tache->getPriorite(), PDO::PARAM_INT),
            ':dateCreation' => array($tache->getDateCreation(), date("Y-m-d H:i:s", strtotime($tache->getDateCreation)), PDO::PARAM_STR),
            ':dateFin' => array($tache->getDateFin(), date("Y-m-d H:i:s", strtotime($tache->getDateFin)), PDO::PARAM_STR),
            ':repete' => array($tache->getRepetition(), PDO::PARAM_BOOL),
            ':checked' => array($tache->getChecked(), PDO::PARAM_BOOL),
            ':userid' => array($tache->getUser(), PDO::PARAM_STR_CHAR),
            ':list' => array($tache->getListe(), PDO::PARAM_STR_CHAR)))) {
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache inserTache : la query n'est pas executable");
        }
    }

    public function supprTachePublic(string $id)
    {
        $query = "DELETE FROM Tache WHERE id=:id AND userid is NULL ;";

        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)))){
            return true;
        } else {
            throw new Exception("Error delete an task not exist or not belong to you !!");
        }
    }
    public function deleteTacheByList(string $userid,string $liste)
    {
        $query = "DELETE FROM Tache WHERE userid=:userid AND liste=:liste;";
        if ($this->conx->executeQuery($query, array(
            ':userid' => array($userid, PDO::PARAM_STR_CHAR),
            ':liste' => array($liste, PDO::PARAM_STR_CHAR)
            ))){
            return true;
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache supprTache : la query n'est pas executable");
        }
    }

    public function displayAll(): array
    {
        $query = "SELECT * FROM TACHE";
        if ($this->conx->executeQuery($query)) {
            return $this->conx->getResults();
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache displayAll : la query n'est pas executable");
        }
    }

    public function findByIdList($list): array
    {

        $query = "SELECT * FROM TACHE WHERE liste=:list";

        if ($this->conx->executeQuery($query, array(':list' => array($list, PDO::PARAM_INT)))) {
            return $this->resultsToArrayTache($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache findByIdList : la query n'est pas executable");
        }
    }
    public function findByIdListOrdered($list): array
    {
        $query = "SELECT * FROM TACHE WHERE liste=:list ORDER BY priorite ASC, dateFin asc";
        if ($this->conx->executeQuery($query, array(':list' => array($list, PDO::PARAM_INT)))) {
            return $this->resultsToArrayTache($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache findByIdListOrdered : la query n'est pas executable");
        }
    }

    public function findByIdListOrderedPublic($list): array
    {
        $query = "SELECT t.* FROM TACHE t, LISTE l WHERE t.liste=:list AND t.liste=l.id AND l.visibilite ORDER BY priorite ASC, dateFin asc";
        $this->conx->executeQuery($query, array(':list' => array($list, PDO::PARAM_INT)));
        $res=$this->resultsToArrayTache($this->conx->getResults());
        if ($res!=null) {
            return $res;
        } else {
            throw new Exception("No task for you ");
        }
    }



    public function findById($id): array
    {
        $query = "SELECT * FROM TACHE WHERE id=:id";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)))) {
            return resultsToArrayTache($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache findById : la query n'est pas executable");
        }
    }



    //a voir pour barre de recherche
    public function findByName(string $name)
    {
        $query = "SELECT * FROM TACHE WHERE name=:name";
        if ($this->conx->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR_CHAR)))) {
            return resultsToArrayTache($this->conx->getResults());
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayTache findByName : la query n'est pas executable");
        }
    }
}