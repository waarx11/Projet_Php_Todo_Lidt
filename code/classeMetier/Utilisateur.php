<?php

class Utilisateur
{
    private $image;
    public function __construct(string $image){
        $this->image=$image;
    }

    public function  ajouteTacheListe(listListe $list,Tache $tache){
        $this->listListe.add(tache);
    }

    public function  supprimerTacheListe(listListe $list,Tache $tache){
        $this->listListe.remove(tache);
    }
}
?>