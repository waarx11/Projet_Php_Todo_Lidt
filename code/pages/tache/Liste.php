<?php

use Cassandra\Date;

class Liste
{
    private $listTache;
    private $liste_nom;
    private $liste_visibiliter;
    private $liste_description;

    public function __construct($nom, $visibiliter, $description){
        $this->liste_nom=$nom;
        $this->liste_visibiliter=$visibiliter;
        $this->liste_description=$description;
    }

    public function ajouterTache(Tache $tache){
        $this->listTache->append($tache);
    }

    public function afficheListe(){

    }

}