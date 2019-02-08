<?php

$connection = new MYSQLHandler();
$connected = $connection->connect();
if (!$connected) {
    die("error in database connection");
}

// if(isset($_POST['apply']))
// {
//         $username =$_POST['username'];
//         $name =$_POST['name'];
//         $job =$_POST['job'];
//         $image =$_POST['image'];
//         $cv=$_POST['cv'];
//         $password =$_POST['password'];
// //--------------------------UPDATE DATA-----------------------------------------------------------  
   
//         $sql = "UPDATE users SET username='$username',password='$password',name='$name',job='$job',image='$image',cv='$cv' WHERE id='$user_id'"; 
//         mysql_select_db('tictactoed');
//         $retval = mysql_query( $sql, $connection );
        
//         $query_1 = mysql_query("select * from users where id='$user_id'", $connection);
//             while ($row_1 = mysql_fetch_array($query_1)) {
//             $username =$row_1['username'];
//             }
//             echo $username;

        
// //-------------------------------------------------------------------------------------------------            
// }


$user_id = $_SESSION['user_id'];
$user = $connection->get_record_by_id("id", $user_id)[0];

$id = $user['id'];
$username = $user['username'];
$oldpassword = $user['password'];
$name = $user['name'];
$job = $user['job'];
$reg_date = $user['reg_date'];
$oldimage = $user['image'];
$oldcv = $user['cv'];



/* if(isset($_POST['ok']))
    {
     header("Location:profile.php");
    }*/

$connection->disconnect(); // Closing Connection with Server






if( isset($_POST['apply']) ){
    // this array to store any error of registertion
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
    validate_empty("username", $errors);
    if(isset($password)){
        validate_empty("password", $errors);
        validate_empty("re_password", $errors);
    }
    
    validate_empty("name", $errors);
    validate_empty("job", $errors);
    
    if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']) ){
        //send errors array as a paramter to add errors in it (pass by referenece)
        validate_file("image", $errors);
    }
    if(isset($_FILES['cv']) && is_uploaded_file($_FILES['image']['tmp_name']) ){
        validate_file("cv" ,$errors);
    }

    if(isset($password)){
        if($password !== $re_password)
        $errors[] = "the password doesn't match";
        if( strlen($password) < 8 || strlen($password) > 16 )
        $errors[] = "password should between 8 and 16 characters";
    }
    

    $register = new Register();
    $unique_username = $register->is_unique($username, true, $id);

    if(!$unique_username){
        $errors[] = "this username is exit please chose another one";
    }

    if(empty($errors)){
        if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']) )
            $image_name = upload("image");
        else
            $image_name = $oldimage;
        if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']) )
            $cv_name    = upload("cv");
        else
            $cv_name = $oldcv;
        if(empty(trim($_POST['password'])) )
            $password = $oldpassword;
        //if there is not errors add this record to DB
            $result = $register->update($id, $username, $password, $name, $job, $image_name, $cv_name);
        // header('Location: index.php');             
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
 font-family: Georgia, serif;
   align-content:center; 
   font-size: 20px;
}

label{
    color:#00008B;
   
}
 .form_1 {
      width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
  margin-left:5px;
      align:center;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
 
  
  
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;

 
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #00008B  ;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #00008B;
  text-align: center;
  
}
</style>
</head>
<body >

    <?php
    if(!empty($errors)){
        echo "<ul class='alert alert-danger'>";
        foreach ($errors as  $value) {
            echo "<li>$value </li>";
        }
        echo "</ul>";
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?edit" method="post" class ="form_1" enctype="multipart/form-data">
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
    <button type="submit" class="registerbtn" name="ok">OK</button>
  </div>
  

</form>

</body>
</html>