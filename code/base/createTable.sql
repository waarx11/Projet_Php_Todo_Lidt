CREATE TABLE TACHE(
                       id CHAR(6) CONSTRAINT pk_idTache PRIMARY KEY,
                       nom VARCHAR(30) NOT NULL,
                       priorite NUMERIC,
                       dateCreation DATE NOT NULL,
                       dateFin DATE NOT NULL CONSTRAINT ck_dateFinTache CHECK (dateCreation<dateFin),
                       repete BOOL NOT NULL,
                       userid CONSTRAINT fk_utilisateur REFERENCES UTILISATEUR,
                       liste CONSTRAINT fk_liste REFERENCES LISTACHES
);

CREATE TABLE LISTE(
                          id CHAR(6) CONSTRAINT pk_listTaches PRIMARY KEY,
                          nom VARCHAR(30) NOT NULL,
                          visibilite BOOL NOT NULL,
                          description VARCHAR(150),
                          userid CONSTRAINT fk_utilisateur REFERENCES UTILISATEUR
);

CREATE TABLE UTILISATEUR(
                            id CHAR(6) CONSTRAINT pk_utilisateur PRIMARY KEY,
                            nom VARCHAR(30) NOT NULL,
                            mdp VARCHAR(100) NOT NULL
);



