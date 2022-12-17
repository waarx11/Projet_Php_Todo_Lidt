<?php


class ModelUtilisateur
{
    public function __construct()
    {

    }
    
	 public static function login($login,$mdp){
        global $rep,$vues;
         try {
             if(! ModelUtilisateur::connect($login,$mdp)){
                 $dvueError["loginError"]="mot de pass est incorrect ou l'utilisateur n'esxiste pas";
                 require ($rep.$vues['signUtilisateur']);
             }else{
                 $_REQUEST['action']="connected";
                 new CtrlUtilisateur();
             }
         }catch (Exception $e){
             $dvueError["loginError"]="mot de pass est incorrect ou l'utilisateur n'esxiste pas";
             require ($rep.$vues['signUtilisateur']);
         }

    }
    public static function connect($login,$mdp){

        $gtw=new GatewayUtilisateur();
        $mdpHash=$gtw->getMdpHash($login);
        if( password_verify($mdp,$mdpHash)){
            $_SESSION['role']= "Utilisateur" ;
            $_SESSION['user']=$login;
            return true;
        }
        return false;
    }

    public static function creationCompte($userIdSignUp,$userNameSignUp, $userMail, $password){
        $gtw=new GatewayUtilisateur();
        $role="Utilisateur";
        $mdp=password_hash($password, PASSWORD_DEFAULT);
        if(! ($gtw->userIdExiste($userIdSignUp)) ){
            if($gtw->inserUser(new Utilisateur($userIdSignUp,$userNameSignUp,$userMail,$role),$mdp)){
                return ModelUtilisateur::connect($userIdSignUp,$password);
            }
        }
        else{
            return false;
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