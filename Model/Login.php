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
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql_stmt = "select * from users where username= '$username' limit 1";
        $result = $this->connection->get_result($sql_stmt);
        if($result){
            $user = $result[0];
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                //this means the password is wrong
                return false;
            }
        }
        else{
            //this means the username is wrong
            return false;
        }
    }
}


?>