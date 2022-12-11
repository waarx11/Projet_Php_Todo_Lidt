<?php

class ModelTache
{
    public function __construct()
    {

    }

    public static function getTachesPublic($idList){
        $gwTache = new GatewayTache();
        return $gwTache->findByIdListOrderedPublic($idList);
    }

}