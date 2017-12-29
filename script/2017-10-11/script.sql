CREATE TABLE typeabonnement(
	id int primary key auto_increment,
	val varchar(100),
	desce varchar(100)
)engine=innodb;

CREATE TABLE modepaiement(
	id int primary key auto_increment,
	val varchar(100),
	desce varchar(100)
)engine=innodb;

CREATE TABLE tarif(
	id int primary key auto_increment,
	prix float,
	daty date,
	typeabonnement int
)engine=innodb;

ALTER TABLE tarif ADD FOREIGN KEY(typeabonnement) REFERENCES typeabonnement(id);


CREATE TABLE abonnement(
	id int primary key auto_increment,
	datedebut date,
	datefin date,
	utilisateur int,
	typeabonnement int
)engine=innodb;

ALTER TABLE abonnement ADD FOREIGN KEY(utilisateur) REFERENCES utilisateur(id);
ALTER TABLE abonnement ADD FOREIGN KEY(typeabonnement) REFERENCES typeabonnement(id);

CREATE TABLE mvtcaisse(
	id int primary key auto_increment,
	daty date,
	modepaiement int,
	idobjet int,
	montant float,
	utilisateur int
)engine=innodb;

ALTER TABLE mvtcaisse ADD FOREIGN KEY(utilisateur) REFERENCES utilisateur(id);
ALTER TABLE mvtcaisse ADD FOREIGN KEY(modepaiement) REFERENCES modepaiement(id);