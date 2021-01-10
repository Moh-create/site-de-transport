<?php 

class Utilisateur {
    
    private $id;
    private $genre;
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;
    private $telephone;
    private $adresseRue;
    private $adressePostal;
    private $adresseVille;
    private $pointRelais;
    private $token;
    private $etat;

    private static $select = "select * from utilisateur";
    private static $selectById = "select * from utilisateur where id = :id";
    private static $selectByEmail = "select * from utilisateur where email = :email";
    private static $insertFr = "insert into utilisateur (genre,nom,prenom,email,motDePasse,telephone,adresseRue,adressePostal,codeVille) values(:genre,:nom,:prenom,:email,:motDePasse,:telephone,:adresseRue,:adressePostal,:adresseVille)";
    private static $insertRDC = "insert into utilisateur (genre,nom,prenom,email,motDePasse,telephone,adresseRue,etat,codeVille) values(:genre,:nom,:prenom,:email,:motDePasse,:telephone,:adresseRue,:etat,:adresseVille)";
    private static $update = "update utilisateur set genre=:genre,nom=:nom,prenom=:prenom,email=:email,motDePasse=:motDePasse,telephone=:telephone,adresseRue=:adresseRue,adressePostal=:adressePostal,codeVille =:adresseVille,token = :token where id=:id";
    private static $delete = "delete from utilisateur where id = :id";


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

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
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

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
     * Get the value of adressePostal
     */ 
    public function getAdressePostal()
    {
        return $this->adressePostal;
    }

    /**
     * Set the value of adressePostal
     *
     * @return  self
     */ 
    public function setAdressePostal($adressePostal)
    {
        $this->adressePostal = $adressePostal;

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
    public function setAdresseVille(Ville $ville)
    {
        $this->adresseVille = $ville;

        return $this;
    }

    /**
     * Get the value of pointRelais
     */ 
    public function getPointRelais()
    {
        return $this->pointRelais;
    }

    /**
     * Set the value of pointRelais
     *
     * @return  self
     */ 
    public function setPointRelais(PointRelais $point)
    {
        $this->pointRelais = $point;

        return $this;
    }

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

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

    private static function arrayToUtilisateur(Array $array) {

        $utilisateur = new Utilisateur();
        $utilisateur->id = $array["id"];
        $utilisateur->genre = $array["genre"];
        $utilisateur->nom = $array["nom"];
        $utilisateur->prenom = $array["prenom"];
        $utilisateur->email = $array["email"];
        $utilisateur->motDePasse = $array["motDePasse"];
        $utilisateur->telephone = $array["telephone"];
        $utilisateur->adresseRue = $array["adresseRue"];
        $utilisateur->adressePostal = $array["adressePostal"];
        $ville = $array["codeVille"];
        if($ville != null){
            $utilisateur->adresseVille  = Ville::fetch($ville);
        }

        $relais = $array["idPointRelais"];
        if($relais != null){
            $utilisateur->pointRelais  = PointRelais::fetch($relais);
        }
        $utilisateur->etat  = $array["etat"];
        $utilisateur->token = $array["token"];
        return $utilisateur;
    }


    public static function fetchAll() {
        $collectionProduit = null;
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->query(Utilisateur::$select);
        $recordSet = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recordSet as $record) {
        $collectionProduit[] = Utilisateur::arrayToUtilisateur($record);
        }

        return $collectionProduit;
    }

    public static function fetch($idUtilisateur) {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Utilisateur::$selectById);
        $pdoStatement->bindParam(":id", $idUtilisateur);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $utilisateur = Utilisateur::arrayToUtilisateur($record);
        return $utilisateur;
    }

    public static function fetchByEmail($email) {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Utilisateur::$selectByEmail);
        $pdoStatement->bindParam(":email", $email);
        $pdoStatement->execute();
        $c = $pdoStatement->rowCount();
        $utilisateur = null;
       
        if($c > 0)
        {
            $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
            $utilisateur = Utilisateur::arrayToUtilisateur($record);
        }
 
                 
        
        return $utilisateur;   
    }

    public static function ExistEmail($email) {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Utilisateur::$selectByEmail);
        $pdoStatement->bindParam(":email", $email);
        $pdoStatement->execute();
        $record = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $utilisateur = Utilisateur::arrayToUtilisateur($record);
        
        $exist = true;
        if($utilisateur == null){
            $exist = false;
        }

        return $exist;
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
        $pdoStatement = $pdo->prepare(Utilisateur::$update);
        $pdoStatement->bindParam(":id", $this->id);
        $pdoStatement->bindParam(":genre", $this->genre);
        $pdoStatement->bindParam(":nom", $this->nom);
        $pdoStatement->bindParam(":prenom", $this->prenom);
        $pdoStatement->bindParam(":email", $this->email);
        $pdoStatement->bindParam(":motDePasse", $this->motDePasse);
        $pdoStatement->bindParam(":telephone", $this->telephone);
        $pdoStatement->bindParam(":adresseRue", $this->adresseRue);
        $pdoStatement->bindParam(":adressePostal", $this->adressePostal);
        $pdoStatement->bindParam(":token",$this->token);
        if ($this->adresseVille != null) {
            $codeVille = $this->adresseVille->getCodeVille();
        }

        $pdoStatement->bindParam(":adresseVille",$codeVille);
        $pdoStatement->execute();

    }
       

    private function insert() {

        $pdo = (new DBA())->getPDO();

        if($this->etat == null){

            $pdoStatement = $pdo->prepare(Utilisateur::$insertFr);
            $pdoStatement->bindParam(":genre", $this->genre);
            $pdoStatement->bindParam(":nom", $this->nom);
            $pdoStatement->bindParam(":prenom", $this->prenom);
            $pdoStatement->bindParam(":email", $this->email);
            $pdoStatement->bindParam(":motDePasse", $this->motDePasse);
            $pdoStatement->bindParam(":telephone", $this->telephone);
            $pdoStatement->bindParam(":adresseRue", $this->adresseRue);
            $pdoStatement->bindParam(":adressePostal", $this->adressePostal);
            $codeVille = $this->adresseVille->getCodeVille();
    
            $pdoStatement->bindParam(":adresseVille",$codeVille);
            $pdoStatement->execute();
        }
        else {
            $pdoStatement = $pdo->prepare(Utilisateur::$insertRDC);
            $pdoStatement->bindParam(":genre", $this->genre);
            $pdoStatement->bindParam(":nom", $this->nom);
            $pdoStatement->bindParam(":prenom", $this->prenom);
            $pdoStatement->bindParam(":email", $this->email);
            $pdoStatement->bindParam(":motDePasse", $this->motDePasse);
            $pdoStatement->bindParam(":telephone", $this->telephone);
            $pdoStatement->bindParam(":adresseRue", $this->adresseRue);
            $pdoStatement->bindParam(":etat", $this->etat);
            $codeVille = $this->adresseVille->getCodeVille();
    
            $pdoStatement->bindParam(":adresseVille",$codeVille);
            $pdoStatement->execute();
        }



 

       return $this->id = $pdo->lastInsertId();
    }




    public function delete() {
        $pdo = (new DBA())->getPDO();
        $pdoStatement = $pdo->prepare(Utilisateur::$delete);
        $pdoStatement->bindParam("id", $this->id);
        $resultat = $pdoStatement->execute();
        $nblignesAffectees = $pdoStatement->rowCount();

        if ($nblignesAffectees == 1) {
        $this->id = null;
        }
        return $resultat;
    }
}       