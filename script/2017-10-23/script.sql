create view contribution_region as 
SELECT contribution.id, contribution.titre, contribution.extrait, contribution.contenu, 
contribution.daty, contribution.etat, 
concat(concat(utilisateur.nom, ' '), utilisateur.prenom) as auteur, 
utilisateur.region as idsource FROM contribution 
join utilisateur on contribution.auteur = utilisateur.id ;
create view contribution_auteur as 
SELECT contribution.id, contribution.titre, contribution.extrait, contribution.contenu, 
contribution.daty, contribution.etat, 
concat(concat(utilisateur.nom, ' '), utilisateur.prenom) as auteur, 
utilisateur.id as idsource FROM contribution 
join utilisateur on contribution.auteur = utilisateur.id ;