<?php

class FrontController
{
    function __construct()
    {

        global $rep,$vues;

        try {
            $string_actor = '';
            $listeActions = array(
                'Utilisateur' => array('action1', 'action2'),
                'Admin' => array('action3', 'action4'),
            );
            $action = $_REQUEST['action']?? null;
            $string_actor = FrontController::byWho($action, $listeActions);
            if ($string_actor != NULL) {
                $mdl = new ('Model'.$string_actor);
                $actor = $mdl.isConnected();
                if ($actor == NULL) {
                    require('sign' . $string_actor);
                } else {
                    $ctrl = new ('Ctrl' . $string_actor);
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

