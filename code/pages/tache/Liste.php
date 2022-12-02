<?php

use Cassandra\Date;
include_once("GatewayListe.php");
include_once("GatewayTache.php");

class Liste
{
    private $liste_nom;
    private $liste_visibiliter;
    private $liste_description;
    private GatewayListe $gateListe;
    private GatewayListe $gateTache;

    public function __construct($nom, $visibiliter, $description){
        $this->liste_nom=$nom;
        $this->liste_visibiliter=$visibiliter;
        $this->liste_description=$description;
    }

    public function ajouterTache(Tache $tache){
        $this->gateTache->inserTache($tache);
    }

    public function afficheListe(){
        $this->gateTache->displayAll();
    }

}