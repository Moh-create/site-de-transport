<?php


class UserAdmin {

    private $id;
    private $nom;
    private $motDePasse;

    
    private static $select = "select * from  userAdmin";
    private static $selectById = "select * from userAdmin where idUser = :idUser";


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
     * Get the value of motDePasse
     */ 
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set the value of motDePasse
     *
     * @return  self
     */ 
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }


    private static function arrayToAdmin(Array $array) {

        $userAdmin = new UserAdmin();

        $userAdmin->id = $array["idUser"];
        $userAdmin->etat  = $array["nom"];
        $userAdmin->token = $array["motDePasse"];

        return $userAdmin;
    }


    public static function fetchAll() {
        $collectionAdmin = null;
        $pdo = (new DBA())->getPDO();
      
        $pdoStatement = $pdo->query(UserAdmin::$select);
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionProduit[] = UserAdmin::arrayToAdmin($record);
        }

        return $collectionAdmin;
    }

    public static function fetch($idUserAdmin) {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(UserAdmin::$selectById);
        $pdoStatement->bindParam(":idUser", $idUserAdmin);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $userAdmin = UserAdmin::arrayToAdmin($record);
        return $userAdmin;

    }


}