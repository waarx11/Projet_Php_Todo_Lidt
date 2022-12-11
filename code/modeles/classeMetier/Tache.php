<?php


class Tache
{
    private int $id;
    private string $nom;
    private $dateCreation;
    private $dateFin;
    private bool $repetition;
    private bool $checked;
    private string $liste;
    private string $userid;

    private int $priorite;

    public function __construct(int $id,string $nom, $dateCreation,$dateFin,bool $repetition,int $priorite ,bool $checked, string $userid, string $liste)
    {
        $this->id=$id;
        $this->dateCreation = $dateCreation;
        $this->nom = $nom;
        $this->dateFin = $dateFin;
        $this->repetition = $repetition;
        $this->checked = $checked;
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

    /**
     * @return bool
     */
    public function getChecked(): bool
    {
        return $this->checked;
    }
}