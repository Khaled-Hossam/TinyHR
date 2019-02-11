<?php

    if( isset($_POST['login']) ){
        // this array to store any error of login
        $errors = array();

        $username = $_POST['username'];
        $password = $_POST['password'];

        validate_empty("username", $errors);
        validate_empty("password", $errors);

        $login_try = new Login();
        if($username && $password){
            $data = $login_try->login_attempt($username, $password);
            if($data){
                if( $data["is_admin"] == 1 ){
                    $_SESSION["user_id"] = true;
                    $_SESSION["is_admin"] = true;
                    require_once("Views/admin/users.php");
                    exit();
                }else{
                    $_SESSION["user_id"] = $data['id'];
                    $_SESSION["is_admin"] = false;
                    require_once("Views/member/view_my_profile.php");
                    exit;
                }
            }
            else{
                $errors[] = "Wrong username or password please try again";
            }
        }
        
    }

    function validate_empty($input_name, &$errors){
        $input = $_POST[$input_name];
        if(!$input)
            $errors[] = "$input_name is required";
    }


    include_once('Views/components/head.php');

?>




<body>
    <div class="containter">
        <div class="row">
            <div class="offset-4 col-md-4 mt-5" >
                <?php
                if(!empty($errors)){
                    echo "<ul class='alert alert-danger'>";
                    foreach ($errors as  $value) {
                        echo "<li>$value </li>";
                    }
                    echo "</ul>";
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" value="<?php echo isset($username)?$username : '' ?>" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password" class="form-control" id="pwd">
                    </div>
                    <!-- <div class="form-group form-check">         
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label"> Remember me </label>                   
                    </div> -->
                    <button type="submit"  name="login" class="btn btn-primary form-control">Submit</button>
                </form> 
                <a href="<?php echo $_SERVER['PHP_SELF']?>?signup"> Not register ? go to register page</a>
            </div>
        </div>

    </div>
    
</body>
</html>
