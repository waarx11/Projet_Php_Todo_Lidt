USE `dbrakhedair`;
-- INSERT INTO `UTILISATEUR` (`id`, `mail`, `nom`, `roleU`, `mdp`) VALUES ('rami', 'ramikhdair10@gmail.com', 'rami', 'Utilisateur', '0000');
INSERT INTO LISTE (id,nom, visibilite, description, userid) VALUES (1,'CourseRamiPrive', FALSE, 'Ceci est ma liste de course est je suis priver', 'rami');
INSERT INTO LISTE (id,nom, visibilite, description, userid) VALUES (2,'CoursPublic', TRUE, 'ceci est ma liste de cours à faire est je suis public', 'rami');

INSERT INTO LISTE (id, nom, visibilite, description, userid) VALUES (3,'PubRami', TRUE, 'Je suis une liste publique', 'rami');
INSERT INTO LISTE (id, nom, visibilite, description, userid) VALUES (4,'PubNathan', TRUE, 'Je suis une autre liste publique', 'nat');
INSERT INTO LISTE (id,nom, visibilite, description, userid) VALUES (5,'CourseNathanPrive', FALSE, 'Ceci est ma liste de course est je suis priver', 'nat');

INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete,checked, userid, liste) VALUES ('riz', 3, current_date, current_date+4, FALSE, FALSE,'rami', '1');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('pate', 3, current_date, current_date+1, TRUE,FALSE, 'rami', '1');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete,checked, userid, liste) VALUES ('sucre', 5, current_date, current_date+6, TRUE,FALSE, 'rami', '1');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('ketchup', 2, current_date, current_date+8, FALSE,FALSE, 'rami', '1');

INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('Math', 5, current_date, current_date+7, FALSE,FALSE, 'rami', '2');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('SAE', 4, current_date, current_date+2, TRUE,FALSE, 'rami', '2');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PHP projet', 1, current_date, current_date+7, FALSE,TRUE, 'rami', '2');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('Blazor projet', 2, current_date, current_date+7,FALSE, FALSE, 'rami', '2');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('Innovation', 3, current_date, current_date+10, FALSE,FALSE, 'rami', '2');

INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('CalculAvance', 5, current_date, current_date+7, FALSE,FALSE, 'rami', '5');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('SQL', 4, current_date, current_date+2, TRUE,FALSE, 'rami', '5');



INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PubRami', 1, current_date, current_date+4, FALSE,FALSE, 'rami', '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PubRami', 6, current_date, current_date+1,FALSE, TRUE, 'rami', '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PubRami', 5, current_date, current_date+6, FALSE,TRUE, 'rami', '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PubRami', 2, current_date, current_date+8, FALSE,FALSE, 'rami', '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete,checked, userid, liste) VALUES ('PubRami', 4, current_date, current_date+10,FALSE, TRUE, 'rami', '3');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PubRami', 9, current_date, current_date+11,FALSE, FALSE, 'rami', '3');

INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PubNathan', 1, current_date, current_date+1, FALSE,FALSE, 'nat', '4');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PubNathan', 2, current_date, current_date+2,FALSE, TRUE, 'nat', '4');
INSERT INTO TACHE (nom, priorite, dateCreation, dateFin, repete, checked,userid, liste) VALUES ('PubNathan', 3, current_date, current_date+3, FALSE,FALSE, 'nat', '4');

