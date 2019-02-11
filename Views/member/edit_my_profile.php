<?php

$connection = new MYSQLHandler("users");
$connected = $connection->connect();
if (!$connected) {
    die("error in database connection");
}


$user_id = $_SESSION['user_id'];
$user = $connection->get_record_by_id("id", $user_id);

$id = $user['id'];
$username = $user['username'];
$oldpassword = $user['password'];
$name = $user['name'];
$job = $user['job'];
$last_visit = $user['last_visit'];
$oldimage = $user['image'];
$oldcv = $user['cv'];

$connection->disconnect(); // Closing Connection with Server






if( isset($_POST['apply']) ){
    // this array to store any error of edit
    $errors = array();
    $id = $_SESSION['user_id'];
    $username = $_POST['username'];
    if(isset($_POST['password']) && !empty(trim($_POST['password'])) ){
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
    }  
    $name = $_POST['name'];
    $job = $_POST['job'];

    // if(!$username)
    //     $errors[] = "username is required";
    Validator::validate_empty("username", $errors);
    if(isset($password)){
        Validator::validate_empty("password", $errors);
        Validator::validate_empty("re_password", $errors);
    }
    
    Validator::validate_empty("name", $errors);
    Validator::validate_empty("job", $errors);
    
    if(isset($_FILES['image']) && !empty($_FILES['image']['name']) ){
        //send errors array as a paramter to add errors in it (pass by referenece)
        Validator::validate_file("image", $errors, "image/jpeg");
    }
    if(isset($_FILES['cv']) && !empty($_FILES['cv']['name']) ){
        Validator::validate_file("cv" ,$errors, "application/pdf");
    }

    if(isset($password)){
        if($password !== $re_password)
        $errors[] = "the password doesn't match";
        if( strlen($password) < MIN_PASS_LEN || strlen($password) > MAX_PASS_LEN )
        $errors[] = "password should between 8 and 16 characters";
    }
    

    $edit = new Registration();
    $unique_username = $edit->is_unique($username, true, $id);

    if(!$unique_username){
        $errors[] = "this username is exit please chose another one";
    }

    if(empty($errors)){
        if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']) )
            $image_name = Helper::upload("image");
        else
            $image_name = $oldimage;
        if(isset($_FILES['cv']) && is_uploaded_file($_FILES['cv']['tmp_name']) )
            $cv_name    = Helper::upload("cv");
        else
            $cv_name = $oldcv;
        if(empty(trim($_POST['password'])) )
            $password = $oldpassword;
        else
            $password = password_hash($password, PASSWORD_BCRYPT);
        //if there is not errors add this record to DB
            $result = $edit->update($id, $username, $password, $name, $job, $image_name, $cv_name);
        header('Location: index.php');             
    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tiny HR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css" />
    <!-- for view_my_profile & (user) page -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- for signup page -->
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
    <!-- for edit_my_profile page -->
    <link rel="stylesheet" href="assets/css/profile-edit.css" rel="stylesheet">


</head>

<body >

    

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?edit" method="post" class ="form_1" enctype="multipart/form-data">
    <?php
    if(!empty($errors)){
        echo "<ul class='alert alert-danger'>";
        foreach ($errors as  $value) {
            echo "<li>$value </li>";
        }
        echo "</ul>";
    }
    ?>
  <div class="container">
    <h1 style=" color:#00008B ">Edit you Profile</h1>
    <hr>

    <label for="uaername"><b>UserName</b></label>
    <input type="text" value="<?php echo isset($username)?$username : '' ?>" name="username" required style="margin-left:152px">
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password"  value="<?php //echo isset($password)?$password : '' ?>" name="password"  style="margin-left:160px" >
    <br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" value="<?php //echo isset($password)?$password : '' ?>" name="re_password"  style="margin-left:83px">
    <br>
    <label for="email"><b>Name</b></label>
    <input type="text" value="<?php echo isset($name)?$name : '' ?>" name="name" required style="margin-left:199px">
    <br>
    <label for="job"><b>Job</b></label>
    <input type="text" value="<?php echo isset($job)?$job : '' ?>" name="job" required style="margin-left:221px">
     
     <input name="MAX_FILE_SIZE" value="1048576" type="hidden"/>
                <div class="form-group">
                    <label for="image">Your Image </label>
                    <input type="file"  name="image" style="width:90px"  style="color:black" class="form-control-file" id="image" >
                    <label id="fileLabel"><?php echo "$oldimage";?></label>
                </div>
       <hr>
                <div class="form-group">
                    <label for="cv">Your Cv </label>
                    <input type="file" name="cv" style="width:90px" class="form-control-file" id="cv">
                    <label id="fileLabel"><?php echo "$oldcv";?></label>
                </div>
    <hr>

    <button type="submit" class="registerbtn" name="apply">Apply</button>
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>" > back </a>
  </div>
  

</form>

</body>
</html>