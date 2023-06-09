<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entitys/client.php');

class GestionClient
{
    private $Connection = Null;

    private function GetConnection()
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

    public function Add($client)
    {
        $Name = $client->Getnom();
        $email = $client->Getemail();
        // requête SQL
        $sql = "INSERT INTO `client`(`nom`, `email`) VALUES ('$Name','$email')";
        mysqli_query($this->GetConnection(), $sql);
    }

    public function AllClientData()
    {
        $sql = 'SELECT * FROM client ORDER BY `Id_client` DESC';
        $query = mysqli_query($this->GetConnection(), $sql);
        $clients_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $clients = array();
        foreach ( $clients_data as $client_data) {
            $client= new client();
            $client->SetID($client_data['Id_client']);
            $client->Setnom($client_data['nom']);
            $client->Setemail($client_data['email']);
            array_push($clients, $client);
        }
        return $clients;
    }

    public function ClientId($id)
    {
        $sql = "SELECT * FROM client WHERE Id_client= $id";
        $result = mysqli_query($this->GetConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $client_data = mysqli_fetch_assoc($result);
        $client = new client();
        $client->SetID($client_data['Id_client']);
        $client->Setnom($client_data['nom']);
        $client->Setemail($client_data['email']);
        return   $client;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM client WHERE Id_client= '$id'";
        mysqli_query($this->GetConnection(), $sql);
    }

    public function Edit($id, $nom, $email)
    {
        // Requête SQL 
        $sql = "UPDATE client SET nom='$nom', email='$email'    WHERE Id_client= $id";
        //  
        mysqli_query($this->GetConnection(), $sql);
        //
        if (mysqli_error($this->GetConnection())) {
            $msg = 'Erreur' . mysqli_errno($this->GetConnection());
            throw new Exception($msg);
        }
    }

}
