<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entity/Client.php');

class GestionClient
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

    public function Ajouter($client)
    {
        $nom = $client->getNom();
        $email =$client->getEmail();
        // requête SQL
        $sql = "INSERT INTO `client`(`nom`, `email`) VALUES ('$nom','$email')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function RechercherTous()
    {
        $sql = 'SELECT * FROM client';
        $query = mysqli_query($this->getConnection(), $sql);
        $clients_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $clients = array();
        foreach ($clients_data as $client_data) {
            $client = new Client();
            $client->setId( $client_data['Id_client']);
            $client->setNom( $client_data['nom']);
            $client->setEmail( $client_data['email']);
            array_push(  $clients, $client);
        }
        return $clients;
    }

    public function RechercherParId($id)
    {
        $sql = "SELECT * FROM client WHERE Id_client= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $client_data = mysqli_fetch_assoc($result);
        $client = new Client();
        $client->setId($client_data['Id_client']);
        $client->setNom($client_data['nom']);
        $client->setEmail($client_data['email']);
        return  $client;
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
?>