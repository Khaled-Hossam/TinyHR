<?php

class Login
{
    private $connection;

    public function __construct(){

        $this->connection = new MYSQLHandler();
        // connect to database and enter table name
        $this->connection->connect("users");
    }

    public function login_attempt($username, $password){
        $sql_stmt = "select * from users where username= '$username' and password = '$password' limit 1";
        return $this->connection->get_result($sql_stmt);
    }
}


?>