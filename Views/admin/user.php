<?php
    $connection = new MYSQLHandler();
    $connected = $connection->connect();
    if(!$connected){
        die("error in database connection");
    }
    // if(isset($_GET['user_id']) ){
        $user_id = $_GET['user_id'];
        //this check because if he tried to modify the user_id in the url to open the
        // admin info so i will restrict this 
        if($user_id == 1)
            header("Location: index.php");
        $user = $connection->get_record_by_id("id", $user_id)[0];
    // }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    this admin page
    <a href="<?php echo $_SERVER['PHP_SELF']?>"> back </a>
    <table border="2">
        <tr>
            <th>username</th>
            <th>name</th>
            <th>job</th>
        </tr>
        <?php 
        // print_r($user);
            echo "<tr>";
            echo "<td>". $user['username'] ."</td>";
            echo "<td>". $user['name'] ."</td>";
            echo "<td>". $user['job'] ."</td>";
            echo "</tr>";

        ?>
    </table>
    <a href="<?php echo $_SERVER['PHP_SELF']?>?logout"> Logout </a>
</body>
</html> 
