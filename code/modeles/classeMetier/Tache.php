<?php

namespace classeMetier;

class Tache
{
    private $id;
    private $nom;
    private $dateCreation;
    private $dateFin;
    private $repetition;
    private $liste;
    private $userid;
    private $priorite;

    public function __construct($id,$nom, $dateFin, $repetition,$priorite ,$liste, $userid)
    {
        $this->id=$id;
        $this->dateCreation = date("dmY");
        $this->nom = $nom;
        $this->dateFin = $dateFin;
        $this->repetition = $repetition;
        $this->liste=$liste;
        $this->userid=$userid;
        $this->priorite=$priorite;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return false|string
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @return mixed
     */
    public function getRepetition()
    {
        return $this->repetition;
    }

    /**
     * @return mixed
     */
    public function getPriorite()
    {
        return $this->priorite;
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
    public function getUser()
    {
        return $this->userid;
    }

    /**
     * @return mixed
     */
    public function getListe()
    {
        return $this->liste;
    }
}