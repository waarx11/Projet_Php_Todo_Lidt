<?php

namespace gateway;

use classeMetier\Liste;
use Exception;
use Validation;

class ModelVisiteur
{
    public function __construct(){}

    //return toute les liste public
    public static function getPublicList(): array{
        $gw = new GatewayListe();
        return $gw->displayAllPublic();
    }

    //récupère la liste d'id $_GET["idListe"]

    /**
     * @throws Exception
     */
    public static function getList(){
        $idListe = Validation::validateInt($_GET["idListe"]);
        $liste = ModelVisiteur::checkListParId($idListe);
        return $liste;
    }

    public static function checkListParId(int $idListe){
        $gwListe = new GatewayListe();
        if(!isset($idListe) || $idListe == NULL) throw new Exception("Il n'y a aucune liste cible.");
        $liste = $gwListe->findById($idListe);
        if(!$liste->getVisibilite()){ throw new Exception("Vous n'avez pas accès à cette liste !"); }
        return $liste;
    }

    //return les taches d'une liste en les passant dans l'URL

    /**
     * @throws Exception
     */
    public static function getTache(){
        $gwTache = new GatewayTache();
        $liste = ModelVisiteur::getList();
        return $gwTache->findById($_GET["idListe"]);
    }

    //ajoute une tache dans la liste d'id $_GET["idListe"]

    /**
     * @throws Exception
     */
    public static function addTache(){ //ajoute une tache dans la liste d'id $_GET["idListe"]
        $gwTache = new GatewayTache();
        $liste = ModelVisiteur::getList();
        $titre = Validation::validateUser($_POST["titre"]);
        $description = Validation::validateString($_POST["description"]);
        $dateFin = Validation::validateDate($_POST["dateFin"]);
        $idListe = $liste->getId();
        $gwTache->insertTaskIn($titre, $description, $dateFin, $idListe, (isset($_POST["fait"]) && $_POST["fait"]) ? true : false);
    }



}