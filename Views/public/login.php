<?php

    // session_start();
    // if( isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]== true ){
    //     if(  isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]== true ){
    //         require_once("Views/adminpage.php");
    //         exit();
    //     }else{
    //         require_once("Views/userpage.php");
    //         exit;
    //     }
    // }

    if( isset($_POST['login']) ){
        // this array to store any error of login
        $errors = array();

        $username = $_POST['username'];
        $password = $_POST['password'];

        validate_empty("username", $errors);
        validate_empty("password", $errors);

        $login_try = new Login();
        if($username && $password){
            $data = $login_try->login_attempt($username, $password)[0];
            if($data){
                // foreach($data as $key=>$value){
                //         echo "<b>$key</b> : $value <br>";
                // }
                // print_r($data);
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

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css" />
    <script src="main.js"></script>

</head>

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
                    <div class="form-group form-check">         
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label"> Remember me </label>                   
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Submit</button>
                </form> 
                <a href="<?php echo $_SERVER['PHP_SELF']?>?signup"> Not register ? go to register page</a>
            </div>
        </div>

    </div>
    
</body>
</html>
