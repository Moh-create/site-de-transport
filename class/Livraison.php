<?php

class Livraison {


    private $idLivraison;
    private $utilisateur;
    private $adresseRue;
    private $ville;
    private $telephone;
    private $etat;

    private static $select = "select * from livraison";
    private static $selectById = "select * from livraison where idLivraison = :idLivraison";
    private static $selectByUtilisateur = "select * from livraison where id = :id";
    private static $insert = "insert into livraison (id,idLivraison,adresseRue,codeVille,telephone,etat) values(:id,:idLivrasion,:adresseRue,:ville,:telephone,:etat)";
    private static $update = "update livraison set adresseRue=:adresseRue,codeVille=:ville,telephone=:telephone, etat=:etat where id=:id and idLivraison =:idLivraison";
    private static $delete = "delete from livraison where id = :id";



    /**
     * Get the value of idLivraison
     */ 
    public function getIdLivraison()
    {
        return $this->idLivraison;
    }

    /**
     * Get the value of idUtilisateur
     */ 
    public function getUtilisateur()
    {
        return $this->Utilisateur;
    }

    /**
     * Set the value of adresseRue
     *
     * @return  self
     */ 
    public function setUtilisateur(Utilisateur $unUtilisateur)
    {
        $this->utilisateur = $unUtilisateur;

        return $this;
    }


    /**
     * Get the value of adresseRue
     */ 
    public function getAdresseRue()
    {
        return $this->adresseRue;
    }

    /**
     * Set the value of adresseRue
     *
     * @return  self
     */ 
    public function setAdresseRue($adresseRue)
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    /**
     * Get the value of codeVile
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of codeVile
     *
     * @return  self
     */ 
    public function setVille(Ville $codeVille)
    {
        $this->ville = $codeVille;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

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


    
    public function save() {

        if ($this->idLivraison == null) {
            $this->insert();
        } else {
            $this->update();
        }
    }


    private static function arrayToLivraison(Array $array) {

        $livraison = new Livraison();

        $codeUtilisateur = $array["id"];

        if($codeUtilisateur != null){

            $livraison->utilisateur = Utilisateur::fetch($codeUtilisateur);
        }

        $livraison->idLivraison = $array["idLivraison"];


        $codeVille = $array["codeVille"];

        if($codeVille != null){
            $livraison->ville = Ville::fetch($codeVille);
        }

        $livraison->adresseRue = $array["adresseRue"];
        $livraison->telephone = $array["telephone"]; 
        $livraison->etat = $array["etat"]; 

        return $livraison;
    }


    public static function fetchAll() {

        $collectionLivraison = null;
        $pdo = (new DBA())->getPDO();

        $pdoStatement = $pdo->query(Livraison::$select);
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionProduit[] = Livraison::arrayToLivraison($record);
        }

        return $collectionProduit; 
    }


    public static function fetch($codeLivraison) {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Livraison::$selectById);
        $pdoStatement->bindParam(":idLivraison", $codeLivraison);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $livraison = Livraison::arrayToLivraison($record);
        return $livraison;

    }

    public static function fetchByUtilisateur($codeUtilisateur) {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Livraison::$selectByUtilisateur);
        $pdoStatement->bindParam(":id", $codeUtilisateur);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);

        if($record == null){
            $p = false;

            return $p;
        }else {
            
            $livraison = Livraison::arrayToLivraison($record);
            return $livraison;
        }


    }

    public static function ExisteUtilisateur($codeUtilisateur) {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Livraison::$selectByUtilisateur);
        $pdoStatement->bindParam(":id", $codeUtilisateur);
        $pdoStatement->execute();
        $count = $pdoStatement->fetchColumn();
        return $count;

    }


    private function update() {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Livraison::$update);
        if ($this->utilisateur != null) {
            $codeUtilisateur = $this->utilisateur->getId();
        }

        $pdoStatement->bindParam(":id", $codeUtilisateur);
        $pdoStatement->bindParam(":idLivraison", $this->idLivraison);
        $pdoStatement->bindParam(":adresseRue", $this->adresseRue);
        if ($this->ville != null) {
            $codeVille = $this->ville->getCodeVille();
        }
        $pdoStatement->bindParam(":ville", $codeVille);
        $pdoStatement->bindParam(":telephone", $this->telephone);
        $pdoStatement->bindParam(':etat',$this->etat);
        $pdoStatement->execute();

    }
       

    private function insert() {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Livraison::$insert);

        $bytes = openssl_random_pseudo_bytes(3, $cstrong);
        $hex   = bin2hex($bytes);
        $this->idLivrasion = $hex;

        if ($this->utilisateur != null) {
            $codeUtilisateur = $this->utilisateur->getId();
        }

        $pdoStatement->bindParam(":id", $codeUtilisateur);
        $pdoStatement->bindParam(":idLivrasion", $this->idLivrasion);
        $pdoStatement->bindParam(":adresseRue", $this->adresseRue);

        if ($this->ville != null) {
            $codeVille = $this->ville->getCodeVille();
        }
        $pdoStatement->bindParam(":ville", $codeVille);
        $pdoStatement->bindParam(":telephone", $this->telephone);
        $pdoStatement->bindParam(':etat',$this->etat);
        $pdoStatement->execute();
        return $this->id = $pdo->lastInsertId();
    }

    public function delete() {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Livraison::$delete);
        $codeUtilisateur  =  $this->utilisateur->getId();
        $pdoStatement->bindParam(":id", $codeUtilisateur);
        $resultat = $pdoStatement->execute();
        $nblignesAffectees = $pdoStatement->rowCount();

        if ($nblignesAffectees == 1) {
        $this->id = null;
        }
        return $resultat;
    }

}