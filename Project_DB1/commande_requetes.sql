  USE commande ;
-- 1.La Liste des produits :
  SELECT libelle_produit As Liste_des_produits from produit ;
-- 2. La liste des clients
  SELECT nom_client , prenom_client from client ;
-- 3. Le nom et le prix des produits
  SELECT libelle_produit As nom_des_produits ,prix_unitaire As prix from produit ;
-- 4. La liste des produits dont le prix est supérieur ou égal à 50
  SELECT libelle_produit As Produits from produit where prix_unitaire>=50 ;
-- 5. La liste des produits dont le prix est entre 10 et 100
  SELECT libelle_produit As Produits from produit where prix_unitaire>=10 AND prix_unitaire<=100 ;
-- 6. Le nombre de produits dont le prix est supérieur à 50
  SELECT COUNT(libelle_produit) As NBR_Produits from produit where prix_unitaire>=50 ;
-- 7. Le nombre de produits
  SELECT COUNT(libelle_produit) As NBR_Produits from produit ;
-- 8. Le nombre de magasins par ville
  SELECT COUNT(nom_mag) AS NBR,ville_mag As Ville from magasin GROUP BY ville_mag ;
-- 9. Le nombre de magasins à Casablanca
  SELECT COUNT(nom_mag) AS NBR,ville_mag As Ville from magasin where ville_mag='Casablanca' ;
-- 10. Le nombre de commandes par client
  SELECT COUNT(num_cmd) AS NBR,id_client from commande GROUP BY id_client ;
-- 11. Le nombre de produits par commandes
  SELECT COUNT(code_produit) AS NBR , num_commande As Commande from ligne_commande GROUP BY num_commande;
-- 12. Les codes des produits commandés dans la commande 1 
  SELECT code_produit from ligne_commande where num_commande = 1;
-- 13. Les produits commandés par le client 1
  SELECT co.id_client , code_produit from ligne_commande lc 
    inner join commande co 
    on lc.num_commande = co.num_cmd 
    where co.id_client = 1 ;
-- 14. La quantité en stock du produit dont le code est « A0005 »
  SELECT SUM(quantite_stock) AS quantité from stock where code_produit = 'A0005';
-- 15. La quantité en stock par produit et par magasin
  SELECT SUM(quantite_stock) , code_produit , id_magasin from stock GROUP BY (code_produit);
-- TP2
-- 1. Les commandes passées par le client «BUGEME»
  SELECT cl.nom_client , co.num_cmd from client cl 
    inner join commande co 
    on co.id_client = cl.id_client
    where cl.nom_client = 'BUGEME';
-- 2. Les commandes passées par les clients «ABBAD» et «AMEDDAH»
  SELECT cl.nom_client , co.num_cmd from commande co 
    inner join client cl 
    on cl.id_client = co.id_client 
    where nom_client in ('ABBAD ','AMEDDAH');
-- 3. Les commandes passées en Février 2014
  SELECT num_cmd from commande where date_cmd  like '2014-02-%%';
-- 4. Les produits commandés dans la commande 1
  SELECT lc.num_commande ,pr.libelle_produit from produit pr
    inner join ligne_commande lc
    on lc.code_produit = pr.code_produit
    where lc.num_commande = 1 ;
-- 5. Les produits commandés en février 2014
  SELECT distinct  prd.libelle_produit from ligne_commande lc 
    inner join produit prd
    on prd.code_produit = lc.code_produit
    left join commande cmd
    on lc.num_commande = cmd.num_cmd
    where cmd.date_cmd like '2014-02-%%' ;
-- 6. Les produits commandés par le client 1
  SELECT distinct  prd.libelle_produit from ligne_commande lc 
    inner join produit prd
    on prd.code_produit = lc.code_produit
    left join commande cmd
    on lc.num_commande = cmd.num_cmd
    where cmd.id_client = 1 ;
-- 7. Le montant de la commande 1
  SELECT SUM(prd.prix_unitaire) AS Montant from ligne_commande lc
    inner join produit prd 
    on prd.code_produit = lc.code_produit 
    left join commande cmd
    on cmd.num_cmd = lc.num_commande
    where cmd.id_client = 1 ;
-- 8. La liste des commandes avec leurs montants triés par ordre décroissant du montant
  SELECT cmd.num_cmd,SUM(prd.prix_unitaire*lc.quantite_commande) AS Montant from ligne_commande lc 
    inner join produit prd 
    on prd.code_produit = lc.code_produit 
    left join commande cmd 
    on cmd.num_cmd = lc.num_commande
    GROUP BY cmd.num_cmd 
    order by Montant desc ;
-- 9. Le montant de la dernière commande
  SELECT SUM(prd.prix_unitaire*lc.quantite_commande) AS Montant from ligne_commande lc 
    inner join produit prd 
    on prd.code_produit = lc.code_produit 
    left join commande cmd 
    on cmd.num_cmd = lc.num_commande 
    GROUP BY cmd.num_cmd 
    order by Montant desc 
    limit 1 ;
-- 10. Le montant moyen des commandes passées
  SELECT SUM(prd.prix_unitaire*lc.quantite_commande)/COUNT(lc.code_produit) AS Montant_moy from ligne_commande lc 
    inner join produit prd 
    on prd.code_produit = lc.code_produit 
    left join commande cmd 
    on cmd.num_cmd = lc.num_commande ;
-- 11. La quantité en stock du produit « Article2 »
  SELECT SUM(quantite_stock) AS quantite from stock 
    inner join produit
    on  produit.code_produit = stock.code_produit
    where produit.libelle_produit = 'Article2' ;
-- 12. La quantité en stock du produit « Article2 » par magasin
 SELECT stock.id_magasin, SUM(quantite_stock) AS quantite from stock 
   inner join produit 
   on produit.code_produit = stock.code_produit 
   where produit.libelle_produit = 'Article2' 
   GROUP by id_magasin
-- 13. La quantité en stock du produit « Article4 » à Casablanca
  SELECT SUM(quantite_stock) As Quantite_Casablanca from  stock
    inner join produit prd
    on stock.code_produit = prd.code_produit
    left join magasin
    on magasin.id_mag = stock.id_magasin
    where prd.libelle_produit='Article4' AND ville_mag = 'Casablanca';
-- 14. Les clients qui ont passé les dix premières commandes
  SELECT DISTINCT cl.id_client as clientID from client cl 
    inner join commande cmd 
    on cmd.id_client = cl.id_client 
    order by cmd.num_cmd asc 
    LIMIT 10 ;
-- 15. Les produits manquants dans le magasin 1
  SELECT prd.libelle_produit as produits_manquants from produit prd
    where NOT EXISTS
    (
      SELECT stock.code_produit from stock 
      where prd.code_produit = stock.code_produit AND stock.id_magasin =1
    );
-- 16. Les produits non disponibles dans les magasins de Rabat
  
-- 17. Le client qui a passé le plus de commandes
  
-- 18. Les clients qui n’ont pas passé de commandes

-- 19. Les montants des commandes passées en Mars 2014 groupés par commande

-- 20. Les montants des commandes passées par le client «ABJILI» groupés par commande
