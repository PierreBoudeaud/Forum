CREATE TRIGGER delete_Util
BEFORE DELETE
ON UTILISATEUR FOR EACH ROW
AS
	DECLARE @DEL_ID int
	SELECT @DEL_ID = idutilisateur FROM DELETED
	UPDATE MESSAGE SET(utilisateurmessage = 0) WHERE utilisateurmessage = @DEL_ID
	UPDATE SUJET SET(utilisateursujet = 0) WHERE utilisateursujet = @DEL_ID
	DELETE UTILISATEUR WHERE idutilisateur = @DEL_ID
	
	CREATE TRIGGER delete_Util
BEFORE DELETE
ON UTILISATEUR FOR EACH ROW
BEGIN
	DECLARE @DEL_ID int
	SELECT @DEL_ID = idutilisateur FROM DELETED
	UPDATE MESSAGE SET(utilisateurmessage = 0) WHERE utilisateurmessage = @DEL_ID
	UPDATE SUJET SET(utilisateursujet = 0) WHERE utilisateursujet = @DEL_ID
END