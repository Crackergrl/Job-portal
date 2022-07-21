<?php
session_start();
include('C:\wamp64\www\jobportal\admin\connection\db.php');
$query=mysqli_query($conn,"select * from admin_login where admin_login={$_SESSION['email']}");
while ($row=(mysqli_fetch_array($query)))
{
    $admin_type=$row['admin_type'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job For You -Understanding your HR needs better</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">JobPortal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <?php
                if(isset($_SESSION['email'])==true){
                    if($admin_type=='3'){
                        ?>
                        <li class="nav-item cta mr-md-2"><?php  echo $_SESSION['email'];?></li>
                <li class="nav-item cta cta-colored"><a href="admin/admin_login_logout/logout.php" class="btn btn-block btn-primary" style="color:whitesmoke;"> Log out</a></li>
                <?php
                    }else{?>
                    <li class="nav-item cta mr-md-2"><a href="admin/admin_login_logout/admin_dashboard.php"  style="color: #0b0b0b"> <?php  echo $_SESSION['email'];?></a></li>
                    <li class="nav-item cta cta-colored"><a href="admin/admin_login_logout/logout.php" class="btn btn-block btn-primary" style="color:whitesmoke;"> Log out</a></li>
                <?php }}else{?>
                    <li><a href="admin/admin_login_logout/post_job.php" class="btn btn-block btn-primary btn-lg" style="margin-right: 30%;color: whitesmoke">LOGIN</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
