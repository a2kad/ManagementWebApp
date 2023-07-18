#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: type_user
#------------------------------------------------------------

CREATE TABLE type_user(
        id_type_user Int  Auto_increment  NOT NULL ,
        type_name    Varchar (255) NOT NULL
	,CONSTRAINT type_user_PK PRIMARY KEY (id_type_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user      Int  Auto_increment  NOT NULL ,
        name         Varchar (50) NOT NULL ,
        lastname     Varchar (50) NOT NULL ,
        email        Varchar (100) NOT NULL ,
        tel          Varchar (10) NOT NULL ,
        password     Varchar (255) NOT NULL ,
        id_type_user Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id_user)

	,CONSTRAINT users_type_user_FK FOREIGN KEY (id_type_user) REFERENCES type_user(id_type_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: status
#------------------------------------------------------------

CREATE TABLE status(
        id_status   Int  Auto_increment  NOT NULL ,
        name_status Varchar (50) NOT NULL
	,CONSTRAINT status_PK PRIMARY KEY (id_status)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type_frais
#------------------------------------------------------------

CREATE TABLE type_frais(
        id_type   Int  Auto_increment  NOT NULL ,
        name_type Varchar (50) NOT NULL
	,CONSTRAINT type_frais_PK PRIMARY KEY (id_type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tva
#------------------------------------------------------------

CREATE TABLE tva(
        id_tva   Int  Auto_increment  NOT NULL ,
        name_tva Varchar (50) NOT NULL
	,CONSTRAINT tva_PK PRIMARY KEY (id_tva)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: frais
#------------------------------------------------------------

CREATE TABLE frais(
        id           Int  Auto_increment  NOT NULL ,
        date         Date NOT NULL ,
        montant_ttc  Float NOT NULL ,
        montant_ht   Float NOT NULL ,
        justificatif Varchar (255) NOT NULL ,
        motif        Varchar (255) NOT NULL ,
        pay_date     Date NOT NULL ,
        id_type      Int NOT NULL ,
        id_tva       Int NOT NULL ,
        id_status    Int NOT NULL ,
        id_user      Int NOT NULL
	,CONSTRAINT frais_PK PRIMARY KEY (id)

	,CONSTRAINT frais_type_frais_FK FOREIGN KEY (id_type) REFERENCES type_frais(id_type)
	,CONSTRAINT frais_tva0_FK FOREIGN KEY (id_tva) REFERENCES tva(id_tva)
	,CONSTRAINT frais_status1_FK FOREIGN KEY (id_status) REFERENCES status(id_status)
	,CONSTRAINT frais_users2_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
)ENGINE=InnoDB;

