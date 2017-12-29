CREATE TABLE region(
	id int primary key auto_increment,
	val varchar(100),
	desce varchar(100)
)engine=innodb;

CREATE TABLE categorie(
	id int primary key auto_increment,
	val varchar(100),
	desce varchar(100)
)engine=innodb;

CREATE TABLE typeutilisateur(
	id int primary key auto_increment,
	val varchar(100),
	desce varchar(100)
)engine=innodb;

CREATE TABLE utilisateur(
	id int primary key auto_increment,
	nom varchar(100),
	prenom varchar(100),
	mail varchar(100),
	login varchar(100),
	pwd varchar(100),
	rang int,
	typeutilisateur int,
	region int
)engine=innodb;

ALTER TABLE utilisateur ADD FOREIGN KEY(typeutilisateur) REFERENCES typeutilisateur(id);
ALTER TABLE utilisateur ADD FOREIGN KEY(region) REFERENCES region(id);


CREATE TABLE contribution(
	id int primary key auto_increment,
	titre varchar(100),
	extrait varchar(200),
	contenu varchar(500),
	auteur int,
	daty date,
	idsource int,
	etat int
)engine=innodb;

ALTER TABLE contribution ADD FOREIGN KEY(auteur) REFERENCES utilisateur(id);
ALTER TABLE contribution ADD FOREIGN KEY(idsource) REFERENCES contribution(id);

CREATE TABLE commentaire(
	id int primary key auto_increment,
	utilisateur int,
	contribution int,
	contenu varchar(250),
	daty date
)engine=innodb;

ALTER TABLE commentaire ADD FOREIGN KEY(utilisateur) REFERENCES utilisateur(id);
ALTER TABLE commentaire ADD FOREIGN KEY(contribution) REFERENCES contribution(id);

CREATE TABLE historique(
	id int primary key auto_increment,
	etat int,
	utilisateur int,
	contribution int,
	daty date
)engine=innodb;

ALTER TABLE historique ADD FOREIGN KEY(utilisateur) REFERENCES utilisateur(id);
ALTER TABLE historique ADD FOREIGN KEY(contribution) REFERENCES contribution(id);


CREATE TABLE parution(
	id int primary key auto_increment,
	daty date not null,
	numero varchar(100) not null
)engine=innodb;

CREATE TABLE contribparution(
	id int primary key auto_increment,
	contribution int not null,
	parution int not null
)engine=innodb;

ALTER TABLE contribparution ADD FOREIGN KEY(contribution) REFERENCES contribution(id);
ALTER TABLE contribparution ADD FOREIGN KEY(parution) REFERENCES parution(id);

CREATE TABLE notification(
	id int primary key auto_increment,
	idobjet int,
	expediteur int,
	destinataire int,
	daty date,
	etat int
)engine=innodb;

ALTER TABLE notification ADD FOREIGN KEY(expediteur) REFERENCES utilisateur(id);
ALTER TABLE notification ADD FOREIGN KEY(destinataire) REFERENCES utilisateur(id);
