<?php

class MYSQLHandler implements DbHandler
{
    /* there is two methods in mysqli that returns handler
        1-mysqli_connect()
        2-mysqli_query()
    */

    private $db_handler;
    private $table_name;

    public function __construct(){

    }

    public function connect(){

        @$handler = mysqli_connect(__HOST__, __USER__,__PASS__,__DB__);
        if($handler)
        {
            // echo "conntected successfuly<br>";
            $this->db_handler = $handler;
            $this->table_name = "users";
            return true;
        }
        else{
            echo "problem in connection" . mysqli_connect_error() ;
            return false;}

    }

    public function get_data($fields = array(),  $start = 0){
        //? this suppose not to work how it worked ??
        //cuz it will make array only if he doesnot provide array but what you did first worked
        //cuz he send string and then becaome like $fields = "id,name,img"
        /* the select is case insenstive but after you retirve the data it become case senstive*/
        if($fields){
            $sql_fields = "";
            foreach($fields as $field){
                $sql_fields .= $field . ",";
            }
            $sql_stmt = "select $sql_fields from $this->table_name";
            $sql_stmt = str_replace(", from", " from", $sql_stmt);
            $sql_stmt .= " limit $start,".__RECORDS_PER_PAGE__;
        }
        else
            $sql_stmt = "select * from $table_name";

        // echo $sql_stmt;
        return $this->get_result($sql_stmt);
    }

    public function get_result($sql_stmt)
    {
        $result_handler = mysqli_query($this->db_handler, $sql_stmt);

        /* if the sql statment is right -but maybe there is no result- */
        if($result_handler){ 
            if($result_handler->num_rows > 0){
                $res_arr = array();
                while($row = $result_handler->fetch_assoc()){
                    $res_arr[] = array_change_key_case($row);
                }
                return $res_arr;

            }
            else{
                // echo "there is no result";
                return false;
            }
            
        }
        /* this check if the sql statemnt is wrong */
        else{ 
            echo "error in the sql stament";
        }
        


    }
    public function disconnect(){
        mysqli_close($this->db_handler);

    }   
    public function get_record_by_id($primary_key, $id){
        $sql_stmt = "select * from $this->table_name where $primary_key = $id limit 1";
        // $result_handler = mysqli_query($this->db_handler, $sql_stmt);
        return $this->get_result($sql_stmt);

        // /* if the sql statment is right -but maybe there is no result- */
        // if($result_handler){ 
        //     if($result_handler->num_rows > 0){
        //         return $res_arr = mysqli_fetch_assoc($result_handler);
        //         // print_r($res_arr);
               
        //     }
        //     else{
        //         echo "there is no result";
        //     }
            
        // }
        // /* this check if the sql statemnt is wrong */
        // else{ 
        //     echo "error in the sql stament";
        // }
    }

    



    public function search($column_name, $value){
        $stmt = "select * from $table_name where $column_name like '%$value%'";
        return $this->get_result($stmt);
    }


    public function add_record($stmt){
        // print_r($stmt);
        $this->db_handler->query($stmt);
        return  $this->db_handler->insert_id;
    }

    public function update($stmt) {
        var_dump($stmt);
        $this->db_handler->query($stmt);
        
        
    }

    public function get_count(){
        $stmt = "select count(*) from users";
        $result = $this->db_handler->query($stmt);
        $row = $result->fetch_row();
        return $row[0];
        
    }
}


?>