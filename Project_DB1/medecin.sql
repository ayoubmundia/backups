drop database IF EXISTS medecins;
create database IF NOT EXISTS medecins;
  use medecins;
  create table specialite(
    code_specialite varchar(20) primary key,
    nom_specialite varchar(20)
  );
  create table ville(
    code_ville varchar(20) primary key,
    nom_ville varchar(20)
  );
  create table quartier(
    code_quartier varchar(20) primary key,
    code_ville varchar(20),
    nom_quartier varchar(20),
    CONSTRAINT frq1 foreign key (code_ville) references ville(code_ville)
  );
  create table medecin(
    id_medecin integer primary key AUTO_INCREMENT ,
    nom_medecin varchar(20),
    code_quartier varchar(20) ,
    CONSTRAINT frq2 foreign key (code_quartier) references quartier(code_quartier)
  );
  create table specialite_medecin(
    id_medecin integer references specialite(id_medecin),
    code_specialite varchar(20) references specialite(code_specialite),
    CONSTRAINT pkey primary key(id_medecin,code_specialite)
  );
  create table evaluation(
    id_evaluation integer AUTO_INCREMENT,
    Points integer ,
    id_medecin integer,
    CONSTRAINT prq primary key (id_evaluation) ,
    CONSTRAINT frq3 foreign key (id_medecin) references medecin(id_medecin)
  );
