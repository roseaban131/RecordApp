<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
<?php
    require('config/config.php');
    require('config/db.php');

//define the number of results you want per age\
$results_per_page = 14;
    
//find the total number of results/rows stored in database
$query = "SELECT * FROM office";
$result = mysqli_query($conn, $query);
$number_of_result = mysqli_num_rows($result);

//determine the total number of pages available 
$number_of_page = ceil($number_of_result / $results_per_page);

//determine which page number visitor is currently on
if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}

//determine the sql limit starting for the number of results on the display page 
$page_per_result = ($page-1) * $results_per_page;


    //create query
    $query = 'SELECT * FROM office ORDER BY name LIMIT '. $page_per_result . ',' . $results_per_page;

    //get the result
    $result = mysqli_query($conn, $query);

    //fetch the data
    $offices = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result
    mysqli_free_result($result);

    //Close the connection
    mysqli_close($conn);
?>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">

            <div class="sidebar-wrapper">
                <?php include('includes/sidebar.php'); ?>

            </div>
        </div>
        <div class="main-panel">
        <?php include('includes/navbar.php'); ?>
            
            <div class="content">
                <div class="container-fluid">
                    <div class="section">
                    </div>
                <div class = "row"> 
                <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <br/>
                                <div class="col-md-12"> 
                                <a href = "/office-add.php "> 
                                    <button type= "submit" class = "btn btn-info btn-fill pull-right">Add New Office</button>
                                </a>
                                </div>
                               
                                <div class="card-header ">
                                    <h4 class="card-title">Office</h4>
                                    <p class="card-category">Here is a subtitle for this table</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Postal</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($offices as $office):  ?>
                                           
                                            <tr>
                                                <td><?php echo $office ['name']; ?></td>
                                                <td><?php echo $office ['contactnum']; ?></td>
                                                <td><?php echo $office ['email']; ?></td>
                                                <td><?php echo $office ['address']; ?></td>
                                                <td><?php echo $office ['city']; ?></td>
                                                <td><?php echo $office ['country']; ?></td>
                                                <td><?php echo $office ['postal']; ?></td>
                                            </tr>
                                            <tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div> 

                </div>
                <?php
                        for($page=1; $page <= $number_of_page; $page++){
                            echo '<a href = "office.php?page='. $page.'">' . $page . '</a>';
                        }
                        ?>
            </div>
           
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
