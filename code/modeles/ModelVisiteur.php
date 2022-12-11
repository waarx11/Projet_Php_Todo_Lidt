<?php

class ModelVisiteur
{
    public function __construct(){}

    //return toute les liste public
    public static function getPublicList(){
        $gw = new GatewayListe();
        return $gw->displayAllPublic();
    }
    public static function getTaches($idList){
        $gwTache = new GatewayTache();
        return $gwTache->findById($idList);
    }

    public static function getTachesPublic($idList){
        $gwTache = new GatewayTache();
        return $gwTache->findByIdListOrderedPublic($idList);
    }


    public static function addTache(){ //ajoute une tache dans la liste d'id $_GET["idListe"]
        $gwTache = new GatewayTache();
        $liste = ModelVisiteur::getList();
        $titre = Validation::validateUser($_POST["titre"]);
        $description = Validation::validateString($_POST["description"]);
        $dateFin = Validation::validateDate($_POST["dateFin"]);
        $idListe = $liste->getId();
        $gwTache->insertTaskIn($titre, $description, $dateFin, $idListe, (isset($_POST["fait"]) && $_POST["fait"]) ? true : false);
    }

    public static function removeTache(){
        $gwTache = new GatewayTache();
        if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune tache spécifié.");
        $id = Validation::validateInt($_GET["id"]);
        $gwTache->findById($id);
        $gwTache->supprTache($id);
    }

    public static function createList(){
        $gwListe = new GatewayListe();
        $id = Validation::validateString($_POST["id"]);
        $nom = Validation::validateString($_POST["nom"]);
        $visibilite = Validation::validateVisibiliter($_POST["visibilite"]);
        $description = Validation::validateString($_POST["description"]);
        $userid = $_POST["userid"];
        $gwListe->inserListe(new Liste($id, $nom, $visibilite, $description, $userid));
    }

    public static function removeList($idList){
        $gwListe = new GatewayListe();
        $gwTache = new GatewayTache();
        $gwTache->deleteTacheByList($idList);
        $gwListe->supprList($idList);
    }
    public static function removeTask($idTask){
        $gwTache = new GatewayTache();
        $gwTache->supprTachePublic($idTask);
    }





}