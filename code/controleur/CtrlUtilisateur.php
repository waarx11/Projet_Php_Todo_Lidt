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
                case "connectionPage" :
                    $this->connectionPage();
                    break;
                case "tacheX" :
                    $idList=$_REQUEST['idList'] ?? null;
                    $idListeVerif = Validation::validateInt($idList);
                    $this->tacheX($idListeVerif);
                    break;
                case "tacheXDelet" :
                    $idTask=$_REQUEST['idTask'] ?? null;
                    $idTaskVerif = Validation::validateInt($idTask);
                    $this->tacheXDelet($idTaskVerif);
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

    function Reinit() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $dVue = ModelVisiteur::getPublicList();
        require ($rep.$vues['homeList']);
    }
    function checkedPrc($id){

        return ModelVisiteur::getCheckedPrc($id);
    }

}