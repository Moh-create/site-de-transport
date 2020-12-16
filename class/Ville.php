<?php

class Ville {
    private $codeVille;
    private $nomVille;
    private $pays;
    
    private static $select = "select * from ville";
    private static $selectById = "select * ville pays where codeVille = :codeVille";
    private static $insert = "insert into pays (codeVille,nomVille) values(:codeVille,:nomVille)";
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

    private static function arrayToProduit(Array $array) {

        $ville = new Ville();

        $ville->codeVille = $array["codePays"];
        $ville->nomVille = $array["nomVille"];
        $codePays = $array["codePays"];

        if($codePays != null){
        $ville->pays = Pays::fetch($codePays);
        }

        return $p;
    }
       
}