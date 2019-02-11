<?php

class Authentication
{
    private $connection;

    public function __construct(){

        $this->connection = new MYSQLHandler("users");
        // connect to database
        $this->connection->connect();
    }

    public function login_attempt($username, $password){
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $result = $this->connection->get_record_by_id("username", $username, "s");
        if($result){
            $user = $result;
            if (password_verify($password, $user['password'])) {
                $stmt = "update users set status = 1 where id = ".$user['id'];
                $this->connection->update($stmt);
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