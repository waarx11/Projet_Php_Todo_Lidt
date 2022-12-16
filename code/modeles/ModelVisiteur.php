<?php

class ModelVisiteur
{
    public function __construct(){}

    //return toute les liste public
    public static function getPublicList(){
        $gw = new GatewayListe();
        return $gw->displayAll($_SESSION['user'] ?? null);
    }
    public static function getTaches($idList){
        $gwTache = new GatewayTache();
        return $gwTache->findById($idList);
    }

    public static function getTachesPublic($idList){
        $gwTache = new GatewayTache();
        return $gwTache->findByIdListOrdered($idList,$_SESSION['user'] ?? null);
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
        $nom = Validation::validateString($_POST["nom"]);
        $visibilite = Validation::validateVisibiliter($_POST["visibilite"]);
        $description = Validation::validateString($_POST["description"]);
        $userid = NULL;
        $id=0;
        $gwListe->inserListe(new Liste($id,$nom, $visibilite, $description, $userid));
    }

    public static function removeTask($idTask){
        $gwTache = new GatewayTache();
        $gwTache->supprTachePublic($idTask,$_SESSION['user'] ?? null);
    }

    public static function updateCheckTaskPublic(string $idTaskVerif)
    {
        $gwTache = new GatewayTache();
        $gwTache->updateCheckTache($idTaskVerif,$_SESSION['user'] ?? null);

    }
    public static function ajoutTache(TacheModal $tacheAdd)
    {
        $gtwTache=new GatewayTache();
        $gtwTache->addTache($tacheAdd);
    }
    public static function getCheckedPrc($id)
    {
        $gwListe =new GatewayListe();
        return $gwListe->PrcCheckedList($id);
    }


}