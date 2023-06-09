

<?php


class client
{

    private $id;
    private $nom;
    private $email;
    public function GetID()
    {
        return $this->id;
    }
    public function SetID($new_ID)
    {
        $this->id = $new_ID;
    }
    public function Getnom()
    {
        return $this->nom;
    }
    public function Setnom($user_nom)
    {
        $this->nom = $user_nom;
    }
    public function Getemail()
    {
        return $this->email;
    }
    public function Setemail($user_email)
    {

        $this->email = $user_email;
    }
}


?>
