<?php

class Commande {
    
    private $idCommande;
    private $dateCommande;
    private $etat;
    private $utilisateur;
    private $livraison;
    private $pointRelaisEurope;
    private $pointRelaisAfrique;

    private static $select = "select * from commande";
    private static $selectById = "select * from commande where idCommande = :idCommande";
    private static $selectByUser = "select * from commande where id = :id";
    private static $insertLivraison = "insert into commande (idCommande,dateCommande,id,idLivraison,idPointRelaisEurope) values(:idCommande,:dateCommande,:id,:idLivraison,:idPointRelaisEurope)";
    private static $insertPointRelais = "insert into commande (idCommande,dateCommande,id,idPointRelaisEurope,idPointRelaisAfrique) values(:idCommande,:dateCommande,:id,:idPointRelaisEurope,:idPointRelaisAfrique)";
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


    /**
     * Get the value of pointRelaisEurope
     */ 
    public function getPointRelaisEurope()
    {
        return $this->pointRelaisEurope;
    }

    /**
     * Set the value of pointRelaisEurope
     *
     * @return  self
     */ 
    public function setPointRelaisEurope(PointRelais $pointRelaisEurope)
    {
        $this->pointRelaisEurope = $pointRelaisEurope;

        return $this;
    }


    
    /**
     * Get the value of pointRelaisAfrique
     */ 
    public function getPointRelaisAfrique()
    {
        return $this->pointRelaisAfrique;
    }

    /**
     * Set the value of pointRelaisAfrique
     *
     * @return  self
     */ 
    public function setPointRelaisAfrique(PointRelais $pointRelaisAfrique)
    {
        $this->pointRelaisAfrique = $pointRelaisAfrique;

        return $this;
    }


    
    private static function arrayToCommande(Array $array) {

        $commande = new Commande();

        $commande->idCommande = $array["idCommande"];
        $commande->dateCommande = $array["dateCommande"];

        $commande->etat = $array["etat"];

        $codeUtilisateur = $array["id"];

        if($codeUtilisateur != null){
        $commande->utilisateur = Utilisateur::fetch($codeUtilisateur);
        }

        $codeLivraison = $array["idLivraison"];

        if($codeLivraison != null){
        $commande->livraison = Livraison::fetch($codeLivraison);
        }

        $codePointRelaisEurope = $array["idPointRelaisEurope"];

        if($codePointRelaisEurope != null){
            $commande->pointRelaisEurope = PointRelais::fetch($codePointRelaisEurope);
        }

        $codePointRelaisAfrique = $array["idPointRelaisAfrique"];

        if($codePointRelaisAfrique != null){
            $commande->pointRelaisAfrique = PointRelais::fetch($codePointRelaisAfrique);
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


    public static function fetchByUtilisateur($codeUtilisateur) {
        $collectionCommande = null;
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Commande::$selectByUser);
        $pdoStatement->bindParam(":id", $codeUtilisateur);
        $pdoStatement->execute();
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($recordSet as $record) {
        $collectionCommande[] = Commande::arrayToCommande($record);
        }

        return $collectionCommande;
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

        if($this->livraison != null){
            $pdoStatement = $pdo->prepare(Commande::$insertLivraison);
            $bytes = openssl_random_pseudo_bytes(4, $cstrong);
            $hex   = bin2hex($bytes);
            $this->idCommande = $hex;

            $pdoStatement->bindParam(":idCommande", $this->idCommande);
            $pdoStatement->bindParam(":dateCommande", $this->dateCommande);


            if ($this->utilisateur != null) {
                $codeUtilisateur = $this->utilisateur->getId();
            }
            $pdoStatement->bindParam(":id",$codeUtilisateur);


            if ($this->livraison != null) {
                $codeLivraison = $this->livraison->getIdLivraison();
            }
            $pdoStatement->bindParam(":idLivraison",$codeLivraison);


            if ($this->pointRelaisEurope != null) {
                $codePointRelaisEurope = $this->pointRelaisEurope->getId();
            }
            $pdoStatement->bindParam(":idPointRelaisEurope",$codePointRelaisEurope);


            $pdoStatement->execute();
        }



        else {

            $pdoStatement = $pdo->prepare(Commande::$insertPointRelais);
            $bytes = openssl_random_pseudo_bytes(4, $cstrong);
            $hex   = bin2hex($bytes);
            $this->idCommande = $hex;

            $pdoStatement->bindParam(":idCommande", $this->idCommande);
            $pdoStatement->bindParam(":dateCommande", $this->dateCommande);


            if ($this->utilisateur != null) {
                $codeUtilisateur = $this->utilisateur->getId();
            }
            $pdoStatement->bindParam(":id",$codeUtilisateur);



            if ($this->pointRelaisEurope != null) {
                $codePointRelaisEurope = $this->pointRelaisEurope->getId();
            }
            $pdoStatement->bindParam(":idPointRelaisEurope",$codePointRelaisEurope);

            
            if ($this->pointRelaisAfrique != null) {
                $codePointRelaisAfrique = $this->pointRelaisAfrique->getId();
            }
            $pdoStatement->bindParam(":idPointRelaisAfrique",$codePointRelaisAfrique);

            $pdoStatement->execute();




        }

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