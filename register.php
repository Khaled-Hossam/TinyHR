<?php 

    if(isset($_POST['register']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
        $name = $_POST['name'];
        $job = $_POST['job'];
        
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp,"images/$image");
        
        $cv = $_FILES['cv']['name'];
        $cv_tmp = $_FILES['cv']['tmp_name'];
        move_uploaded_file($cv_tmp,"cvs/$cv");
        
        $con = mysqli_connect("localhost","root","","tictactoed");
        $query = "insert into users (username,password,name,job,image,cv) values ('$username','$password','$name','$job','$image','$cv')";
        $result = mysqli_query($con, $query);
        if($result==1)
        {
            session_start();
        echo "Inserted successfully";
            $id =$con->insert_id;
            $_SESSION['user_id']=$id;
            echo  $_SESSION['user_id'];
            header("Location:views/profile.php");
        }
        else {       
        echo "Insertion Failed";
             }   
       
      
    }
  /* $con = mysqli_connect("localhost","root","","tictactoed");
   $query1 = "select id from users where userename=$username";
        $result = mysqli_query($con, $query1);
        echo$result;*/
?>
<?php
 
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6Ld-JZAUAAAAABrTF13f7iX4s6h972mQ09YH_gvG';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
            $succMsg = 'Your contact request have submitted successfully.';
        }
        else
        {
            $errMsg = 'Robot verification failed, please try again.';
        }
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
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>

</head>

<body>
    <div class="containter">
        <div class="row">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="offset-4 col-md-4 mt-5" enctype="multipart/form-data">
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
                <div class="g-recaptcha" data-sitekey="6Ld-JZAUAAAAAIVi0aSme1uF5nOvwboDUbIbI7cg"></div>
                <button type="submit" name="register" class="btn btn-primary">Submit</button>
       
            </form> 
        </div>
        

    </div>
    
</body>
</html>