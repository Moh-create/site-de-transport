<?php

class Ville {
    private $codeVille;
    private $nomVille;
    private $pays;
    
    private static $select = "select * from ville";
    private static $selectById = "select * from ville where codeVille = :codeVille";
    private static $insert = "insert into pays (codeVille,nomVille,codePays) values(:codeVille,:nomVille,:codePays)";
    private static $update = "update pays set nomVille=:nomVille where codeVille=:codeVille  ";
    private static $delete = "delete from pays where codeVille = :codeVille";


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

    private static function arrayToVille(Array $array) {

        $ville = new Ville();

        $ville->codeVille = $array["codeVille"];
        $ville->nomVille = $array["nomVille"];
        $codePays = $array["codePays"];

        if($codePays != null){
        $ville->pays = Pays::fetch($codePays);
        }

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
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Ville::$selectById);
        $pdoStatement->bindParam(":codeVille", $codeVille);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $produit = Ville::arrayToVille($record);
        return $produit;

    }




    public function insert(){

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Ville::$insert);
        $pdoStatement->bindParam(":codeVille", $this->codePays);
        $pdoStatement->bindParam(":nomVille",$this->nomPays);

        if ($this->pays != null) {
            $codePays = $this->pays->getCodePays();
        }

        $pdoStatement->bindParam(":codePays",$codePays);        
        $pdoStatement->execute();

        $this->codePays = $pdo->lastInsertId();

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