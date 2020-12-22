<?php

class Commande {
    
    private $idCommande;
    private $dateCommande;
    private $etat;
    private $utilisateur;
    private $livraison;


    private static $select = "select * from commande";
    private static $selectById = "select * from commande where idCommande = :idCommande";
    private static $insert = "insert into commande (idCommande,dateCommande,etat,id,idLivraison) values(:idCommande,:dateCommande,:etat,:id,:idLivraison)";
    private static $update = "update commande set etat=:etat where idCommande=:idCommande";
    private static $delete = "delete from commande where idCommande = :idCommande";

    /**
     * Get the value of idCommande
     */ 
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * Get the value of dateCommande
     */ 
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set the value of dateCommande
     *
     * @return  self
     */ 
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of utilisateur
     */ 
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @return  self
     */ 
    public function setUtilisateur(Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get the value of livraison
     */ 
    public function getLivraison()
    {
        return $this->livraison;
    }

    /**
     * Set the value of livraison
     *
     * @return  self
     */ 
    public function setLivraison(Livraison $livraison)
    {
        $this->livraison = $livraison;

        return $this;
    }


    
    private static function arrayToCommande(Array $array) {

        $commande = new Commande();

        $commande->idCommande = $array["idCommande"];
        $commande->dateCommande = $array["dateCommande"];
        $etat = $array["etat"];

        $codeUtilisateur = $array["id"];

        if($codeUtilisateur != null){
        $commande->utilisateur = Utilisateur::fetch($codeUtilisateur);
        }

        $codeLivraison = $array["idLivraison"];

        if($codeLivraison != null){
        $commande->livraison = Livraison::fetch($codeLivraison);
        }

        return $commande;
    }


    public static function fetchAll() {
        $collectionCommande = null;
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->query(Commande::$select);
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionCommande[] = Commande::arrayToCommande($record);
        }

        return $collectionCommande;
    }


    
    public static function fetch($codeCommande) {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Commande::$selectById);
        $pdoStatement->bindParam(":idCommande", $codeCommande);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $commande = Commande::arrayToCommande($record);
        return $commande;

    }


    public function save() {

        if ($this->idCommande == null) {
            $this->insert();
        } else {
            $this->update();
        }
    }


    private function insert() {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Commande::$insert);

        $bytes = openssl_random_pseudo_bytes(4, $cstrong);
        $hex   = bin2hex($bytes);
        $this->idCommande = $hex;

        $pdoStatement->bindParam(":idCommande", $this->idCommande);
        $pdoStatement->bindParam(":dateCommande", $this->dateCommande);
        $pdoStatement->bindParam(":etat", $this->etat);

        if ($this->utilisateur != null) {
            $codeUtilisateur = $this->utilisateur->getId();
        }
        
        $pdoStatement->bindParam(":id",$codeUtilisateur);
        if ($this->livraison != null) {
            $codeLivraison = $this->livraison->getIdLivraison();
        }

        $pdoStatement->bindParam(":idLivraison",$codeLivraison);
        $pdoStatement->execute();

        return $this->id = $pdo->lastInsertId();

    }

    private function update() {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Commande::$update);
        if ($this->utilisateur != null) {
            $codeUtilisateur = $this->utilisateur->getId();
        }

        $pdoStatement->bindParam(":idCommande", $this->idCommande);
        $pdoStatement->bindParam(":etat", $this->etat);
        $pdoStatement->execute();
        var_dump($pdoStatement->debugDumpParams());
    }


    public function delete() {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Commande::$delete);
        $pdoStatement->bindParam(":idCommande", $this->idCommande);
        $resultat = $pdoStatement->execute();
        $nblignesAffectees = $pdoStatement->rowCount();

        if ($nblignesAffectees == 1) {
        $this->id = null;
        }
        return $resultat;
    }






}