<?php

namespace classeMetier;
class Visiteur
{
    private string $id;
    private string $nom;
    private string $mdp;

    public function __construct(string $id, string $nom, string $mdp){
        $this->id=$id;
        $this->nom=$nom;
        $this->mdp=$mdp;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    
}