create view commentaire_vue as 
select commentaire.id, concat(concat(utilisateur.nom, ' '), utilisateur.prenom) as utilisateur, 
commentaire.contribution, commentaire.contenu, commentaire.daty from commentaire join utilisateur on commentaire.utilisateur = utilisateur.id;