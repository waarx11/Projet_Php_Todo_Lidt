<?php

class FrontController
{

    function __construct()
    {

        global $rep,$vues;
        session_start();


        try {
            $string_actor = '';
            $listeActions = array(
                'Utilisateur' => array('action1', 'action2','connected'),
                'Admin' => array('action3', 'action4'),
            );
            $action = $_REQUEST['action'] ?? null;
            $string_actor = FrontController::byWho($action, $listeActions);
            if ($string_actor != NULL) {

                $mdlClass=('Model'.$string_actor);
                $mdl = new $mdlClass;
                $actor = $mdl->isConnected();
                if ($actor == NULL) {
                    require('sign' . $string_actor);
                } else {
                    $trlClass=('Ctrl' . $string_actor);
                    $ctrl = new $trlClass ;
                }
            }
            else{
                new CtrlVisiter();
            }
        }
        catch(Exception $e){
            $TMessage[]=$e->getMessage();
            require ($rep.$vues['erreur']);
        }

    }

    static function byWho($action,$listeAction){

        foreach($listeAction as $a){
            if(in_array($action, $a)){
                return array_search($a,$listeAction);
            }
        }

        return null;
    }



}

