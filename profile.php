<?php
$connection = mysql_connect("localhost", "root", ""); 
$db = mysql_select_db("tictactoed", $connection); // Selecting Database
//$details = $db->get_data(array(),$start =0);

session_start();
$user_id = $_SESSION["user_id"];

$query = mysql_query("select * from users where id='$user_id'", $connection);
while ($row = mysql_fetch_array($query)) {
$id =$row['id'];
$username =$row['username'];
$name =$row['name'];
$job =$row['job'];
$reg_date=$row['reg_date'];
$image =$row['image'];
$cv=$row['cv'];
echo$username;
echo "<br>";
echo $image;
}

 if(isset($_POST['edit']))
    {
     header("Location:Edit.php");
    }


?>

<?php
mysql_close($connection); // Closing Connection with Server
?>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>profile</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
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
								<li class="nav-item active"><a class="nav-link" href="Views/login.php">Log out</a></li> 
				
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
                                                    <form method="POST">
                                                   <input type="submit" value="Edit Profile" name="edit"></input>
                                                   </form>
                                                   <br></br>
						<?php echo "<td> <img height='500px'  src='images/$image' </img> </td>";?>
						</div>
						<div class="col-lg-7">
                                                    
							<div class="personal_text">
                                                            <?php echo "<h3>$name</h3>";?>
								<?php echo"<h4>$job</h4>";?>
								<p>You will begin to realise why this exercise is called the Dickens Pattern (with reference to the ghost showing Scrooge some different futures)</p>
								<ul class="list basic_info">
									<li><a href="#"><i class="lnr lnr-calendar-full"></i> 31st December, 1992</a></li>
									<li><a href="#"><i class="lnr lnr-phone-handset"></i> 44 (012) 6954 783</a></li>
									<li><a href="#"><i class="lnr lnr-envelope"></i> businessplan@donald</a></li>
									<li><a href="#"><i class="lnr lnr-home"></i> Santa monica bullevard</a></li>
								</ul>
							
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
                        echo "<iframe src='cvs/$cv' width=\"100%\" style=\"height:100%\"></iframe>";
                        ?>	
        			
        		</div>
        	</div>
        </section>

        

    </body>
</html>