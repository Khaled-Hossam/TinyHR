<?php

    if( isset($_POST['register']) ){
        // this array to store any error of registertion
        $errors = array();

        $username = $_POST['username'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
        $name = $_POST['name'];
        $job = $_POST['job'];

        // if(!$username)
        //     $errors[] = "username is required";
        validate_empty("username", $errors);
        validate_empty("password", $errors);
        validate_empty("re_password", $errors);
        validate_empty("name", $errors);
        validate_empty("job", $errors);
        
        if(isset($_FILES['image'])){
            //send errors array as a paramter to add errors in it (pass by referenece)
            validate_file("image", $errors);
        }
        if(isset($_FILES['cv'])){
            validate_file("cv" ,$errors);
        }


        if($password !== $re_password)
            $errors[] = "the password doesn't match";
        if( strlen($password) < 8 || strlen($password) > 16 )
            $errors[] = "password should between 8 and 16 characters";

        $register = new Register();
        $unique_username = $register->is_unique($username);

        if(!$unique_username){
            $errors[] = "this username is exit please chose another one";
        }

        if(empty($errors)){
            $image_name = upload("image");
            $cv_name    = upload("cv");
            //if there is not errors add this record to DB
            $result = $register->register($username, $password, $name, $job, $image_name, $cv_name);
            echo $result;
            $_SESSION['user_id'] = $result;
            $_SESSION['is_admin'] = false;
            header('Location: index.php');             
        }
    }

    /** here pass the errors array by reference to be able to edit it, otherwise i must pass
     *  the array then return it again 
     */
    function validate_file($file, &$errors){
        $file_name = time().'_'. $_FILES[$file]['name'];
        $file_size = $_FILES[$file]['size'];
        $file_tmp   = $_FILES[$file]['tmp_name'];
        $file_type  = $_FILES[$file]['type'];
        $file_error = $_FILES[$file]['error'];
        // print_r($file_name);

        //$file_error = 4 means no file uploaded
        if($file_error == 4 )
            $errors[] = "$file not uploaded";

        //$file_error = 1 means file bigger than the [upload_max_filesize] in php.ini
        //$file_error = 2 means file bigger than the [MAX_FILE_SIZE] hidden attrubute in html form
        //$file_size > 1m  => will prevent him if he passed 1 & 2 errors
        else if($file_size > MAX_FILE_SIZE || $file_error == 1 || $file_error ==2)
            $errors[] = "$file size is bigger than 1M ";

      
        // print_r($_FILES[$file]);
        // foreach ($_FILES[$file] as $key => $value) {
        //     echo "<b>$key</b> : $value <br>" ;
        // }
    }

    function validate_empty($input_name, &$errors){
        $input = $_POST[$input_name];
        if(!$input)
            $errors[] = "$input_name is required";
    }

    
    /** this function to uploads files in case there is no errors
     * and return the name of the file to store it in DB
     */
    function upload($file){
        $file_name = time().'_'. $_FILES[$file]['name'];
        $file_tmp_location  = $_FILES[$file]['tmp_name'];
        move_uploaded_file($file_tmp_location, UPLOADS_DIR.$file_name);
        return $file_name;
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    <script src="main.js"></script>

</head>

<body>
    <div class="containter">
        <div class="row">
            <div class="offset-4 col-md-4 mt-5">
                <?php
                if(!empty($errors)){
                    echo "<ul class='alert alert-danger'>";
                    foreach ($errors as  $value) {
                        echo "<li>$value </li>";
                    }
                    echo "</ul>";
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>?signup" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" value="<?php echo isset($username)?$username : '' ?>" class="form-control" id="username">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password" class="form-control" id="pwd">
                    </div>

                    <div class="form-group">
                        <label for="pwd2">Re-Password:</label>
                        <input type="password" name="re_password" class="form-control" id="pwd2">
                    </div>

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="<?php echo isset($name)?$name : '' ?>" class="form-control" id="name">
                    </div>
                    
                    <div class="form-group">
                        <label for="job">Job:</label>
                        <input type="text" name="job" value="<?php echo isset($job)?$job : '' ?>" class="form-control" id="job">
                    </div>

                    <input name="MAX_FILE_SIZE" value="1048576" type="hidden"/>
                    <div class="form-group">
                        <label for="image">Your Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>

                    <div class="form-group">
                        <label for="cv">Your Cv</label>
                        <input type="file" name="cv" class="form-control-file" id="cv">
                    </div>

                    <div class="form-group form-check">         
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label"> Remember me </label>                   
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Submit</button>
                </form> 
                <a href="<?php echo $_SERVER['PHP_SELF']?>"> Already register ? go to login page</a>
            </div>
        </div>
        

    </div>
    
</body>
</html>
