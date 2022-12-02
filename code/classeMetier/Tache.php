<?php

use Cassandra\Date;

class Tache
{
    private $tache_nom;
    private $tache_dateCreation;
    private $tache_dateFin;
    private $tache_tag;
    private $tache_repetition;
    public function __construct($nom, $dateFin, $repetition) {
        $this->tache_dateCreation =date("dmY");
        $this->tache_nom=$nom;
        $this->tache_dateFin =$dateFin;
        $this->tache_nom=$nom;
        $this->tache_tag=array(
            strtoupper($nom) => $nom,
            strtolower($nom) => $nom);
        $this->tache_repetition=$repetition;
    }
    public function validation(){

    }
}