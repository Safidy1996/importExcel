ALTER TABLE contribution MODIFY daty TIMESTAMP;
ALTER TABLE contribution ADD date_modif TIMESTAMP;
ALTER TABLE contribution ADD is_modif int;

create or replace view contribution_region as 
SELECT contribution.id, contribution.titre, contribution.extrait, contribution.contenu, 
contribution.daty,contribution.date_modif,contribution.is_modif, contribution.etat, 
concat(concat(utilisateur.nom, ' '), utilisateur.prenom) as auteur, 
utilisateur.region as idsource FROM contribution 
join utilisateur on contribution.auteur = utilisateur.id ;
create or replace view contribution_auteur as 
SELECT contribution.id, contribution.titre, contribution.extrait, contribution.contenu, 
contribution.daty,contribution.date_modif,contribution.is_modif, contribution.etat, 
concat(concat(utilisateur.nom, ' '), utilisateur.prenom) as auteur, 
utilisateur.id as idsource FROM contribution 
join utilisateur on contribution.auteur = utilisateur.id ;

create or replace view contribution_vue as select contribution.id, titre, extrait, contenu, concat(concat(utilisateur.nom, ' '), utilisateur.prenom) as auteur, daty,date_modif,is_modif, idsource, contribution.etat from contribution join utilisateur on contribution.auteur = utilisateur.id
