<?php

namespace classeMetier;

use listListe;

class Utilisateur
{
    private string $id;
    private string $nom;

    public function __construct(string $id,string $nom)
    {
        $this->id=$id;
        $this->nom=$nom;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }
}

?>