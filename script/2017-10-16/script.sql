CREATE OR REPLACE VIEW utilisateur_vue as
SELECT A.id, A.nom, A.prenom, A.mail, A.login, '' as pwd, rang, B.val as typeutilisateur, C.val as region
	FROM utilisateur A

	JOIN typeutilisateur B ON A.typeutilisateur = B.id
	JOIN region C ON A.region = C.id;