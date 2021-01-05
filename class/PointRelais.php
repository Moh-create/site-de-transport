<?php

class PointRelais {

    private $id;
    private $nom;
    private $adresseRue;
    private $adresseVille;
    private $adresseCodePostal;
    private $pays;
    
    private static $select = "select * from pointrelais";
    private static $selectById = "select * from pointrelais where idPointRelais = :id";
    private static $selectByPays = "select * from pointrelais where codePays = :codePays";
    private static $insert = "insert into pointrelais (nom,adresseRue,adresseVille,adresseCodePostal,codePays) values (:nom,:adresseRue,:adresseVille,:adresseCodePostal,:codePays)";
    private static $update = "update pays set nom=:nom,adresseRue=:adresseRue,adresseVille=:adresseVille,adresseCodePostal=:adresseCodePostal where id=:id";
    private static $delete = "delete from pointrelais where id = :id";


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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
     * Get the value of adresseVille
     */ 
    public function getAdresseVille()
    {
        return $this->adresseVille;
    }

    /**
     * Set the value of adresseVille
     *
     * @return  self
     */ 
    public function setAdresseVille($adresseVille)
    {
        $this->adresseVille = $adresseVille;

        return $this;
    }

    /**
     * Get the value of adresseCodePostal
     */ 
    public function getAdresseCodePostal()
    {
        return $this->adresseCodePostal;
    }

    /**
     * Set the value of adresseCodePostal
     *
     * @return  self
     */ 
    public function setAdresseCodePostal($adresseCodePostal)
    {
        $this->adresseCodePostal = $adresseCodePostal;

        return $this;
    }


    
    /**
     * Get the value of pays
     */ 
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set the value of pays
     *
     * @return  self
     */ 
    public function setPays(Pays $pays)
    {
        $this->pays = $pays;

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



    private static function arrayToPointRelais(Array $array) {

        $pointRelais = new PointRelais();
        $pointRelais->id = $array["idPointRelais"];
        $pointRelais->nom = $array["nom"];
        $pointRelais->adresseRue = $array["adresseRue"];
        $pointRelais->adresseVille = $array["adresseVille"];
        $pointRelais->adresseCodePostal = $array["adresseCodePostal"];

        $codePays = $array["codePays"];

        if($codePays != null){
        $pointRelais->pays = Pays::fetch($codePays);
        }

        return $pointRelais;
    }

    public static function fetchAll() {

        $collectionPointRelais = null;
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->query(PointRelais::$select);
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionPointRelais[] = PointRelais::arrayToPointRelais($record);
        }

        return $collectionPointRelais;
    }

    public static function fetch($idPointRelais) {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(PointRelais::$selectById);
        $pdoStatement->bindParam(":id", $idPointRelais);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $point = PointRelais::arrayToPointRelais($record);
        return $point;

    }


    public static function fetchByCountry($codePays) {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(PointRelais::$selectByPays);
        $pdoStatement->bindParam(":codePays", $codePays);
        $pdoStatement->execute();

        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionPointRelais[] = PointRelais::arrayToPointRelais($record);
        }

        return $collectionPointRelais;

    }

    public function save() {

        if ($this->id == null) {
            $this->insert();
        } else {
            $this->update();
        }
    }


    private function update() {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(PointRelais::$update);

        $pdoStatement->bindParam(":id", $this->id);
        $pdoStatement->bindParam(":nom", $this->nom);
        $pdoStatement->bindParam(":adresseRue", $this->adresseRue);
        $pdoStatement->bindParam(":adresseVille", $this->adresseVille);
        $pdoStatement->bindParam(":adresseCodePostal", $this->AdresseCodePostal);
        if ($this->pays != null) {
            $codePays = $this->pays->getCodePays();
        }

        $pdoStatement->bindParam(":codePays",$codePays);
        $pdoStatement->execute();

    }
       

    private function insert() {

        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(PointRelais::$insert);

        $pdoStatement->bindParam(":nom", $this->nom);
        $pdoStatement->bindParam(":adresseRue", $this->adresseRue);
        $pdoStatement->bindParam(":adresseVille", $this->adresseVille);
        $pdoStatement->bindParam(":adresseCodePostal", $this->adresseCodePostal);
        if ($this->pays != null) {
            $codePays = $this->pays->getCodePays();
        }

        $pdoStatement->bindParam(":codePays",$codePays);
        $pdoStatement->execute();
        return $this->id = $pdo->lastInsertId();
    }

    public function delete() {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(PointRelais::$delete);
        $pdoStatement->bindParam("id", $this->id);
        $resultat = $pdoStatement->execute();
        $nblignesAffectees = $pdoStatement->rowCount();

        if ($nblignesAffectees == 1) {
        $this->id = null;
        }
        return $resultat;
    }

    public static function ConvertirPointRelaisEnJson (){

  
        $collection = PointRelais::fetchAll();

        $fichier = fopen('../assets/json/pointRelais.json',"w");
        $tab = array();
        foreach($collection as $pointRelais){
        
            $post_data = array(
        
               
                'id' => $pointRelais->getId(),
                'nom' => $pointRelais->getNom(),
                'adresseRue' => $pointRelais->getAdresseRue(),
                'adresseVille' => $pointRelais->getAdresseVille(),
                'adresseCodePostal' => $pointRelais->getAdresseCodePostal(),
                'pays' => array(
        
                    'codePays' => $pointRelais->getPays()->getCodePays(),
                    'nomPays' => $pointRelais->getPays()->getNomPays(),                  
                ),
                        
            );


            $tab[] = $post_data;
        }
        
        fwrite($fichier,json_encode($tab));

    }
}
