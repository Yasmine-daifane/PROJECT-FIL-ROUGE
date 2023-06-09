

<?php

 class Client {

    private $Id_client ;
    private $nom;
    private $email;


    public function getId() { 
        return $this->Id_client;
    }
    public function setId($Id_client) {
        $this->Id_client =$Id_client;   
    }

    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getEmail() {
        return $this-> email;
    }
  
    public function setEmail($email) {
        $this-> email = $email;
    }

 
















}










?>