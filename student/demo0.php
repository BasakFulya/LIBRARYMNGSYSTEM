<?php
include 'connection.php';
$tot = 0;
$photo = "";
$res = mysqli_query($link,"select * from messages where dusername='$_SESSION[username]' && read1='n' ");
$res1 = mysqli_query($link,"select * from student_registration where username ='$_SESSION[username]'");
while ($row = mysqli_fetch_array($res1))
{
  $photo = $row["profile_photo"];
}
$tot = mysqli_num_rows($res);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Library Management System
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            LMS
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Library Management System
          </a>
        </div>
        <ul class="nav">
          <li class="active ">
            <a href="my_issued_books.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>My issued Books</p>
            </a>
          </li>
          <li>
            <a href="search_books.php">
              <i class="tim-icons icon-atom"></i>
              <p>Search Books</p>
            </a>
          </li>
          <li>
            <a href="profile_photo.php">
              <i class="tim-icons icon-pin"></i>
              <p>Add Profile Photo</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">LMS</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li role="presentation" class="dropdown">
                  <a href="message_from_librarian.php" class="dropdown-toggle info-number" data-toggle="dropdown"
                     aria-expanded="false">

                      <span class="badge bg-green" onclick="window.location='message_from_librarian.php';"><i class="tim-icons icon-email-85"></i><?php echo $tot; ?></span>
                  </a>

              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <?php if ($photo == "")
                    {
                      ?> <img src="../librarian/Profile_Photo/blank.png" class="img-circle profile_img"> <?php
                    }
                    else
                    {
                      ?><img src="<?php echo $photo; ?>"  class="img-circle profile_img">
                      <?php
                    }
                    ?>
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">

                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="logout.php" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>

            </ul>

          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
