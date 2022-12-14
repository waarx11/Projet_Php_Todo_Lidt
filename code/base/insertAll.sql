USE `dbrakhedair`;
-- INSERT INTO UTILISATEUR (id,mail,nom, roleU, mdp) VALUES ('rami','ramikhdair@gmail.com','Utilisateur', '0000');
-- INSERT INTO LISTE (id,nom, visibilite, description, userid) VALUES (1,'listeDeCourse', FALSE, 'Ceci est ma liste de course est je suis priver', 'rami');
-- INSERT INTO LISTE (id,nom, visibilite, description, userid) VALUES (2,'Cours', TRUE, 'ceci est ma liste de cours à faire est je suis public', 'rami');
--
-- INSERT INTO LISTE (id, nom, visibilite, description, userid) VALUES (3,'Pub1', TRUE, 'Je suis une liste publique', NULL);
-- INSERT INTO LISTE (id, nom, visibilite, description, userid) VALUES (4,'Pub2', TRUE, 'Je suis une autre liste publique', NULL);

INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete,checked, userid, liste) VALUES ('riz', 3, current_date, current_date+4, FALSE, FALSE,'rami', '1');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('pate', 3, current_date, current_date+1, TRUE,FALSE, 'rami', '1');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete,checked, userid, liste) VALUES ('sucre', 5, current_date, current_date+6, TRUE,FALSE, 'rami', '1');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('ketchup', 2, current_date, current_date+8, FALSE,FALSE, 'rami', '1');

INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('Math', 5, current_date, current_date+7, FALSE,FALSE, 'rami', '2');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('SAE', 4, current_date, current_date+2, TRUE,FALSE, 'rami', '2');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PHP projet', 1, current_date, current_date+7, FALSE,TRUE, 'rami', '2');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('Blazor projet', 2, current_date, current_date+7,FALSE, FALSE, 'rami', '2');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('Innovation', 3, current_date, current_date+10, FALSE,FALSE, 'rami', '2');

INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('test6pub1', 1, current_date, current_date+4, FALSE,FALSE, NULL, '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('test5pub1', 6, current_date, current_date+1,FALSE, TRUE, NULL, '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('test4pub1', 5, current_date, current_date+6, FALSE,TRUE, NULL, '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('test3pub1', 2, current_date, current_date+8, FALSE,FALSE, NULL, '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete,checked, userid, liste) VALUES ('test2pub1', 4, current_date, current_date+10,FALSE, TRUE, NULL, '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('test1pub1', 9, current_date, current_date+11,FALSE, FALSE, NULL, '3');

INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('test1pub2', 1, current_date, current_date+1, FALSE,FALSE, NULL, '4');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('test2pub2', 2, current_date, current_date+2,FALSE, TRUE, NULL, '4');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('test3pub2', 3, current_date, current_date+3, FALSE,FALSE, NULL, '4');

