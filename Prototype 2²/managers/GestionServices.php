<?php

// define('__ROOT__', dirname(dirname(__FILE__)));
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entitys/services.php');

class GestionServices
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

    public function Add($service)
    {
        $id = $service->GetID();
        $Name = $service->Getnom();
        $type = $service->GetType();
        $price = $service->GetPrice();
        // requête SQL
        $sql = "INSERT INTO `services`( `type`, `price`,`nom`,`Id_client` ) VALUES ('$type','$price','$Name','$id')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function AllServices($id)
    {
        $sql = "SELECT * FROM services  WHERE Id_client=$id";
        $query = mysqli_query($this->GetConnection(), $sql);
        $Services_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $Services = array();
        foreach ($Services_data  as $service_data) {
            $service = new Services();
            $service->SetID($service_data['Id_srvice']);
            $service->Setnom($service_data['nom']);
            $service->SetType($service_data['type']);
            $service->SetPrice($service_data['price']);
            array_push($Services, $service);
        }
        return  $Services;
    }

    public function ServiceParId($id)
    {
        $sql = "SELECT * FROM services WHERE Id_srvice= $id";
        $result = mysqli_query($this->GetConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $service_data = mysqli_fetch_assoc($result);
        $service = new Services();
        $service->SetID($service_data['Id_srvice']);
        $service->Setnom($service_data['nom']);
        $service->SetType($service_data['type']);
        $service->SetPrice($service_data['price']);
        return $service;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM services WHERE Id_srvice= '$id'";
        mysqli_query($this->GetConnection(), $sql);
    }

    public function Edite($id,   $Name,  $type,  $price)
    {
        // Requête SQL
        $sql = "UPDATE services SET  nom=' $Name', type='$type' , price=' $price'  WHERE Id_srvice= $id";
        //  
        mysqli_query($this->GetConnection(), $sql);
        //
        if (mysqli_error($this->GetConnection())) {
            $msg = 'Erreur' . mysqli_errno($this->GetConnection());
            throw new Exception($msg);
        }
    }
}
