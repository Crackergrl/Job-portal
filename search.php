<?php
session_start();
global $keyword,$category,$city;
include('C:\wamp64\www\jobportal\admin\connection\db.php');
$query=mysqli_query($conn,"select * from job_category");
$sql=mysqli_query($conn,"Select * from all_jobs");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job For You -Understanding your HR needs better</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

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
                    ?>
                    <li class="nav-item cta mr-md-2"><a href="admin/admin_login_logout/post_job.php"  style="color: #0b0b0b"> <?php  echo $_SESSION['email'];?></a></li>
                    <li class="nav-item cta cta-colored"><a href="admin/admin_login_logout/logout.php" class="btn btn-block btn-primary" style="color:whitesmoke;"> Log out</a></li>
                <?php }else{?>
                    <li><a href="admin/admin_login_logout/post_job.php" class="btn btn-block btn-primary btn-lg" style="margin-right: 30%;color: whitesmoke">LOGIN</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<div class="hero-wrap js-fullheight" style="background-image: url('img/hello.png');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
                <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span class="number" data-number="850000">0</span> great job offers you deserve!</p>
                <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Job is Waiting</span></h1>

                <div class="ftco-search">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap">
                            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active mr-md-1" id="find_job" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>

                                <a class="nav-link" id="find_candidate" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Find a Candidate</a>

                            </div>
                        </div>
                        <div class="col-md-12 tab-wrap">
                            <div class="tab-content p-4" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                    <form action="" method="post" name="search" id="search" class="search-job">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="icon"><span class="icon-briefcase"></span></div>
                                                        <input type="text" class="form-control" name="key"  id="key" placeholder="eg. Graphics. Web Developer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                            <select name="category" id="category" class="form-control">

                                                                <?php while($row=mysqli_fetch_array($query)){?>
                                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['category'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                            <select name="city" id="city" class="form-control">
                                                                <option value="city">Select City</option>

                                                                <?php while($row1=mysqli_fetch_array($sql)){?>
                                                                    <option value="<?php echo $row1['Id'];?>"><?php echo $row1['City'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <input type="submit" value="Search" name="search" id="search" class="form-control btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                                    <form action="#" class="search-job">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="icon"><span class="icon-user"></span></div>
                                                        <input type="text" class="form-control" name="key" id="key" placeholder="eg. Adam Scott">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                            <select name="category" id="category" class="form-control">
                                                                <option value="">Category</option><?php while($row=mysqli_fetch_array($query)){?>
                                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['category'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <input type="submit" id="search" name="search" value="Search" class="form-control btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("C:\wamp64\www\jobportal\admin\connection\db.php");
if(isset($_POST['search']) or ($_GET['page'])){
    $page = mysqli_real_escape_string($_GET['page']);
    if($page=="" || $page==1){
        $page1=0;
    }else{
        $page1=($page*3)-3;
    }

    $keyword=$_POST['key'];
    $category=$_POST['category'];
    $city=$_POST['city'];
    $query=mysqli_query($conn,"SELECT * FROM all_jobs LEFT JOIN company ON all_jobs.customer_email=company.admin_email where keyword like '%$keyword%' OR category = '$category' or City='$city' limit $page1,3");

}
?>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Recently Added Jobs</span>
                <h2 class="mb-4"><span>Recent</span> Jobs</h2>
            </div>
        </div>
        <div class="row">
            <div id="id_all_jobs">
                <?php while($row=mysqli_fetch_array($query)){?>
                    <div class="col-md-12 ftco-animate">
                        <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                            <div class="mb-4 mb-md-0 mr-5">
                                <div class="job-post-item-header d-flex align-items-center">
                                    <h2 class="mr-3 text-black h3"><?php echo $row['job_title']; ?></h2>
                                    <div class="badge-wrap">
                                        <span class="bg-primary text-white badge py-2 px-3"><?php echo $row['City']; ?></span>
                                    </div>
                                </div>
                                <div class="job-post-item-body d-block d-md-flex">
                                    <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo $row['company_name']; ?></a></div>
                                    <div><span class="icon-my_location"></span> <span><?php echo $row['country']; ?></span><span><?php echo "   "?></span><span><?php echo $row['States']; ?>
                                              </span><span><?php echo $row['City']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto d-flex">
                                <a href="job-single.php?hell=<?php echo $row['Id'];?>" class="btn btn-primary py-2 mr-1">Apply Job</a>
                                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                                    <span class="icon-heart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                <?php  } ?>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt</a></li>
                            <?php
                            $count_qry=mysqli_query($conn,"SELECT * FROM all_jobs LEFT JOIN company ON all_jobs.customer_email=company.admin_email where keyword like '%$keyword%' OR category = '$category' or City='$city'");
                            $count=mysqli_num_rows($count_qry);
                            $a=$count/3;
                            ceil($a);
                            for($b=1;$b<=$a;$b++){
                            ?>
                            <li><a href="search.php?page=<?php echo $b; ?>"><?php  echo $b; ?></a> </li>
                        <?php } ?>
                            <li><a href="#">&gt</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>

 <section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2>Subcribe to our Newsletter</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                    <div class="row d-flex justify-content-center mt-4 mb-4">
                        <div class="col-md-8">
                            <form action="#" class="subscribe-form">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Enter email address">
                                    <input type="submit" value="Subscribe" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Employers</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">How it works</a></li>
                        <li><a href="#" class="py-2 d-block">Register</a></li>
                        <li><a href="#" class="py-2 d-block">Post a Job</a></li>
                        <li><a href="#" class="py-2 d-block">Advance Skill Search</a></li>
                        <li><a href="#" class="py-2 d-block">Recruiting Service</a></li>
                        <li><a href="#" class="py-2 d-block">Blog</a></li>
                        <li><a href="#" class="py-2 d-block">Faq</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Workers</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">How it works</a></li>
                        <li><a href="#" class="py-2 d-block">Register</a></li>
                        <li><a href="#" class="py-2 d-block">Post Your Skills</a></li>
                        <li><a href="#" class="py-2 d-block">Job Search</a></li>
                        <li><a href="#" class="py-2 d-block">Emploer Search</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>