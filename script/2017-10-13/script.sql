INSERT INTO region VALUES(null,'Madagascar','Madagascar');
INSERT INTO region VALUES(null,'La Reunion','La Reunion');
INSERT INTO region VALUES(null,'Maurice','Maurice');

INSERT INTO typeutilisateur VALUES(null,'Membre du club','Membre du club');
INSERT INTO typeutilisateur VALUES(null,'Contributeur','Contributeur');
INSERT INTO typeutilisateur VALUES(null,'Comité de lecture','Comité de lecture');
INSERT INTO typeutilisateur VALUES(null,'Team','Team');
INSERT INTO typeutilisateur VALUES(null,'Comité de pilotage','Comité de pilotage');

INSERT INTO categorie VALUES(null,'Arts','Arts');
INSERT INTO categorie VALUES(null,'Culture','Culture');
INSERT INTO categorie VALUES(null,'Ecologie','Ecologie');

ALTER TABLE utilisateur ADD COLUMN etat int;

INSERT INTO utilisateur VALUES(null,'Nissim'	,'Brenda'		,'brenda@indigo.com'	,'brenda'	,'brenda'	,1,1,1,0);
INSERT INTO utilisateur VALUES(null,'Echo'		,'Madison'		,'madison@indigo.com'	,'madison'	,'madison'	,1,1,2,0);
INSERT INTO utilisateur VALUES(null,'Allegra'	,'Tasha'		,'tasha@indigo.com'		,'tasha'	,'tasha'	,1,2,3,0);
INSERT INTO utilisateur VALUES(null,'Baxter'	,'Cyrus'		,'cyrus@indigo.com'		,'cyrus'	,'cyrus'	,1,2,1,0);
INSERT INTO utilisateur VALUES(null,'Cassandra'	,'Ishmael'		,'ishmael@indigo.com'	,'ishmael'	,'ishmael'	,1,3,2,0);
INSERT INTO utilisateur VALUES(null,'Cameron'	,'Linus'		,'linus@indigo.com'		,'linus'	,'linus'	,1,3,3,0);
INSERT INTO utilisateur VALUES(null,'Dane'		,'Zia'			,'zia@indigo.com'		,'zia'		,'zia'		,1,4,1,0);
INSERT INTO utilisateur VALUES(null,'Kevin'		,'Martin'		,'martin@indigo.com'	,'martin'	,'martin'	,1,4,2,0);
INSERT INTO utilisateur VALUES(null,'Justina'	,'Jackson'		,'jackson@indigo.com'	,'jackson'	,'jackson'	,1,5,3,0);
INSERT INTO utilisateur VALUES(null,'Florence'	,'Sebastian'	,'sebastian@indigo.com'	,'sebastian','sebastian',1,5,1,0);