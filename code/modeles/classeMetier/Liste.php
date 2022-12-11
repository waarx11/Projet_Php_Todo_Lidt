<?php



class Liste
{
    private int $id;
    private string $nom;
    private bool $visibilite;
    private string $description;
    private string $userid;

    public function __construct(int $id,string $nom,bool $visibilite, string $description,string $userid)
    {
        $this->id=$id;
        $this->nom = $nom;
        $this->visibilite = $visibilite;
        $this->description = $description;
        $this->userid=$userid;
    }

    public function __toString(){
        return ($this->id . $this->nom .$this->visibilite . $this->description .$this->userid.'</br>');
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