<?php


class Student
{
    private int $id;
    private string $first_name,$last_name,$email, $created_at;
    private $password, $image;


    public function __construct($id, $first_name, $last_name,$email, $created_at,$password,$image)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email=$email;
        $this->created_at = $created_at;
        $this->password=$password;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getFirstName()
    {
        return $this->first_name;
    }


    public function getLastName()
    {
        return $this->last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function getImage()
    {
        return $this->image;
    }


}