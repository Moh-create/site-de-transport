CREATE TABLE pays(
   codePays CHAR(5),
   nomPays VARCHAR(50) NOT NULL,
   PRIMARY KEY(codePays)
);

CREATE TABLE pointRelais(
   idPointRelais INT,
   nom VARCHAR(50) NOT NULL,
   adresseRue VARCHAR(110),
   adresseVille VARCHAR(110),
   adresseCodePostal VARCHAR(50),
   codePays CHAR(5) NOT NULL,
   PRIMARY KEY(idPointRelais),
   FOREIGN KEY(codePays) REFERENCES pays(codePays)
);

CREATE TABLE ville(
   codeVille VARCHAR(5),
   nomVille VARCHAR(50),
   codePays CHAR(5) NOT NULL,
   PRIMARY KEY(codeVille),
   FOREIGN KEY(codePays) REFERENCES pays(codePays)
);

CREATE TABLE utilisateur(
   id INT,
   genre CHAR(3),
   nom VARCHAR(70) NOT NULL,
   prenom VARCHAR(70),
   email VARCHAR(110),
   motDePasse TEXT NOT NULL,
   telephone VARCHAR(50),
   adresseRue VARCHAR(110),
   adressePostal VARCHAR(50),
   token TEXT,
   idPointRelais INT NOT NULL,
   codeVille VARCHAR(5) NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(idPointRelais) REFERENCES pointRelais(idPointRelais),
   FOREIGN KEY(codeVille) REFERENCES ville(codeVille)
);

CREATE TABLE livraison(
   id INT,
   idLivraison INT,
   adresseRue VARCHAR(50),
   codeVille VARCHAR(5) NOT NULL,
   PRIMARY KEY(id, idLivraison),
   FOREIGN KEY(id) REFERENCES utilisateur(id),
   FOREIGN KEY(codeVille) REFERENCES ville(codeVille)
);

CREATE TABLE commande(
   id INT,
   idLivraison INT,
   idCommande INT,
   dateCommande BIGINT,
   etat VARCHAR(50),
   numeroCommande INT,
   PRIMARY KEY(id, idLivraison, idCommande),
   FOREIGN KEY(id, idLivraison) REFERENCES livraison(id, idLivraison)
);
