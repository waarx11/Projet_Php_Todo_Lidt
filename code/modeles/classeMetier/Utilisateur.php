<?php


class Utilisateur
{

    private string $id;
    private string $nom;
    private string $mail;
    private string $role;

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    public function __construct(string $id, string $nom, string $mail, string $role)
    {
        $this->id=$id;
        $this->nom=$nom;
        $this->mail=$mail;
        $this->role=$role;
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

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }
    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
}

?>