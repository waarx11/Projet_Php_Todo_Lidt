<?php

namespace classeMetier;

use gateway\GatewayListe;

include_once("GatewayListe.php");
include_once("GatewayTache.php");

class Liste
{
    private string $id;
    private string $nom;
    private bool $visibilite;
    private string $description;
    private string $userid;

    public function __construct(string $id,string $nom,bool $visibilite, string $description,string $userid)
    {
        $this->id=$id;
        $this->nom = $nom;
        $this->visibilite = $visibilite;
        $this->description = $description;
        $this->userid=$userid;
    }

    /**
     * @return mixed
     */
    public function getNom():string
    {
        return $this->nom;
    }


    /**
     * @return mixed
     */
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getId():string
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserid():string
    {
        return $this->userid;
    }

    /**
     * @return mixed
     */
    public function getVisibilite():bool
    {
        return $this->visibilite;
    }


}