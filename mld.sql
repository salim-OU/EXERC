#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Catégorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        idCategorie          Int  Auto_increment  NOT NULL ,
        nomCategorie         Varchar (255) NOT NULL ,
        descriptionCategorie Varchar (255) NOT NULL
	,CONSTRAINT Categorie_PK PRIMARY KEY (idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Article
#------------------------------------------------------------

CREATE TABLE Article(
        idArticle           Int  Auto_increment  NOT NULL ,
        titreArticle        Varchar (255) NOT NULL ,
        dateCreationArticle Date NOT NULL ,
        datePublication     Date NOT NULL ,
        statueArticle       Enum ("Brouillon","Publié","Corbeille") NOT NULL ,
        contenuArticle      Text NOT NULL ,
        idCategorie         Int
	,CONSTRAINT Article_PK PRIMARY KEY (idArticle)

	,CONSTRAINT Article_Categorie_FK FOREIGN KEY (idCategorie) REFERENCES Categorie(idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Tag
#------------------------------------------------------------

CREATE TABLE Tag(
        idTag          Int  Auto_increment  NOT NULL ,
        nomTag         Varchar (255) NOT NULL ,
        descriptionTag Varchar (255) NOT NULL
	,CONSTRAINT Tag_PK PRIMARY KEY (idTag)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contenir
#------------------------------------------------------------

CREATE TABLE Contenir(
        idTag     Int NOT NULL ,
        idArticle Int NOT NULL
	,CONSTRAINT Contenir_PK PRIMARY KEY (idTag,idArticle)

	,CONSTRAINT Contenir_Tag_FK FOREIGN KEY (idTag) REFERENCES Tag(idTag)
	,CONSTRAINT Contenir_Article0_FK FOREIGN KEY (idArticle) REFERENCES Article(idArticle)
)ENGINE=InnoDB;

