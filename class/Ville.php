<?php

class Ville {
    private $codeVille;
    private $nomVille;
    private $pays;
    private $afficher;
    
    
    private static $select = "select * from ville";
    private static $selectById = "select * from ville where codeVille = :codeVille";
    private static $selectByPays = "select * from ville where codePays = :codePays";
    private static $selectByAfficher = "select * from ville where afficher = 1";
    private static $insert = "insert into ville (codeVille,nomVille,codePays) values(:codeVille,:nomVille,:codePays)";
    private static $update = "update ville set nomVille=:nomVille, codePays = :codePays, afficher = :afficher where codeVille=:codeVille";
    private static $delete = "delete from ville where codeVille = :codeVille";


    /**
     * Get the value of codeVille
     */ 
    public function getCodeVille()
    {
        return $this->codeVille;
    }
    
    /**
     * Set the value of codeVille
     *
     * @return  self
     */ 
    public function setCodeVille($codeVille)
    {
        $this->codeVille = $codeVille;

        return $this;
    }

    /**
     * Get the value of nomVille
     */ 
    public function getNomVille()
    {
        return $this->nomVille;
    }

    /**
     * Set the value of nomVille
     *
     * @return  self
     */ 
    public function setNomVille($nomVille)
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function setPays(Pays $pays) {

        $this->pays = $pays;
    }

    public function getPays() {

        return $this->pays;
    }

        /**
     * Get the value of afficher
     */ 
    public function getAfficher()
    {
        return $this->afficher;
    }

    /**
     * Set the value of afficher
     *
     * @return  self
     */ 
    public function setAfficher($afficher)
    {
        $this->afficher = $afficher;

        return $this;
    }

    private static function arrayToVille(Array $array) {

        $ville = new Ville();

        $ville->codeVille = $array["codeVille"];
        $ville->nomVille = $array["nomVille"];
        $codePays = $array["codePays"];

        if($codePays != null){
        $ville->pays = Pays::fetch($codePays);
        }

        $ville->afficher = $array["afficher"];

        return $ville;
    }






    public static function fetchAll() {
        $collectionProduit = null;

        
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->query(Ville::$select);
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionProduit[] = Ville::arrayToVille($record);
        }

        return $collectionProduit;
    }


    public static function fetch($codeVille) {
        $pdo = (new DBA())->getPDO();;
        $pdoStatement = $pdo->prepare(Ville::$selectById);
        $pdoStatement->bindParam(":codeVille", $codeVille);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        if($record == null)
        {
            $p = false;
            return $p;

        }else{
            $produit = Ville::arrayToVille($record);
            return $produit;            
        }


    }

    public static function fetchPublicPointRelais() {

        $collectionVille = null;
        $pdo = (new DBA())->getPDO();
     
        $pdoStatement = $pdo->query(Ville::$selectByAfficher);
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionVille[] = Ville::arrayToVille($record);
        }

        return $collectionVille;
    }


    public static function fetchByPays($codePays) {
        $collectionProduit = null;
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Ville::$selectByPays);
        $pdoStatement->bindParam(":codePays", $codePays);
        $pdoStatement->execute();
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($recordSet as $record) {
        $collectionProduit[] = Ville::arrayToVille($record);
        }

        return $collectionProduit;
    }




    public function insert(){

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Ville::$insert);
        $pdoStatement->bindParam(":codeVille", $this->codeVille);
        $pdoStatement->bindParam(":nomVille",$this->nomVille);

        if ($this->pays != null) {
            $codePays = $this->pays->getCodePays();
        }

        $pdoStatement->bindParam(":codePays",$codePays);        
        $pdoStatement->execute();

    

    }

    public function update(){

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Ville::$update);
        $pdoStatement->bindParam(":codeVille", $this->codeVille);
        $pdoStatement->bindParam(":nomVille",$this->nomVille);

        if ($this->pays != null) {
            $codePays = $this->pays->getCodePays();
        }

        $pdoStatement->bindParam(":codePays",$codePays);
        $pdoStatement->bindParam(":afficher",$this->afficher);              
        $pdoStatement->execute();
    

    }


    public function delete() {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Ville::$delete);
        $pdoStatement->bindParam("codeVille", $this->codeVille);
        $resultat = $pdoStatement->execute();
        $nblignesAffectees = $pdoStatement->rowCount();
        if ($nblignesAffectees == 1) {
        $this->idProduit = null;
        }
        return $resultat;

    }




}