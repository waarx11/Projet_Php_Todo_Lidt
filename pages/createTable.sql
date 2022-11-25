CREATE TABLE TACHE(
                       id CHAR(6) CONSTRAINT pk_idTache PRIMARY KEY,
                       nom VARCHAR(30) NOT NULL,
                       priorite NUMERIC,
                       dateCreation DATE NOT NULL,
                       dateFin DATE NOT NULL CONSTRAINT ck_dateFinTache CHECK (dateCreation<dateFin),
                       repete BOOL NOT NULL,
                       maliste CONSTRAINT fk_listAche REFERENCES LISTACHES,
                       envieTache CONSTRAINT fk_envie REFERENCES ENVIE
);

CREATE TABLE ENVIE(
                      nom VARCHAR(30) CONSTRAINT pk_envie PRIMARY KEY,
                      image VARCHAR(50) NOT NULL
);

CREATE TABLE SOUSTACHE(
                          id CHAR(6) CONSTRAINT pk_sousTache PRIMARY KEY,
                          nom VARCHAR(30) NOT NULL,
                          dateCreation DATE NOT NULL,
                          dateFin DATE NOT NULL CONSTRAINT ck_dateFinsousTache CHECK (dateCreation<dateFin),
                          tacheMere CONSTRAINT fk_tacheMere REFERENCES TACHE
);

CREATE TABLE LISTACHES(
                          id CHAR(6) CONSTRAINT pk_listTaches PRIMARY KEY,
                          nom VARCHAR(30) NOT NULL,
                          visibilite BOOL NOT NULL,
                          description VARCHAR(150),
                          utilisateur CONSTRAINT fk_utilisateur REFERENCES UTILISATEUR
);

CREATE TABLE UTILISATEUR(
                            id CHAR(6) CONSTRAINT pk_utilisateur PRIMARY KEY,
                            nom VARCHAR(30) NOT NULL,
                            mdp VARCHAR(100) NOT NULL
);