drop database IF EXISTS commande;
create database IF NOT EXISTS commande;
use commande;
  create table produit(
    code_produit varchar(5) primary key,
    libelle_produit varchar(9),
    prix_unitaire integer
  );
  create table magasin(
    id_mag int(2) primary key,
    nom_mag varchar(8),
    ville_mag varchar(10)
  );
  create table client(
    id_client int(2) primary key ,
    nom_client varchar(18),
    prenom_client varchar(15),
    adresse_client varchar(13),
    ville_client varchar(10)
  );
  create table commande(
    num_cmd int(2) primary key,
    date_cmd date,
    id_client int(2) references client(id_client)
  );
  create table stock(
    id_magasin int(2) references magasin(id_mag) ,
    code_produit varchar(5) references produit(code_produit),
    quantite_stock int(3),
    CONSTRAINT Pmk1 primary key(id_magasin,code_produit)
  );
  create table ligne_commande(
    num_commande int(2) references commande(num_cmd),
    code_produit varchar(5) references produit(code_produit),
    quantite_commande int(2),
    CONSTRAINT Pmk2 primary key(num_commande,code_produit)
  );
