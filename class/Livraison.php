<?php

class Livraison {

    private $idLivraison;
    private $idUtilisateur;
    private $adresseRue;
    private $codeVile;
    private $telephone;






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
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
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
    public function getCodeVile()
    {
        return $this->codeVile;
    }

    /**
     * Set the value of codeVile
     *
     * @return  self
     */ 
    public function setCodeVile(Ville $codeVile)
    {
        $this->codeVile = $codeVile;

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

}
