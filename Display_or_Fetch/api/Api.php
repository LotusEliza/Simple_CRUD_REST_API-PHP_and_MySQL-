<?php

//Api3.php

class API
{
    private $connect = '';

    function __construct()
    {
        $this->database_connection();
    }



    //DB Params
    private $host ='localhost';
    private $db_name ='testing';
    private $username ='phpmyadmin';
    private $password ='12122';



    function database_connection()
    {
        $this->connect = new PDO('mysql:host='.$this->host . ';dbname=' . $this->db_name, $this->username, $this->password);

    }

    function fetch_all()
    {
        $query = "SELECT * FROM tbl_sample ORDER BY id";
        $statement = $this->connect->prepare($query);
        if ($statement->execute()) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    }
}