<?php


class Sav {

    
    private $id;
    private $nom;
    private $numero;
    private $ville;


    private static $select = "select * from sav";
    private static $selectById = "select * from sav where id = :id";
    private static $insert = "insert into sav (nom,numero,codeVille) values(:nom,:numero,:codeVille)";
    private static $update = "update sav set nom=:nom, numero = :numero, codeVille = :codeVille where id =:id";
    private static $delete = "delete from sav where id = :id";


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille(Ville $ville)
    {
        $this->ville = $ville;

        return $this;
    }



    private static function arrayToSav(Array $array) {

        $sav = new Sav();

        $sav->id = $array["id"];
        $sav->nom = $array["nom"];
        $sav->numero = $array["numero"];
        $codeVille = $array["codeVille"];

        if($codeVille != null){
        $sav->ville = Ville::fetch($codeVille);
        }

        return $sav;

    }


    public static function fetchAll() {
        $collectionSav = null;
        $pdo = (new DBA())->getPDO();
      
        $pdoStatement = $pdo->query(Sav::$select);
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionSav[] = Sav::arrayToSav($record);
        }

        return $collectionSav;
    }



    public static function fetch($id) {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Sav::$selectById);
        $pdoStatement->bindParam(":id", $id);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $sav = Sav::arrayToSav($record);
        return $sav;

    }


    public function save() {

        if ($this->id == null) {
            $this->insert();
        } else {
            $this->update();
        }
  
    }

    private function insert() {

        $pdo = (new DBA())->getPDO();

        $pdoStatement = $pdo->prepare(Sav::$insert);
        $pdoStatement->bindParam(":nom", $this->nom);
        $pdoStatement->bindParam(":numero", $this->numero);
        if ($this->ville != null) {
            $codeVille = $this->ville->getCodeVille();
        }

        $pdoStatement->bindParam(":codeVille",$codeVille);
        $pdoStatement->execute();
        return $this->id = $pdo->lastInsertId();

    }

    private function update() {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Sav::$update);

        $pdoStatement->bindParam(":id", $this->id);
        $pdoStatement->bindParam(":nom", $this->nom);
        $pdoStatement->bindParam(":numero", $this->numero);

        if ($this->ville != null) {
            $codeVille = $this->ville->getCodeVille();
        }

        $pdoStatement->bindParam(":codeVille",$codeVille);


        $pdoStatement->execute();
 
    }


    public function delete() {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Sav::$delete);
        $pdoStatement->bindParam(":id", $this->id);
        $resultat = $pdoStatement->execute();
        $nblignesAffectees = $pdoStatement->rowCount();

        if ($nblignesAffectees == 1) {
        $this->id = null;
        }
        return $resultat;
    }


}