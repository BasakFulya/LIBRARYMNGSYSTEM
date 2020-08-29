
<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Student Registration Form|LMS </title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <center><h2 class="title">Library Management System</h2></center>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="FirstName" name="firstname" required="">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="LastName" name="lastname" required="">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Username" name="username" required="">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password" required="">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Contact" name="contact">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Sem" name="sem">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Enrollment No" name="enrollmentno">
                        </div>
                        <div class="p-t-10">
                            <input class="btn btn--pill btn--green" type="submit" name="submit1" value="Register">
                        </div>
                        <div class="p-t-10">
                            <a href="login.php">Already Have an Account ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
          if(isset($_POST["submit1"]))
          {

            mysqli_query($link,"insert into student_registration values('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]','$_POST[sem]','$_POST[enrollmentno]','no','')")
        ?>
        <script type="text/javascript">
          alert("Registration successfully, You will get email when your account is approved");
          window.location = "login.php";
        </script>
         <?php

          }

          ?>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
