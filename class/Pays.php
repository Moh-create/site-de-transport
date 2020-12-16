<?php

class Pays {

    private $codePays;
    private $nomPays;


    private static $select = "select * from pays";
    private static $selectById = "select * from pays where codePays = :codePays";
    private static $insert = "insert into pays (codePays,nomPays) values(:codePays,:nomPays)";
    private static $update = "update pays set nomPays=:nomPays where codePays=:codePays";

    private static $delete = "delete from pays where codePays = :codePays";

    /**
     * Get the value of codePays
     */ 
    public function getCodePays()
    {
        return $this->codePays;
    }


    /**
     * Get the value of nomPays
     */ 
    public function getNomPays()
    {
        return $this->nomPays;
    }

    /**
     * Set the value of nomPays
     *
     * @return  self
     */ 
    public function setNomPays($nomPays)
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    private static function arrayToPays(Array $array) {

        $unPays = new Pays();
        $unPays->codePays = $array["codePays"];
        $unPays->nomPays = $array["nomPays"];
        return $unPays;
    }

    public static function fetchAll() {
        $collectionProduit = null;
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->query(Pays::$select);
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionProduit[] = Pays::arrayToPays($record);
        }

        return $collectionProduit;
    }

    public static function fetch($idProduit) {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Pays::$selectById);
        $pdoStatement->bindParam(":codePays", $idProduit);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $produit = Pays::arrayToPays($record);
        return $produit;

    }

    public function save() {

        if ($this->idProduit == null) {
        $this->insert();
        }

        else {
        $this->update();
        }
    }


    private function insert(){

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Pays::$insert);
        $pdoStatement->bindParam(":codePays", $this->codePays);
        $pdoStatement->bindParam(":nomPays",$this->nomPays);
        $pdoStatement->execute();
        $this->codePays = $pdo->lastInsertId();

    }


    public function delete() {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Pays::$delete);
        $pdoStatement->bindParam("codePays", $this->codePays);
        $resultat = $pdoStatement->execute();
        $nblignesAffectees = $pdoStatement->rowCount();
        if ($nblignesAffectees == 1) {
        $this->idProduit = null;
        }
        return $resultat;
    }

    private function update() {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Pays::$update);
        $pdoStatement->bindParam(":codePays", $this->codePays);
        $pdoStatement->bindParam(":nomPays", $this->nomPays);
        $pdoStatement->execute();

    }
       
       
       
}