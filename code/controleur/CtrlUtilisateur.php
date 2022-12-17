<?php

class CtrlUtilisateur
{
    function __construct() {
        global $rep,$vues;
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
                    require ($rep.$vues['erreur']);
                    break;

            }

        } catch (PDOException $e)
        {
            $dVueEreur[] =	"Erreur De base de donne!!! ";
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	$e2->getMessage();
            require ($rep.$vues['erreur']);
        }

        exit(0);
    }

    public function Reinit() {
        global $rep,$vues;
        $_COOKIE['path']="/home/connected";

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
        global $rep,$vues;
        $error=false;
        if (empty($_POST['listName']) ) {
            $dVueEreur['nom'] = 'nom vide ';
            $error=true;
        } else {
            $listName = $_POST['listName'];
            $listName=Validation::cleanString($listName);

        }
        if (empty($_POST['listDescription']) ) {
            $dVueEreur['description'] = 'description vide';
            $error=true;
        } else {
            $listDescription = $_POST['listDescription'];
            $listDescription=Validation::cleanString($listDescription);
        }
        if($error){
            $_COOKIE['path']="/home/connected";

            $dVue = ModelVisiteur::getPublicList();
            require ($rep.$vues['homeList']);

        }
        else{
            $listVisibilite=$_POST['listVisibilite'];

            ModelUtilisateur::ajoutList(new ListModal($listName,$listVisibilite,$listDescription,$_SESSION['user']));
            $_REQUEST['action']='connected';
            new CtrlUtilisateur();
        }
    }

    public function logout()
    {
        ModelUtilisateur::logout();
        $_REQUEST['action']=null;
        new CtrlVisiter();
    }

}