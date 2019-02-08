<?php
$connection = mysql_connect("localhost", "root", ""); 
$db = mysql_select_db("tictactoed", $connection); // Selecting Database

session_start();
$user_id = $_SESSION["user_id"];
echo$user_id ;

$query = mysql_query("select * from users where id='$user_id'", $connection);
while ($row = mysql_fetch_array($query)) {
$id =$row['id'];
$username =$row['username'];
$name =$row['name'];
$job =$row['job'];
$reg_date=$row['reg_date'];
$image =$row['image'];
$cv=$row['cv'];
$password =$row['password'];
 echo $username;
 echo"<br>";
}

if(isset($_POST['apply']))
    {
            $username =$_POST['username'];
            echo $username;
            echo"<br>";
            $name =$_POST['name'];
            $job =$_POST['job'];
            $image =$_POST['image'];
            $cv=$_POST['cv'];
            $password =$_POST['password'];
//--------------------------UPDATE DATA-----------------------------------------------------------  
       
            $sql = "UPDATE users SET username='$username',password='$password',name='$name',job='$job',image='$image',cv='$cv' WHERE id='$user_id'"; 
            mysql_select_db('tictactoed');
            $retval = mysql_query( $sql, $connection );
            
            $query_1 = mysql_query("select * from users where id='$user_id'", $connection);
                while ($row_1 = mysql_fetch_array($query_1)) {
                $username =$row_1['username'];
                }
                echo $username;

            
//-------------------------------------------------------------------------------------------------            
    }
/* if(isset($_POST['ok']))
    {
     header("Location:profile.php");
    }*/
?>

<?php
mysql_close($connection); // Closing Connection with Server
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

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class ="form_1">
  <div class="container">
    <h1 style=" color:#00008B ">Edit you Profile</h1>
    <hr>

    <label for="uaername"><b>UserName</b></label>
    <input type="text" value="<?php echo isset($username)?$username : '' ?>" name="username" required style="margin-left:152px">
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password"  value="<?php echo isset($password)?$password : '' ?>" name="password"  required style="margin-left:160px" >
    <br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" value="<?php echo isset($password)?$password : '' ?>" name="psw-repeat" required  style="margin-left:83px">
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
                    <label id="fileLabel"><?php echo "$image";?></label>
                </div>
       <hr>
                <div class="form-group">
                    <label for="cv">Your Cv </label>
                    <input type="file" name="cv" style="width:90px" class="form-control-file" id="cv">
                    <label id="fileLabel"><?php echo "$cv";?></label>
                </div>
    <hr>

    <button type="submit" class="registerbtn" name="apply">Apply</button>
    <button type="submit" class="registerbtn" name="ok">OK</button>
  </div>
  

</form>

</body>
</html>
