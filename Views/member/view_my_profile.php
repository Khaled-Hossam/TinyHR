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
$name = $user['name'];
$job = $user['job'];
$last_visit = $user['last_visit'];
$image = $user['image'];
$cv = $user['cv'];

$connection->disconnect(); // Closing Connection with Server
?>



<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>profile</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        
        <!-- main css -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>       
         <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item active"><a class="nav-link text-dark" href="<?php echo $_SERVER['PHP_SELF'] ?>?logout"> Logout </a></li> 
                                <li class="nav-item active"><a class="nav-link text-dark"href="<?php echo $_SERVER['PHP_SELF'] ?>?edit"> edit </a></li> 
				
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
         
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="profile_area">
           	<div class="container">
           		<div class="profile_inner p_120">
					<div class="row">
						<div class="col-lg-5">
                                
						<?php echo "<td> <img height='300px'  src='uploads/$image' </img> </td>"; ?>
						</div>
						<div class="col-lg-7">
                                                    
							<div class="personal_text">
                                                            <?php echo "<h3>$name</h3>"; ?>
								<?php echo "<h4>$job</h4>"; ?>
								
							
							</div>
						</div>
					</div>
           		</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        		<?php
            echo "<iframe src='uploads/$cv' width=\"100%\" style=\"height:500px\"></iframe>";
            ?>	
        			
        		</div>
        	</div>
        </section>

        

    </body>
</html>




<!-- <!DOCTYPE html>
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
    this user page
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>?edit"> edit </a>
    <table border="2">
        <tr>
            <th>username</th>
            <th>name</th>
            <th>job</th>
        </tr>
        <?php 
        // print_r($user);
        echo "<tr>";
        echo "<td>" . $user['username'] . "</td>";
        echo "<td>" . $user['name'] . "</td>";
        echo "<td>" . $user['job'] . "</td>";
        echo "</tr>";

        ?>
    </table>
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>?logout"> Logout </a>
</body>
</html>  -->
