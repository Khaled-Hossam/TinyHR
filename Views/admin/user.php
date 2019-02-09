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

    $id = $user['id'];
    $username = $user['username'];
    $name = $user['name'];
    $job = $user['job'];
    $reg_date = $user['reg_date'];
    $image = $user['image'];
    $cv = $user['cv'];
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
                                <li class="nav-item active"><a class="nav-link text-dark"href="<?php echo $_SERVER['PHP_SELF']?>"> back </a></li> 

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
