<?php


class ModelUtilisateur
{
    public function __construct()
    {

    }

    //récupère les taches de la liste $_GET["idListe"]
    public static function getTaskOf(){
        $gwTache = new GatewayTache();
        $liste = ModelUtilisateur::getList();
        return $gwTache->findById($_GET["idListe"]);
    }
    
	 public static function login($login,$mdp){
        $gtw=new GatewayUtilisateur();
        $login=Validation::validateUser($login);
        $mdp=Validation::validatePassword($mdp);

        if( password_verify($mdp,$gtw->getMdpHash($login) )){
            $_SESSION['role']= "Utilisateur" ;
            $_SESSION['login']=$login;
            return new Utilisateur($login,"Utilisateur");
        }
        else{
            return null;
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public function isConnected(){
        if(isset( $_SESSION['login']) && isset($_SESSION['role'])) {
            $login=Validation::validateUser($_SESSION['login']);
            $role=Validation::validateString($_SESSION['login']);
            return new Utilisateur($login,$role);
        }
        else return null;
    }

}