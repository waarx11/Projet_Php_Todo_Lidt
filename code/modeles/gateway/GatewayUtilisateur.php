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
        $query = "INSERT INTO UTILISATEUR(id,mail,nom, roleU, mdp) VALUES (:id,:mail,:nom,:roleU,:mdp)";
        //Pas besoin de préciser l'id car il est automatiquement incrémenter.
        if ($this->conx->executeQuery($query, array(
            ':id' => array($user->getId(), PDO::PARAM_STR_CHAR),
            ':nom' => array($user->getNom(), PDO::PARAM_STR_CHAR),
            ':mail' => array($user->getMail(), PDO::PARAM_STR_CHAR),
            ':roleU' => array($user->getRole(), PDO::PARAM_STR_CHAR),
            ':mdp' => array($mdp, PDO::PARAM_STR_CHAR)))) {
                return TRUE;
        } else {
            throw new PDOException("Class GatewayListe inserListe : la query n'est pas executable");
        }
    }

    public function getMdpHash($id):string
    {
        $query = "SELECT mdp FROM UTILISATEUR WHERE id=:id";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_STR_CHAR)))) {
                  $res=$this->conx->getResults()[0]['mdp'] ?? null;
                 if($res==null)
                     throw new Exception("mot de passe invalid");
                 else{
                     return $res;
                 }

        } else {
            throw new PDOException("Class GatewayUtilisateur getMdpHash : la query n'est pas executable");
        }

    }


    
}