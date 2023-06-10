<?php

require_once(__ROOT__ . '/Entity/Client.php');
class GestionClients
{
    private $Connection = Null;
    private function getConnection()
    {
        if (is_null($this->Connection)) {
            $this->Connection = mysqli_connect('localhost', 'root', '', 'prototype-fil-rouge');
            // Vérifier l'ouverture de la connexion avec la base de données
            if (!$this->Connection) {
                $message = 'Erreur de connexion: ' . mysqli_connect_error();
                throw new Exception($message);
            }
        }
        return $this->Connection;
    }


    public function pages($items, $pagesNum, $itemsPerPage)
    {
        $pages = array();
        $totalItems = count($items);
        for ($i = 0; $i < $pagesNum; $i++) {
            if (($i + 1) * $itemsPerPage <= $totalItems) {
                array_push($pages, array_slice($items, $i * $itemsPerPage, $itemsPerPage));
            } else {
                array_push($pages, array_slice($items, $i * $itemsPerPage));
            }
        }
        return $pages;
    }


    public function Ajouter($Client)
    {
        $nom = $Client->Getnom();
        $email = $Client->Getemail();
        // requête SQL
        $sql = "INSERT INTO `client`(`nom`, `email`) VALUES ('$nom','$email')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function RechercherTous($sql)
    {
        // $sql = 'SELECT Id, name, description FROM projects';
        $query = mysqli_query($this->getConnection(), $sql);
        $Clients_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $Clients = array();
        foreach ($Clients_data as $Client_data) {
            $Client = new Client();
            $Client->setId($Client_data['Id_client']);
            $Client->Setnom($Client_data['nom']);
            $Client->Setemail($Client_data['email']);
            array_push($Clients, $Client);
        }
        return $Clients;
    }

    public function RechercherParId($id)
    {
        $sql = "SELECT * FROM client WHERE Id_client= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $Client_data = mysqli_fetch_assoc($result);
        $Client = new Client();
        $Client->SetID($Client_data['Id_client']);
        $Client->Setnom($Client_data['nom']);
        $Client->Setemail($Client_data['email']);
        return   $Client;
    }


    public function rechercherParNom($nom)
    {
        $Clients_data  = $this->searchClietsByName($nom);
        $Clients = array();
        foreach ($Clients_data  as $Client_data) {
            $Client = new Client();
            $Client->SetID($Client_data['Id_client']);
            $Client->Setnom($Client_data['nom']);
            $Client->Setemail($Client_data['email']);
            array_push($Clients,  $Client);
        }
        return  $Clients;
    }
    private function searchClietsByName($nom)
    {
        $sql = "SELECT * FROM client WHERE nom LIKE ?";
        $stmt = $this->getConnection()->prepare($sql);
        $search_nom = "%$nom%";
        $stmt->bind_param("s", $search_nom);
        $stmt->execute();
        $query = $stmt->get_result();
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public function Supprimer($id)
    {
        $sql = "DELETE FROM client WHERE Id_client= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($id, $nom, $email)
    {
        // Requête SQL
        $sql = "UPDATE client SET 
        nom='$nom', email='$email'
        WHERE Id_client= $id";
        //  
        mysqli_query($this->getConnection(), $sql);
        //
        if (mysqli_error($this->getConnection())) {
            $msg = 'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg);
        }
    }
}
