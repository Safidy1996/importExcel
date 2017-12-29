/*==============================================================*/
/* nom de sgbd :  mysql 5.0                                     */
/* date de création :  26/12/2017 21:14:04                      */
/*==============================================================*/

drop database if exists importexcel;

create database importexcel;

use importexcel;


drop table if exists exp_table;

drop table if exists operation_standard;

drop table if exists personne;

drop table if exists regle_validation;

drop table if exists utilisateur;



/*==============================================================*/
/* table : exp_table                                            */
/*==============================================================*/
create table exp_table
(
   id_exp_table         int not null auto_increment,
   nom_exp_table        varchar(20) not null,
   primary key (id_exp_table)
);

/*==============================================================*/
/* table : operation_standard                                  */
/*==============================================================*/
create table operation_standard
(
   id_operation_standard int not null,
   libelle_operation_standard varchar(10) not null,
   primary key (id_operation_standard)
);

/*==============================================================*/
/* table : personne                                             */
/*==============================================================*/
create table personne
(
   id_personne          int not null,
   nom_personne         longtext not null,
   prenom_personne      varchar(50),
   dette_personne       float(10),
   creance_personne     float(10),
   etat tinyint,
   primary key (id_personne)
);

/*==============================================================*/
/* table : regle_validation                                     */
/*==============================================================*/
create table regle_validation
(
   id_regle_validation  int not null,
   id_utilisateur       int not null,
   id_exp_table         int not null,
   valeur_regle_validation varchar(100) not null,
   date_regle_validation datetime,
   commentaire varchar(100),
   primary key (id_regle_validation)
);


/*==============================================================*/
/* table : utilisateur                                          */
/*==============================================================*/
create table utilisateur
(
   id_utilisateur       int not null,
   nom_utilisateur      varchar(100) not null,
   prenom_utilisateur   varchar(100),
   mail_utilisateur     varchar(100) not null,
   sexe_utilisateur     varchar(100),
   mdp_utilisateur      varchar(100) not null,
   primary key (id_utilisateur)
);


alter table regle_validation add constraint fk_etre_dans_une_table foreign key (id_exp_table)
      references exp_table (id_exp_table) on delete restrict on update restrict;

alter table regle_validation add constraint fk_poser_regle foreign key (id_utilisateur)
      references utilisateur (id_utilisateur) on delete restrict on update restrict;


INSERT INTO `utilisateur`(`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `sexe_utilisateur`, `mdp_utilisateur`) VALUES (1,'Billy','Li','billy@gmail.com','m','051522d0c46404d8ba5b692a10a37b99b8186360')

insert into exp_table values (1,'personne')
