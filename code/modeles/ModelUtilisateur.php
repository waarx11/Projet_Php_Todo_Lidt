<?php


class ModelUtilisateur
{
    public function __construct()
    {

    }
    
	 public static function login($login,$mdp){
        $gtw=new GatewayUtilisateur();
        $login=Validation::validateUser($login);
        $mdp=Validation::validatePassword($mdp);
        if( password_verify($mdp,$gtw->getMdpHash($login ))){
            $_SESSION['role']= "Utilisateur" ;
            $_SESSION['user']=$login;
            return true;
        }
        else{
            return null;
        }
    }

    public static function creationCompte($userIdSignUp,$userNameSignUp, $userMail, $password){
        $gtw=new GatewayUtilisateur();
        $id=Validation::validateUser($userIdSignUp);
        $userNameSignUp=Validation::validateUser($userNameSignUp);
        $userMail=Validation::validateMail($userMail);
        $password=Validation::validatePassword($password);
        $role="Utilisateur";
        $mdp=password_hash($password, PASSWORD_DEFAULT);
        if($gtw->inserUser(new Utilisateur($id,$userNameSignUp,$userMail,$role),$mdp)){
            return ModelUtilisateur::login($userNameSignUp,$mdp);
        }
        else{
            return null;
        }
    }

    public static function logout(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }



    public function isConnected(){
        if(isset( $_SESSION['user']) && isset($_SESSION['role']) ) {

            if($_SESSION['role']=='Utilisateur'){

                return 'Utilisateur';
            }
        }
        return null;
    }

    public static function ajoutList(ListModal $listAdd)
    {
        $gtwList=new GatewayListe();
        $gtwList->addList($listAdd);
    }

    public static function deleteList($idList){
        if($idList!=NULL){
            $gtwList=new GatewayListe();
            $gtwTache=new GatewayTache();
            $gtwTache->deleteTacheByList($idList,$_SESSION['user']);
            $gtwList->supprList($idList,$_SESSION['user']);
        }
        
    }

    

}