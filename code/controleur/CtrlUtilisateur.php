<?php

class CtrlUtilisateur
{
    function __construct() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        //session_start();


//debut

//on initialise un tableau d'erreur
        $dVueEreur = array ();
        try{
            $action=$_REQUEST['action'] ?? null;

            switch($action){
                //pas d'action, on rinitialise 1er appel
                case 'connected':
                    $this->Reinit();
                    break;

                case "logout":
                    $this->logout();
                    break;
                case "listDelete":
                    $this->listDelete();
                    break;

                case "addList":
                    $this->addList();
                    break;

                default:
                    $dVueEreur[] =	"Erreur d'appel php";
                    require ($rep.$vues['vuephp1']);
                    break;

            }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	$e2->getMessage();
            require ($rep.$vues['erreur']);
        }


        //fin
        exit(0);
    }//fin constructeur

    public function Reinit() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $dVue = ModelVisiteur::getPublicList();
        require ($rep.$vues['homeList']);
    }
    public function checkedPrc($id){

        return ModelVisiteur::getCheckedPrc($id);
    }
    public function listDelete(){
        $idList=$_REQUEST['idList'] ?? null;
        ModelUtilisateur::deleteList($idList);
        $_REQUEST['action']='connected';
        new CtrlUtilisateur();
    }
    private function addList()
    {
        if (empty($_POST['listName']) ) {
            $dVueEreur['nom'] = 'Il faut renseigné le ';
            $error=true;
        } else {
            $listName = $_POST['listName'];
        }
        if (empty($_POST['listDescription']) ) {
            $dVueEreur['listDescription'] = 'Il faut renseigné le ';
            $error=true;
        } else {
            $listDescription = $_POST['listDescription'];
        }
        $listVisibilite=$_POST['listVisibilite'];
        ModelUtilisateur::ajoutList(new ListModal($listName,$listVisibilite,$listDescription,$_SESSION['user']));
        $_REQUEST['action']='connected';
        new CtrlUtilisateur();

    }

    public function logout()
    {
        ModelUtilisateur::logout();
        $_REQUEST['action']=null;
        new CtrlVisiter();
    }

}