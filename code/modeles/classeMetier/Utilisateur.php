<?php

namespace classeMetier;

use listListe;

class Utilisateur
{
    private $id;
    private $nom;

    public function __construct(string $image)
    {
        $this->image = $image;
    }

    public function ajouteTacheListe(listListe $list, Tache $tache)
    {
        $this->listListe . add(tache);
    }

    public function supprimerTacheListe(listListe $list, Tache $tache)
    {
        $this->listListe . remove(tache);
    }
}

?>