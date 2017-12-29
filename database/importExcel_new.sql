/*==============================================================*/
/* nom de sgbd :  mysql 5.0                                     */
/* date de cr�ation :  28/12/2017 17:38:54                      */
/*==============================================================*/
drop database if exists importexcel;

create database importexcel;

use importexcel;

drop table if exists exp_table;

drop table if exists operation_standard;

drop table if exists personne;

drop table if exists personne_regle_non_valide;

drop table if exists regle_validation;

drop table if exists utilisateur;

/*==============================================================*/
/* table : exp_table                                            */
/*==============================================================*/
create table exp_table
(
   id_exp_table         int not null,
   nom_exp_table        varchar(20) not null,
   primary key (id_exp_table)
);

/*==============================================================*/
/* table : operation_standard                                   */
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
   etat                 smallint,
   primary key (id_personne)
);

/*==============================================================*/
/* table : personne_regle_non_valide                            */
/*==============================================================*/
create table regle_non_valide
(
   id_regle_non_valide          int not null,
   nomtable varchar(50) not null,
   id_regle_validation  int not null,
   id_class int not null,
   primary key (id_regle_non_valide)
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
   primary key (id_regle_validation)
);

alter table regle_validation comment 'cette table consiste � mettre les r�gles mise en place place';

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


alter table personne_regle_non_valide add constraint fk_personne_regle_non_valide2 foreign key (id_regle_validation)
      references regle_validation (id_regle_validation) on delete restrict on update restrict;

alter table regle_validation add constraint fk_etre_dans_une_table foreign key (id_exp_table)
      references exp_table (id_exp_table) on delete restrict on update restrict;

alter table regle_validation add constraint fk_poser_regle foreign key (id_utilisateur)
      references utilisateur (id_utilisateur) on delete restrict on update restrict;

insert into `utilisateur`(`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `sexe_utilisateur`, `mdp_utilisateur`) values (1,'billy','li','billy@gmail.com','m','051522d0c46404d8ba5b692a10a37b99b8186360');

insert into exp_table values (1,'personne');



select p.*, rv.commentaire as comment from personne as p
   left join regle_non_valide as rnv on rnv.nomtable = 'personne' and rnv.id_class = p.id_personne 
   left join regle_validation rv on rv.id_regle_validation = rnv.id_regle_validation;

