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
        Validator::validate_empty("username", $errors);
        Validator::validate_empty("password", $errors);
        Validator::validate_empty("re_password", $errors);
        Validator::validate_empty("name", $errors);
        Validator::validate_empty("job", $errors);
        
        if(isset($_FILES['image'])){
            //send errors array as a paramter to add errors in it (pass by referenece)
            Validator::validate_file("image", $errors, "image/jpeg");
        }
        if(isset($_FILES['cv'])){
            Validator::validate_file("cv" ,$errors, "application/pdf");
        }


        if($password !== $re_password)
            $errors[] = "the password doesn't match";
        if( strlen($password) < MIN_PASS_LEN || strlen($password) > MAX_PASS_LEN )
            $errors[] = "password should between 8 and 16 characters";

        $register = new Registration();
        $unique_username = $register->is_unique($username);

        if(!$unique_username){
            $errors[] = "this username is exit please chose another one";
        }

        Google_recaptcha($errors);

        if(empty($errors)){
            $image_name = Helper::upload("image");
            $cv_name    = Helper::upload("cv");
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            //if there is not errors add this record to DB
            $result = $register->register($username, $hashed_password, $name, $job, $image_name, $cv_name);
            echo $result;
            $_SESSION['user_id'] = $result;
            $_SESSION['is_admin'] = false;
            header('Location: index.php');             
        }
    }



//-----------------------bonus -------------------------------------------------
function Google_recaptcha(&$errors){
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
      echo "nope";
        $secret = '6Ld-JZAUAAAAABrTF13f7iX4s6h972mQ09YH_gvG';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
            $succMsg = 'Your contact request have submitted successfully.';
        }
        else
        {
            $errors[]="Robot verification failed, please try again.";
        }
   
   }else{
       
    $errors[]= 'Please click on the reCAPTCHA box.';
  }
}
//------------------------------------------------------------------------------


include_once('Views/components/head.php');
?>



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
                        <label for="image">Your Image (only jpg allowed)</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>

                    <div class="form-group">
                        <label for="cv">Your Cv (only pdf allowed)</label>
                        <input type="file" name="cv" class="form-control-file" id="cv">
                    </div>

                    <!-- <div class="form-group form-check">         
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label"> Remember me </label>                   
                    </div> -->
                    <div class="g-recaptcha" data-sitekey="6Ld-JZAUAAAAAIVi0aSme1uF5nOvwboDUbIbI7cg" ></div>
                    <button type="submit" name="register" class="btn btn-primary form-control">Submit</button>
                </form> 
                <a href="<?php echo $_SERVER['PHP_SELF']?>"> Already register ? go to login page</a>
            </div>
        </div>
        

    </div>
    
</body>
</html>
