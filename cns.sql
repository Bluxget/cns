#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
#------------------------------------------------------------
# Table: utilisateurs
#------------------------------------------------------------
CREATE TABLE utilisateurs(
        id_utilisateur int (11) Auto_increment  NOT NULL ,
        nom            Varchar (25) NOT NULL ,
        prenom         Varchar (25) NOT NULL ,
        mot_de_passe   Varchar (25) NOT NULL ,
        PRIMARY KEY (id_utilisateur ) ,
        UNIQUE (nom ,prenom )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: apprentis
#------------------------------------------------------------
CREATE TABLE apprentis(
        id_utilisateur              Int NOT NULL ,
        id_section                  Int NOT NULL ,
        id_tuteur                   Int NOT NULL ,
        PRIMARY KEY (id_utilisateur )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: formateurs
#------------------------------------------------------------
CREATE TABLE formateurs(
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id_utilisateur )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: sections
#------------------------------------------------------------
CREATE TABLE sections(
        id_section int (11) Auto_increment  NOT NULL ,
        nom        Varchar (25) NOT NULL ,
        PRIMARY KEY (id_section ) ,
        UNIQUE (nom )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: tuteurs
#------------------------------------------------------------
CREATE TABLE tuteurs(
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id_utilisateur )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: classeurs
#------------------------------------------------------------
CREATE TABLE classeurs(
        id_classeur int (11) Auto_increment  NOT NULL ,
        id_section  Int NOT NULL ,
		id_cursus   Int NOT NULL ,
        PRIMARY KEY (id_classeur )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: pages
#------------------------------------------------------------
CREATE TABLE pages(
        id_page     int (11) Auto_increment  NOT NULL ,
        titre       Varchar (25) NOT NULL ,
        contenu     Text NOT NULL ,
        id_classeur Int NOT NULL ,
        PRIMARY KEY (id_page )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: formulaires
#------------------------------------------------------------
CREATE TABLE formulaires(
        id_formulaire int (11) Auto_increment  NOT NULL ,
        nom           Varchar (25) NOT NULL ,
        vide          Bool NOT NULL ,
        cible         Enum ("apprentis","tuteurs") NOT NULL ,
        id_page       Int NOT NULL ,
        id_type       Int NOT NULL ,
        PRIMARY KEY (id_formulaire ) ,
		UNIQUE (nom )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: types
#------------------------------------------------------------
CREATE TABLE types(
        id_type int (11) Auto_increment  NOT NULL ,
        nom     Varchar (25) NOT NULL ,
        PRIMARY KEY (id_type ) ,
        UNIQUE (nom )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: responsables
#------------------------------------------------------------
CREATE TABLE responsables(
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id_utilisateur )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: cursus
#------------------------------------------------------------
CREATE TABLE cursus(
        id_cursus   int (11) Auto_increment  NOT NULL ,
        annee_debut Year NOT NULL ,
        annee_fin   Year NOT NULL ,
        PRIMARY KEY (id_cursus ) ,
        UNIQUE (annee_debut ,annee_fin )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: formateurs_sections
#------------------------------------------------------------
CREATE TABLE formateurs_sections(
        id_formateur Int NOT NULL ,
        id_section     Int NOT NULL ,
        PRIMARY KEY (id_formateur ,id_section )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: contenu
#------------------------------------------------------------
CREATE TABLE contenus(
        valeur         Text NOT NULL ,
        commentaire    Text ,
        id_formulaire  Int NOT NULL ,
        id_apprenti Int NOT NULL ,
        PRIMARY KEY (id_formulaire ,id_apprenti )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: responsables_sections
#------------------------------------------------------------
CREATE TABLE responsables_sections(
        id_responsable Int NOT NULL ,
        id_section     Int NOT NULL ,
        PRIMARY KEY (id_responsable ,id_section )
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: apprentis_cursus
#------------------------------------------------------------
CREATE TABLE apprentis_cursus(
        id_apprenti Int NOT NULL ,
        id_cursus      Int NOT NULL ,
        PRIMARY KEY (id_apprenti ,id_cursus )
)ENGINE=InnoDB;
ALTER TABLE apprentis ADD CONSTRAINT FK_apprentis_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur);
ALTER TABLE apprentis ADD CONSTRAINT FK_apprentis_id_section FOREIGN KEY (id_section) REFERENCES sections(id_section);
ALTER TABLE apprentis ADD CONSTRAINT FK_apprentis_id_tuteur FOREIGN KEY (id_tuteur) REFERENCES tuteurs(id_utilisateur);
ALTER TABLE formateurs ADD CONSTRAINT FK_formateurs_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur);
ALTER TABLE tuteurs ADD CONSTRAINT FK_tuteurs_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur);
ALTER TABLE classeurs ADD CONSTRAINT FK_classeurs_id_section FOREIGN KEY (id_section) REFERENCES sections(id_section);
ALTER TABLE classeurs ADD CONSTRAINT FK_classeurs_id_cursus FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus);
ALTER TABLE pages ADD CONSTRAINT FK_pages_id_classeur FOREIGN KEY (id_classeur) REFERENCES classeurs(id_classeur);
ALTER TABLE formulaires ADD CONSTRAINT FK_formulaires_id_page FOREIGN KEY (id_page) REFERENCES pages(id_page);
ALTER TABLE formulaires ADD CONSTRAINT FK_formulaires_id_type FOREIGN KEY (id_type) REFERENCES types(id_type);
ALTER TABLE responsables ADD CONSTRAINT FK_responsables_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur);
ALTER TABLE formateurs_sections ADD CONSTRAINT FK_enseigne_id_formateur FOREIGN KEY (id_formateur) REFERENCES formateurs(id_utilisateur);
ALTER TABLE formateurs_sections ADD CONSTRAINT FK_enseigne_id_section FOREIGN KEY (id_section) REFERENCES sections(id_section);
ALTER TABLE contenus ADD CONSTRAINT FK_contenus_id_formulaire FOREIGN KEY (id_formulaire) REFERENCES formulaires(id_formulaire);
ALTER TABLE contenus ADD CONSTRAINT FK_contenus_id_apprenti FOREIGN KEY (id_apprenti) REFERENCES apprentis(id_utilisateur);
ALTER TABLE responsables_sections ADD CONSTRAINT FK_gere_id_responsable FOREIGN KEY (id_responsable) REFERENCES responsables(id_utilisateur);
ALTER TABLE responsables_sections ADD CONSTRAINT FK_gere_id_section FOREIGN KEY (id_section) REFERENCES sections(id_section);
ALTER TABLE apprentis_cursus ADD CONSTRAINT FK_estForme_id_apprenti FOREIGN KEY (id_apprenti) REFERENCES apprentis(id_utilisateur);
ALTER TABLE apprentis_cursus ADD CONSTRAINT FK_estForme_id_cursus FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus);
