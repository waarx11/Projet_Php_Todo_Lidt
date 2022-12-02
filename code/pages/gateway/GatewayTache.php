<?php

class GatewayTache
{
    public function inserTache():array{
        $query="INSERT INTO TACHE";
        id CHAR(6) CONSTRAINT pk_idTache PRIMARY KEY,
                       nom VARCHAR(30) NOT NULL,
                       priorite NUMERIC,
                       dateCreation DATE NOT NULL,
                       dateFin DATE NOT NULL CONSTRAINT ck_dateFinTache CHECK (dateCreation<dateFin),
                       repete BOOL NOT NULL,
                       maliste CONSTRAINT fk_listAche REFERENCES LISTACHES,
                       envieTache
    }
}