

<?php


class Services
{
    private $id;
    private $nom;
    private $type;
    private $price;
    public function GetID()
    {
        return $this->id;
    }
    public function SetID($serv_ID)
    {
        $this->id = $serv_ID;
    }
    public function Getnom()
    {
        return $this->nom;
    }
    public function Setnom($serv_nom)
    {
        $this->nom = $serv_nom;
    }
    public function GetType()
    {
        return $this->type;
    }
    public function SetType($serv_type)
    {
        $this->type = $serv_type;
    }
    public function GetPrice()
    {
        return $this->price;
    }
    public function SetPrice($serv_price)
    {
        $this->price = $serv_price;
    }
}
?>
