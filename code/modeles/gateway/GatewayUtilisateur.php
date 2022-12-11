<?php

namespace gateway;

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
    public function getMdpHash($id):string
    {
        $query = "SELECT mdp FROM UTILISATEUR WHERE id=:id";
        if ($this->conx->executeQuery($query, array(':id' => array($id, PDO::PARAM_STR_CHAR)))) {
                return $this->con->getResults()[0]['mdp'];
        } else {
            throw new \mysql_xdevapi\Exception("Class GatewayUtilisateur getMdpHash : la query n'est pas executable");
        }
    }

    
}