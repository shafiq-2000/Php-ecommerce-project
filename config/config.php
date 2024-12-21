<?php

class connection
{

    protected $con;
    public function __construct()
    {
        $this->con = new mysqli("localhost", "root", "", "e_commerce_site");  //oop style 

        //Procedural Style:avabe dilew hobe
        //$this->con = mysqli_connect("localhost", "root", "", "taskmanager");
    }
}
