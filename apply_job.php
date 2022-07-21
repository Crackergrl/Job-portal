<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Apply Job</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png" type="">
    <title>Job For YOu- Understanding your HR needs better</title>

    <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">

    <link href="css/index_style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    h1{
        font-family: 'Lucida Handwriting', serif;font-weight: bolder;color: whitesmoke;text-align: center;
    }
</style>
<body>
<nav class="navbar navbar-default navbar-fixed-top" style="box-shadow: 0px 3px 4px rgba(0, 0, 0, .6);">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.php" style="padding-left: 50px; margin-top: -16px;">
                <img src="img/rmlogo.png" alt="logo" class="img-responsive" width="20%" height="20%">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="defaultNavbar1" >
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php" >Home</a></li>
                <li><a href="about.php" class="nav-link">About</a></li>
                <li><a href="blog.php" class="nav-link">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                if(isset($_SESSION['email'])==true){
                    ?>
                    <li class="nav-item cta mr-md-2"><a href="admin/admin_login_logout/admin_dashboard.php"  style="color: #0b0b0b"> <?php  echo $_SESSION['email'];?></a></li>
                    <li class="nav-item cta cta-colored"><a href="admin/admin_login_logout/logout.php" class="btn btn-block btn-primary" style="color:whitesmoke;"> Log out</a></li>
                <?php }else{?>
                    <li><a href="admin/admin_login_logout/post_job.php" class="btn btn-block btn-primary" style="margin-right: 30%;color: whitesmoke">LOGIN</a></li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="hero" style="background-image: url(img/card.png); background-repeat: no-repeat; background-size: cover; background-attachment:fixed;">
   <div style="width: 100%" class="row" >

                <div style=" height: 100vh;" class="col-md-6">
                <?php
                include('C:\wamp64\www\jobportal\admin\connection\db.php');
                if(isset($_POST['submit'])) {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $dob = $_POST['dob'];
                    $experience = $_POST['experience'];
                    $special_skills = $_POST['special_skills'];
                    $achievements = $_POST['achievements'];

                    $id = $_POST['job_id'];
                    $job_seeker = $_POST['job_seeker'];
                    $target_dir = "files/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    $uploadOk = 1;
                    $Filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $qry=mysqli_query($conn,"Select * from apply where job_seeker='$job_seeker' and job_id='$id'");
                    if(mysqli_num_rows($qry)>0){
                        echo "<script>alert('you have already applied for the job')</script>";
                        echo "<script>setTimeout(\"location.href='index.php';\",1500);</script>";

                    }else{


                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                        $sql = "insert into apply(fname,lname,dob,file,job_id,job_seeker,experience,special_skills,achievements) values('$fname','$lname','$dob','$target_file','$id','$job_seeker','$experience','$special_skills','$achievements')";
                        $query = mysqli_query($conn, $sql);
                        if($query){?>
                            <div class="col-lg-offset-4" style="margin-top:30%;">
                            <h1><?php echo "Record inserted successfully"; ?></h1>
                            <?php
                        }else {
                            ?>
                            <h1><?php echo "Record not inserted";?></h1>
                            </div>

                            <?php
                        }
                    }
                        }
                        ?>
                        <div class="col-md-12 col-lg-offset-4">
<!--                            <button value="Go Back" href="index.php" class="btn-primary btn btn-block btnTilt"><strong>Go BACK</strong></button>-->
                            <a href="http://localhost/jobportal/index.php" class="btn btn-block btn-primary btnTilt"> <strong>Go to HOme Page</strong> </a>
                        </div>
                </div>

</div>
    </div>

</div>
 </div>
</body>
</html>
