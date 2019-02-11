<?php

class Helper{
    /** this function to uploads files in case there is no errors
     * and return the name of the file to store it in DB
     */
    function upload($file){
        $file_name = time().'_'. $_FILES[$file]['name'];
        $file_tmp_location  = $_FILES[$file]['tmp_name'];
        move_uploaded_file($file_tmp_location, UPLOADS_DIR.$file_name);
        return $file_name;
}
}