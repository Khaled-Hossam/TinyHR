<?php

class Registration
{
    private $connection;

    public function __construct(){

        $this->connection = new MYSQLHandler("users");
        // connect to database
        $this->connection->connect();
    }

    public function is_unique($field_name, $update= false, $id=0){
        //this condtion to ignore check his username while editing
        if($update){
            $sql_stmt = "select username from users where username = '$field_name' and id!='$id'";            
        }
        else{
            $sql_stmt = "select username from users where username = '$field_name'";            
        }
        $result = $this->connection->get_result($sql_stmt);
        if($result){
            return false;
        }
        return true;
    }

    public function register($username, $password, $name, $job, $image_name, $cv_name){
        $sql_stmt = "INSERT INTO users(username, password, name, job, image, cv)
         VALUES( '$username', '$password', '$name', '$job', '$image_name', '$cv_name')";
        //move that to db handler later
        return $this->connection->add_record($sql_stmt);
    }

    public function update($id, $username, $password, $name, $job, $image_name, $cv_name){
        $sql_stmt = "update users set username = '$username', password = '$password',
         name = '$name', job = '$job', image = '$image_name', cv= '$cv_name'
         where id = '$id' ";
         $this->connection->update($sql_stmt);
        //move that to db handler later
    }
}

?>