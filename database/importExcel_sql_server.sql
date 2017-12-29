/*==============================================================*/
/* table : exp_table                                            */
/*==============================================================*/
create table exp_table
(
   id_exp_table         int IDENTITY(1,1) not null,
   nom_exp_table        varchar(20) not null,
   primary key (id_exp_table)
);

/*==============================================================*/
/* table : operation_standard                                   */
/*==============================================================*/
create table operation_standard
(
   id_operation_standard int IDENTITY(1,1) not null,
   libelle_operation_standard varchar(10) not null,
   primary key (id_operation_standard)
);

/*==============================================================*/
/* table : personne                                             */
/*==============================================================*/
create table personne
(
   id_personne          int IDENTITY(1,1) not null,
   nom_personne         varchar(50) not null,
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
   id_regle_non_valide          int IDENTITY(1,1) not null,
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
   id_regle_validation  int IDENTITY(1,1) not null,
   id_utilisateur       int not null,
   id_exp_table         int not null,
   valeur_regle_validation varchar(100) not null,
   date_regle_validation datetime,
   primary key (id_regle_validation)
);


/*==============================================================*/
/* table : utilisateur                                          */
/*==============================================================*/
create table utilisateur
(
   id_utilisateur       int IDENTITY(1,1) not null,
   nom_utilisateur      varchar(100) not null,
   prenom_utilisateur   varchar(100),
   mail_utilisateur     varchar(100) not null,
   sexe_utilisateur     varchar(100),
   mdp_utilisateur      varchar(100) not null,
   primary key (id_utilisateur)
);


alter table regle_validation add constraint fk_etre_dans_une_table foreign key (id_exp_table)
      references exp_table (id_exp_table);

alter table regle_validation add constraint fk_poser_regle foreign key (id_utilisateur)
      references utilisateur (id_utilisateur);
