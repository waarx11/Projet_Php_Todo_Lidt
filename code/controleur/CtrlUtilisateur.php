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
        $this->Reinit();
    }
    

    public function logout()
    {
        ModelUtilisateur::logout();
        $_REQUEST['action']=null;
        new CtrlVisiter();
    }

}