<?php
require_once(__ROOT__ . '/Entity/Service.php');
require_once(__ROOT__ . '/Entity/Client.php');

class GestionServices
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

    public function Ajouter($service)
    {
        $Id = $service->GetID();
        $nom =$service->Getnom();
        $type = $service->GetType();
        $price = $service-> GetPrice();
        // requête SQL
        $sql = "INSERT INTO `services`(`nom`, `type`,price, `Id_client`) VALUES ('$nom','$type', '$price','$Id')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function pages($items, $pagesNum, $itemsPerPage)
    {
        $pages = array();
        for ($i = 0; $i < $pagesNum; $i++) {
            array_push($pages, array_slice($items, $i * $itemsPerPage, ($i + 1) * $itemsPerPage));
        }
        return $pages;
    }
    public function RechercherTous($id)
    {
        $services = "SELECT * FROM services  WHERE Id_client = '$id'";
        $clients = "SELECT * FROM client";
        $services = mysqli_query($this->getConnection(),  $services);
        $clients = mysqli_query($this->getConnection(), $clients);
        $services_data = mysqli_fetch_all( $services, MYSQLI_ASSOC);
        $clients_data = mysqli_fetch_all($clients, MYSQLI_ASSOC);
        $services = array();
        $clients = array();
        $result = array();
        foreach (  $services_data as  $service_data) {
            $service = new Service();
            $service->SetID( $service_data['Id_srvice']);
            $service->Setnom( $service_data['nom']);
            $service->SetType( $service_data['type']);
            $service->SetPrice( $service_data['price']);
            array_push( $services,  $service);
        }
        foreach ($clients_data as $client_data) {
            $client = new Client();
            $client->SetID($client_data['Id_client']);
            $client->Setnom($client_data['nom']);
            $client->Setemail($client_data['email']);
            array_push($clients, $client);
        }
        $result = [$clients, $services];
        return $result;
    }

    public function rechercherParNom($nom, $id)
    {
        $result = array();
        $clients = "SELECT * FROM services ";
        $clients = mysqli_query($this->getConnection(), $clients);
        $clients_data = mysqli_fetch_all($clients, MYSQLI_ASSOC);
        $Services_data = $this->searchServicesByName($nom, $id);
        $Services = array();
        foreach ( $Services_data as $Service_data) {
            $Service = new Service();
            $Service->SetID($Service_data['Id_srvice']);
            $Service->Setnom($Service_data['nom']);
            $Service->SetType($Service_data['type']);
            $Service->SetPrice($Service_data['price']);
            array_push( $Services,   $Service);
        }
        foreach($clients_data as $client_data) {
            $client = new Client();
            $client->SetID($client_data['Id_client']);
            $client->Setnom($client_data['nom']);
            $client->Setemail($client_data['email']);
            array_push( $Clients, $client);
        }
        $result = [$clients, $Service];
        return $result;
    }
    private function searchServicesByName($nom, $id)
    {
        $sql = "SELECT * FROM client WHERE nom LIKE ? AND `Id_client` = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $search_nom = "%$nom%";
        $search_nom  = $id;
        $stmt->bind_param("si",   $search_nom ,   $search_nom ); // Use "si" for a string and integer parameter
        $stmt->execute();
        $query = $stmt->get_result();
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }


    public function RechercherParId($id)
    {
        $sql = "SELECT * FROM services WHERE Id_srvice= '$id'";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $Service_data = mysqli_fetch_assoc($result);
        $service= new Services();
        $service->SetID(  $Service_data['Id_srvice']);
        $service->Setnom(  $Service_data['nom']);
        $service->SetType(  $Service_data['type']);
        $service->SetPrice(  $Service_data['price']);
        return   $service;
    }

    public function Supprimer($id)
    {
        $sql = "DELETE FROM services WHERE Id_srvice= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($id, $nom, $type,$price)
    {
        // Requête SQL
        $sql = "UPDATE services SET 
        nom='$nom',type='$type',price='$price'
        WHERE Id_srvice= $id";
        //  
        mysqli_query($this->getConnection(), $sql);
        //
        if (mysqli_error($this->getConnection())) {
            $msg = 'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg);
        }
    }
}

?>