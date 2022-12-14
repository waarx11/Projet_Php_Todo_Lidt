<?php

require_once('Connection.php');

//require_once ('');
class GatewayUtilisateur
{
    private Connection $conx;

    public function __construct()
    {
        global $base,$login,$mdp;
        $this->conx = new Connection($base, $login,$mdp);
    }

    public function inserUser(Utilisateur $user,$mdp)
    {
        $query = "INSERT INTO UTILISATEUR(mail,nom, roleU, mdp) VALUES (:nom,:mail,:roleU, :mdp)";
        //Pas besoin de préciser l'id car il est automatiquement incrémenter.
        if ($this->conx->executeQuery($query, array(
            ':nom' => array($user->getNom(), PDO::PARAM_STR_CHAR),
            ':mail' => array($user->getMail(), PDO::PARAM_STR_CHAR),
            ':roleU' => array($user->getRole(), PDO::PARAM_STR_CHAR),
            ':mdp' => array($mdp, PDO::PARAM_STR_CHAR)))) {
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayListe inserListe : la query n'est pas executable");
        }
    }

    public function getMdpHash($id):string
    {
        $query = "SELECT mdp FROM UTILISATEUR WHERE id=:id";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_STR_CHAR)))) {
                return $this->conx->getResults()[0]['mdp'];
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayUtilisateur getMdpHash : la query n'est pas executable");
        }
    }
    public function isConnected($id):string
    {
        $query = "SELECT mdp FROM UTILISATEUR WHERE id=:id";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_STR_CHAR)))) {
            return $this->conx->getResults()[0]['mdp'];
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayUtilisateur getMdpHash : la query n'est pas executable");
        }
    }

    
}