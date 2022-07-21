<?php
include 'C:\wamp64\www\jobportal\admin\connection\db.php';
session_start();
if (isset($_SESSION['email']) == true) {

} else {
    header('location:admin\admin_login_logout\post_job.php');
}
$qry=mysqli_query($conn,"select * from admin_login where admin_email='{$_SESSION['email']}'");
while($row=mysqli_fetch_array($qry)) {
            if ($row['admin_type'] == '2') {
                $sql = "select * from admin_login , company where admin_login.admin_email==company.admin_email";
                while ($res = mysqli_fetch_array($query)) {
                    $company_name = $res['company_name'];
                    $company_desc = $res['des'];
                    $company_admin = $res['company.admin_email'];
                    $email = $row['admin_login.admin_email'];
                    $lname = $row['last_name'];
                    $fname = $row['first_name'];
                    $user=$row['admin_user'];
                }
            }
            elseif ($row['admin_type']=='3'){
                    $query2 = mysqli_query($conn,"select * from job_seeker,admin_login where admin_login.admin_email=job_seeker.email");
                    while ($result=mysqli_fetch_array($query2)){
                        $fname=$result['first_name'];
                        $lname=$result['last_name'];
                        $email=$result['email'];
                        $dob=$result['dob'];
                        $mobile=$result['mobile_no'];
                        $degrees=$result['degrees'];
                        $qualification=$result['qualification'];
                        $user=$row['admin_user'];
                    }
                }
            }

?>

<!doctype html>
<html lang="en">
<head>
    <title> My Profile</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="admin/img/logo.png" type="">
    <title>Job For YOu- Understanding your HR needs better</title>

    <!--Font Awesome-->
    <link rel="stylesheet" href="include/font-awesome-4.7.0/css/font-awesome.css">
<!--datatables css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">

    <link href="css/index_style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    >
    <link rel="stylesheet" href="admin/css/profile.css" type="text/css">
</head>
<body>


 <div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUYpfamlfFHTdZqLj1vlq-JLory3r5cgU0lw&usqp=CAU" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h2><?php echo $user ?></h2>
                                <a href="#" aria-label="Change Profile Picture">
                                    <div class="profile-pic" style="background-image: url('https://cdn.pixabay.com/photo/2015/12/22/20/42/face-1104763_960_720.jpg')" >

                                        <span class="glyphicon glyphicon-camera"></span>
                                        <span>Change Image</span>

                                    </div>
                                </a>
<input type="button" name="edit_image" id="edit_image" style="border-style: outset" value="Change">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                            <span class="text-secondary">https://bootdey.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                            <span class="text-secondary">@bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $fname."  ".$lname; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $email ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $mobile ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Bay Area, San Francisco, CA
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Applied Jobs</h1>

                </div>
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Job Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Job Seeker Mail Id</th>
                        <th>Date Of Birth</th>
                        <th>File</th>
                        <th>Experience</th>
                        <th>Special Skills</th>
                        <th>Achievements</th>
                        <th>View File</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'C:\wamp64\www\jobportal\admin\connection\db.php';
                    $qry=mysqli_query($conn,"select * from admin_login where admin_email='{$_SESSION['email']}'");
                    while($row=mysqli_fetch_array($qry)){
                        if($row['admin_type']=='1')
                        {
                            $sql="select * from apply";
                        }else{
                            $sql="select * from apply left join all_jobs on apply.job_id=all_jobs.Id where all_jobs.customer_email='{$_SESSION['email']}'";
                        }
                    }

                    $query=mysqli_query($conn,$sql);

                    while($row=mysqli_fetch_array($query)){

                        ?>
                        <tr>
                            <td><?php echo $row['apply_id']; ?></td>
                            <td><?php echo $row['job_id']; ?></td>
                            <td><?php echo $row['job_seeker']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['file']; ?></td>
                            <td><?php echo $row['special_skills']; ?></td>
                            <td><?php echo $row['experience']; ?></td>
                            <td><?php echo $row['achievements']; ?></td>
                            <td>
                                <div class="row">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a>

                                    </div>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody
                    <tfoot>
                    <tr>

                        <th>Sno</th>
                        <th>Job Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Job Seeker Mail Id</th>
                        <th>Date Of Birth</th>
                        <th>File</th>
                        <th>Experience</th>
                        <th>Special Skills</th>
                        <th>Achievements</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>



            </div>
            <div class="col-md-8">
                <a href="search.php" class="btn btn-block btn-primary" style="margin-right: 30%;color: whitesmoke">Find Recent jobs for you</a>
            </div>
        </div>

    </div>
</div>
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <script>
     $(document).ready(function() {
         $('#example').DataTable();
     } );
 </script>
</body>
</html>