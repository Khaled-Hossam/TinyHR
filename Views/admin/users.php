<?php
    $connection = new MYSQLHandler("users");
    $connected = $connection->connect();
    if(!$connected){
        die("error in database connection");
        header("Location: index.php");
    }

    if( isset($_GET['excel']) ){
        $connection->excel();
        exit();

    }

    //pagination
    $current_index = isset($_GET['current']) ? (int)$_GET['current'] : 1;
    $count = $connection->get_count();
    if($current_index >= $count || $current_index < 1)
        $current_index = 1;
    // exit();
    $next_value = ($current_index + __RECORDS_PER_PAGE__ ) < $count ?
     ($current_index + __RECORDS_PER_PAGE__ ) : $current_index ;
    $next = $_SERVER['PHP_SELF'] . "?current= ". $next_value;

    $previews_value = ($current_index - __RECORDS_PER_PAGE__ ) >1 ? ($current_index - __RECORDS_PER_PAGE__ ) :1 ;
    $previews = $_SERVER['PHP_SELF'] . "?current= ". $previews_value;

    $users = $connection->get_data(array("id", "username", "name", "job", "status"), $current_index);

    
    include_once('Views/components/head.php');
?>


<body>
    <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="assets/images/user-logo-png-3.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Admin Panel
    </a>
    <a href="<?php echo $_SERVER['PHP_SELF']?>?excel" class="btn btn-outline-success my-2 my-sm-0">Excprt in excel</a>
    <a href="<?php echo $_SERVER['PHP_SELF']?>?logout" class="btn btn-outline-success my-2 my-sm-0">Logout</a>
    </nav>
    <div class="container">
        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>name</th>
                    <th>job</th>
                    <th>status</th>
                    <th>view more</th>
                </tr>
            </thead>
                <?php 
                // print_r($users);
                foreach ($users as $user) {
                    //this cuz i dont display admin in the users table
                    if($user['id'] == 1)
                        continue;
                    echo "<tr>";
                    echo "<td>". $user['id'] ."</td>";
                    echo "<td>". $user['username'] ."</td>";
                    echo "<td>". $user['name'] ."</td>";
                    echo "<td>". $user['job'] ."</td>";
                    if($user['status']){
                        echo "<td class='text-success'>";
                        echo "online" ;
                    }
                        
                    else{
                        echo "<td class='text-danger'>";
                        echo "offline";
                    }

                     "</td>";
                    echo "<td> <a href='". $_SERVER['PHP_SELF'] . "?user_id= ".$user['id'] . "'> view more</a> </td>";
                    echo "</tr>";
                }

                ?>
        </table>
        <!-- <a href="<?php echo $_SERVER['PHP_SELF']?>?logout"> Logout </a> -->
        
        <!-- <td> <a href="<?php echo $previews ?>" > previews</a>
        <td> <a href="<?php echo $next ?>"> next</a> -->

        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item">
            <a href="<?php echo $previews ?>" class="page-link" >Previous</a></li>

            <li class="page-item" >
            <a href="<?php echo $next ?>" class="page-link" >Next</a></li>
        </ul>
        </nav>

    </div>
</body>
</html> 
