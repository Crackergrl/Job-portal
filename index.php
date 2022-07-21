<?php
session_start();
include('C:\wamp64\www\jobportal\admin\connection\db.php');
$query=mysqli_query($conn,"select * from job_category");
$sql=mysqli_query($conn,"SELECT * FROM all_jobs LEFT JOIN company ON all_jobs.customer_email=company.admin_email order by closing_date limit 10");


?>
<!doctype html>
<html lang="en" >
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png" type="">
<title>Job For YOu- Understanding your HR needs better</title>

    <!--Font Awesome-->
    <link rel="stylesheet" href="include/font-awesome-4.7.0/css/font-awesome.css">

<link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">

    <link href="css/index_style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
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
                <li><a href="contact.php">Contact</a></li>
                <li><a href="privacy.php" >Privacy Policy</a></li>
                <li><a href="terms.php" class="nav-link">Terms Of Services</a></li>
                <?php
                if(isset($_SESSION['email'])==true){
                    $qry=mysqli_query($conn,"select * from admin_login where admin_email='{$_SESSION['email']}'");
                    while($row=mysqli_fetch_array($qry)){
                        if($row['admin_type']=='3')
                        {?>
                            <li class="nav-item cta mr-md-2"><?php  echo $_SESSION['email'];?></li>
                        <?php
                        }
                        else{?>
                <li class="nav-item cta mr-md-2"><a href="admin/admin_login_logout/admin_dashboard.php"  style="color: #0b0b0b"> <?php  echo $_SESSION['email'];?></a></li>
                    <?php }
                    }?>

                    <li>
                        <div class="dropdown">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReiyHYtDJQ0t5jCs4j_PiD5ESMvPwnvHVa3w&usqp=CAU" style="height:40px;width: 40px;" class="navbar-link dropdown-toggle" data-toggle="dropdown">
                            <ul class="dropdown-menu">
                                <li><a href="admin/admin_login_logout/logout.php" class="btn btn-block btn-success" style="margin-top:10%;color: whitesmoke">LOGOUT</a></li>
                                <li><a href="profile.php" class="btn btn-block btn-primary" style="margin-top: 10%;color: whitesmoke">My Profile</a></li>

                            </ul>
                        </div>
                    </li>
                <?php }else{?>
                <li><a href="admin/admin_login_logout/post_job.php" class="btn btn-block btn-primary" style="margin-right: 30%;color: whitesmoke">LOGIN</a></li>
                <li><a href="register/register.php" class="btn btn-block btn-success" style="margin-right: 30%;color: whitesmoke">REGISTER</a></li>
            <?php } ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Modal -->

<div class="container-fluid">
    <div class="row">
        <div class="hero" style="background-image: url(img/bg-2.png); background-repeat: no-repeat; background-size: cover; background-attachment:fixed;">

            <div style="width: 100%" class="row" >
                <div class="col-md-6"  >

                    <img id="Logo" src="img/logo.png" alt="logo" class="img-responsive" style="width: 50%; margin-top: 40%; margin-left:20%;">


                </div>
                <div style=" height: 100vh; " class="col-md-6">
                <?php
                if(isset($_SESSION['email'])==true)
                {

                    $qry=mysqli_query($conn,"Select * from admin_login where admin_email='{$_SESSION['email']}'");

                    while($row=mysqli_fetch_array($qry)){
                        $admin_t=$row['admin_type'];
                        if($admin_t=='1'){ ?>


                            <div id="btn3" style=" margin-left:5%;margin-top: 10%"class="tiltContain "  >
                                <div class="contact100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(400px) rotateX(0deg) rotateY(0deg);">
                                    <div class="upload-btn-wrapper" >

                                        <form method="get" action="search.php"><input type="hidden" name="navSend" id="navSend" value="IEEE Project">
                                            <button  type=submit id="upBtn1" class=" textDarkShadow btnUp btnTilt fade-in three" >Find a Job</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div  id="btn4"style="margin-left: 25%; " class="tiltContain "  >
                                <div class="contact100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(400px) rotateX(0deg) rotateY(0deg);">
                                    <div  class="upload-btn-wrapper" >
                                        <form method="get" style=" font-family: Comfortaa;"  action="admin/jobs/job_create.php"><input type="hidden" name="navSend" id="navSend" value="PHP Project">
                                            <button id="upBtn1" class="textDarkShadow btnUp btnTilt fade-in four"  > Post A Job</button>
                                        </form>
                                    </div></div>
                            </div>-

                <?php

                        }elseif ($admin_t=='2'){
                            ?>
                            <div  id="btn4"style="margin-left: 25%;margin-top: 15% " class="tiltContain "  >
                                <div class="contact100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(400px) rotateX(0deg) rotateY(0deg);">
                                    <div  class="upload-btn-wrapper" >
                                        <form method="get" style=" font-family: Comfortaa;"  action="admin/jobs/job_create.php"><input type="hidden" name="navSend" id="navSend" value="PHP Project">
                                            <button id="upBtn1" class="textDarkShadow btnUp btnTilt fade-in four"  > Post A Job</button>
                                        </form>
                                    </div></div>
                            </div>-
                    <?php
                        }else{?>
                            <div id="btn3" style=" margin-left:5%;margin-top: 10%"class="tiltContain "  >
                                <div class="contact100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(400px) rotateX(0deg) rotateY(0deg);">
                                    <div class="upload-btn-wrapper" >

                                        <form method="get" action="search.php"><input type="hidden" name="navSend" id="navSend" value="IEEE Project">
                                            <button  type=submit id="upBtn1" class=" textDarkShadow btnUp btnTilt fade-in three" >Find a Job</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }else{
                    ?>

                    <div id="btn3" style=" margin-left:5%;margin-top: 10%"class="tiltContain "  >
                        <div class="contact100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(400px) rotateX(0deg) rotateY(0deg);">
                            <div class="upload-btn-wrapper" >

                                <form method="get" action="search.php"><input type="hidden" name="navSend" id="navSend" value="IEEE Project">
                                    <button  type=submit id="upBtn1" class=" textDarkShadow btnUp btnTilt fade-in three" >Find a Job</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div  id="btn4"style="margin-left: 25%; " class="tiltContain "  >
                        <div class="contact100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(400px) rotateX(0deg) rotateY(0deg);">
                            <div  class="upload-btn-wrapper" >
                                <form method="get" style=" font-family: Comfortaa;"  action="admin/jobs/job_create.php"><input type="hidden" name="navSend" id="navSend" value="PHP Project">
                                    <button id="upBtn1" class="textDarkShadow btnUp btnTilt fade-in four"  > Post A Job</button>
                                </form>
                            </div></div>
                    </div>-

                    <?php
                }
                ?>




                    <div id="btn5" style=" margin-left:5%;"class="tiltContain "  >
                        <div class="contact100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(400px) rotateX(0deg) rotateY(0deg);">
                            <div class="upload-btn-wrapper" >
                                <form action="blog.php" method=get>
                                    <input type='hidden' name="navSend" value="Mini-Dbms" />
                                    <button type='submit' id="upBtn1" class="textDarkShadow btnUp btnTilt fade-in five" style="  " >Our Blogs</button>
                                </form>
                            </div></div>

                    </div>



                    <div id="btn6" class="tiltContain " style=" margin-left:25%;" >
                        <div class="contact100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(400px) rotateX(0deg) rotateY(0deg);">
                            <div  class="upload-btn-wrapper" >
                                <form method="get" style=" font-family: Comfortaa;"  action=""><input type="hidden" name="navSend" id="navSend" value="Computer Graphics Mini Project">
                                    <a href="about.php">
                                        <button id="upBtn1" class="textDarkShadow btnUp btnTilt fade-in six" style="  " >WHY US?</button></a>

                                </form>
                            </div></div>
                    </div>
                    <div>
                        <h3 style="color: whitesmoke;font-weight: bolder"> <?php echo mysqli_error($conn);?></h3>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<div class="container-fluid" style="background-image: url(img/pattern.png); background-repeat: no-repeat; background-size: cover; background-attachment:fixed;">

    <div id="recent jobs" class="container" style="background-image: url(img/bg_1.png); background-repeat: no-repeat; margin: 50px; background-size:cover">
        <div style="padding: 30px; margin: 30px; ">

            <h1 style="padding: 20px; font-family: Comfortaa; text-align: center;">
                <strong>RECENT JOBS FOR YOU</strong>
            </h1>

        </div>
        <?php while($res=mysqli_fetch_array($sql)) {?>
            <div id="aboutUs" class="aboutContainer card text-center m-auto shadow-lg" style="transform-style: preserve-3d;background-image: url(img/card2.png);height: 236px;width: 410px;margin:20px" data-tilt >
                <div class="">
                    <h2 style="color: whitesmoke"><?php echo $res['job_title'];?></h2>
                    <h5 style="color: whitesmoke"><?php echo $res['company_name'];?></h5>
                    <!--                <h5 style="color: whitesmoke">--><?php //echo $res['qualification'];?><!--</h5>-->
                    <h5 style="color: whitesmoke"><?php echo $res['designation'];?></h5>
                    <h5 style="color: whitesmoke"><?php echo $res['salary'];?></h5>
                    <a href="job-single.php?hell=<?php echo $res['Id'];?>" class="btn btn-primary py-2 mr-1">Apply Job</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

 <div class="container-fluid" style="background-image: url(img/pattern.png); background-repeat: no-repeat; background-size: cover; background-attachment:fixed;">

    <div id="aboutUs" class="container" style="background-image: url(img/bg_1.png); background-repeat: no-repeat; background-size: cover; margin: 50px;">
        <div style="padding: 30px; margin: 30px; ">

            <h1 style="padding: 20px; font-family: Comfortaa; border-left: 1px solid #1f1f1f;">
                <strong>Why Choose Us?</strong>
            </h1>

        </div>

        <div class="aboutContainer" style="text-align: justify; word-break: normal; ">
            <p style="font-size:18px;">

                We are a team of IT professionals, working hard to make great projects which can help you better understand the technology's in use.


            </p>
            <p style="font-size:18px;">

                Projects developed by us are 100% tested and you can feel free to contact us, if you run into any issues.

            </p>
        </div>


    </div>
</div>

<footer id="contactus" style="background-color: #1f1f1f;"  >


    <div class="container row" style="width:100%">
        <div class="col-md-4 col-md-offset-2">

            <p style="color: aqua" class="footer-links">
                <a style="color: aqua" href="index.php">Home</a>
            </p>
            <h3 style="color: aqua"><a href="http://www.audenberg.com"> Powered by <h3 style="font-family:audiowide;display:inline">AudenBerg</h3> Technologies</a></h3>

            <p style="color: aqua" class="footer-company-name">AudenBerg Technologies is a software company located in India.</p><br><a href="terms.php">Terms and Conditions</a><br>
            <a href="privacy.php">Privacy Policy</a>  ||

        </div>


        <div class="col-md-3 col-md-offset-3">
            <div id="contact" class="container-fluid bg-grey">
                <h2 class="text-center " style="font-family:Comfortaa,serif;color:aqua">CONTACT US</h2>

                <br>
                <div >
                    <p>Contact us and we'll get back to you within 24 hours.</p>

                    <p><span class="glyphicon glyphicon-envelope"></span> info@audenberg.com</p>
                </div>


            </div>
        </div>

    </div>




</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/tilt.jquery.min.js"></script>




</body>
</html>
