<?php
class Validator{
    public static function validate_empty($input_name, &$errors){
        $input = $_POST[$input_name];
        if(!$input)
            $errors[] = "$input_name is required";
    }

    /** here pass the errors array by reference to be able to edit it, otherwise i must pass
     *  the array then return it again 
     */
    public static function validate_file($file, &$errors, $allowed_type){
        $file_name = time().'_'. $_FILES[$file]['name'];
        $file_size = $_FILES[$file]['size'];
        $file_tmp   = $_FILES[$file]['tmp_name'];
        $file_type  = $_FILES[$file]['type'];
        $file_error = $_FILES[$file]['error'];

        //$file_error = 4 means no file uploaded
        if($file_error == 4 )
            $errors[] = "$file not uploaded";

        //$file_error = 1 means file bigger than the [upload_max_filesize] in php.ini
        //$file_error = 2 means file bigger than the [MAX_FILE_SIZE] hidden attrubute in html form
        //$file_size > 1m  => will prevent him if he passed 1 & 2 errors
        else if($file_size > MAX_FILE_SIZE || $file_error == 1 || $file_error ==2)
            $errors[] = "$file size is bigger than 1M ";

        if(__DEBUG_MODE__ == 1){
            print_r($_FILES[$file]);
            foreach ($_FILES[$file] as $key => $value) {
                echo "<b>$key</b> : $value <br>" ;
            }
        }
        
        if($file_error == 0){
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file_tmp);
            if ($mime == $allowed_type) {
                //Its a doc format do something
            }
            else{
                $type = $allowed_type == 'application/pdf' ? "pdf" : "jpg";
                $errors []= "only [ $type ] is allowed in $file";
            }
            finfo_close($finfo);
        }
        
    }
}