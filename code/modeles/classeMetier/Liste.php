<?php

namespace classeMetier;

use gateway\GatewayListe;

include_once("GatewayListe.php");
include_once("GatewayTache.php");

class Liste
{
    private $id;
    private $nom;
    private $visibilite;
    private $description;
    private $userid;

    public function __construct($id,$nom, $visibilite, $description, $userid)
    {
        $this->id=$id;
        $this->nom = $nom;
        $this->visibiliter = $visibilite;
        $this->description = $description;
        $this->userid=$userid;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getVisibiliter()
    {
        return $this->visibiliter;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @return mixed
     */
    public function getVisibilite()
    {
        return $this->visibilite;
    }


}