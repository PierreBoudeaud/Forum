CREATE TABLE UTILISATEUR(
	idutilisateur SERIAL,
	pseudoutilisateur varchar(50),
	emailutilisateur varchar(50),
	mdputilisateur varchar(500),
	avatarutilisateur varchar(500),
	typecompteutilisateur int DEFAULT 0,
	CONSTRAINT pk_utilisateur PRIMARY KEY(idutilisateur)
);

CREATE TABLE SUJET(
	idsujet SERIAL,
	libellesujet varchar(100),
	descriptionsujet TEXT,
	utilisateursujet int,
	CONSTRAINT pk_sujet PRIMARY KEY(idsujet),
	CONSTRAINT fk_sujet_utilisateur FOREIGN KEY(utilisateursujet) REFERENCES UTILISATEUR(idutilisateur)
);

CREATE TABLE MESSAGE(
	idmessage SERIAL,
	contenumessage TEXT,
	datemessage date,
	datemodificationmessage date,
	sujetmessage int,
	utilisateurmessage int,
	CONSTRAINT pk_message PRIMARY KEY(idmessage),
	CONSTRAINT fk_message_sujet FOREIGN KEY(sujetmessage) REFERENCES SUJET(idsujet),
	CONSTRAINT fk_message_utilisateur FOREIGN KEY(utilisateurmessage) REFERENCES UTILISATEUR(idutilisateur)
);
