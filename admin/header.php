<?php 
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Digital Kisan | Admin Panel
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  
  <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/css/w3.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" media="screen" href="./assets/css/topbox.css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="./assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a class="simple-text logo-normal">
         Digital Kisan
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($page=='dashboard'){ echo 'active'; } ?>">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item <?php if($page=='manage-category'){ echo 'active'; } ?>">
            <a class="nav-link" href="manage-category.php">
              <i class="material-icons">menu</i>
              <p>Manage Category</p>
            </a>
          </li>

          <li class="nav-item <?php if($page=='manage-posts'){ echo 'active'; } ?>">
            <a class="nav-link" href="manage-post.php">
              <i class="material-icons">view_day</i>
              <p>Manage Posts</p>
            </a>
          </li>

          <li class="nav-item <?php if($page=='manage-slider'){ echo 'active'; } ?>">
            <a class="nav-link" href="manage-slider.php">
              <i class="material-icons">view_carousel</i>
              <p>Manage Image Slider</p>
            </a>
          </li>

          <li class="nav-item <?php if($page=='manage-users'){ echo 'active'; } ?>">
            <a class="nav-link" href="manage-users.php">
              <i class="material-icons">supervisor_account</i>
              <p>App Users</p>
            </a>
          </li>  

           <li class="nav-item <?php if($page=='manage-admin-users'){ echo 'active'; } ?>">
            <a class="nav-link" href="manage-admin-users.php">
              <i class="material-icons">admin_panel_settings</i>
              <p>Admin Users</p>
            </a>
          </li>          
    
          <li class="nav-item <?php if($page=='manage-feedback'){ echo 'active'; } ?>">
            <a class="nav-link" href="manage-feedback.php">
              <i class="material-icons">rate_review</i>
              <p>Feedbacks</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="material-icons">https</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">

  <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              
            </form>
            <ul class="navbar-nav">
             
              
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i> <?php echo $_SESSION['name'];  ?>
                  <p class="d-lg-none d-md-block">
                
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


      <div class="content">