/*Postgresql*/
CREATE FUNCTION delete_util_trigger() RETURNS TRIGGER
AS $delete_utilisateur$
	DECLARE DEL_ID INT;
	BEGIN
		DEL_ID := OLD.idutilisateur;
		UPDATE MESSAGE SET utilisateurmessage = 0 WHERE utilisateurmessage = DEL_ID;
		UPDATE SUJET SET utilisateursujet = '0' WHERE utilisateursujet = DEL_ID;
		RETURN NEW;
	END;
$delete_utilisateur$ LANGUAGE 'plpgsql';

CREATE TRIGGER delete_utilisateur
BEFORE DELETE
ON UTILISATEUR
FOR EACH ROW
EXECUTE PROCEDURE delete_util_trigger()