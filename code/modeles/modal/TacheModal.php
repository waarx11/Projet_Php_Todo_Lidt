<?php

class TacheModal
{
    private string $nom;
    private $dateFin;
    private bool $repetition;
    private string $liste;
    private  $userid;

    private int $priorite;

    public function __construct(string $nom,$dateFin,bool $repetition,int $priorite ,  $userid, string $liste)
    {
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