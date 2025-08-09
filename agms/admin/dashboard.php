<?php
session_start();

// Show all errors (development only)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection (outside admin folder)
include_once('../includes/dbconnection.php');

// Check session
if (!isset($_SESSION['agmsaid']) || strlen($_SESSION['agmsaid']) == 0) {
    header('location:logout.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Art Gallery Management System - Admin Dashboard</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel="stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
</head>

<body>
  <section id="container" class="">
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>

    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <!-- Total Artist -->
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <?php 
                $query = mysqli_query($con, "SELECT * FROM tblartist");
                $artcount = mysqli_num_rows($query);
              ?>
              <i class="fa fa-user"></i>
              <div class="count"><?php echo $artcount; ?></div>
              <div class="title"><a href="manage-artist.php">Total Artist</a></div>
            </div>
          </div>

          <!-- Total Unanswered Enquiry -->
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <?php 
                $query1 = mysqli_query($con, "SELECT * FROM tblenquiry WHERE Status='' OR Status IS NULL");
                $uenqcount = mysqli_num_rows($query1);
              ?>
              <i class="fa fa-file"></i>
              <div class="count"><?php echo $uenqcount; ?></div>
              <div class="title"><a href="unanswer-enquiry.php">Total Unanswer Enquiry</a></div>
            </div>
          </div>

          <!-- Total Answered Enquiry -->
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <?php 
                $query1 = mysqli_query($con, "SELECT * FROM tblenquiry WHERE Status='Answer'");
                $aenqcount = mysqli_num_rows($query1);
              ?>
              <i class="fa fa-file"></i>
              <div class="count"><?php echo $aenqcount; ?></div>
              <div class="title"><a href="answer-enquiry.php">Total Answer Enquiry</a></div>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- Total Art Type -->
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <?php 
                $query2 = mysqli_query($con, "SELECT * FROM tblarttype");
                $artcount = mysqli_num_rows($query2);
              ?>
              <i class="fa fa-file"></i>
              <div class="count"><?php echo $artcount; ?></div>
              <div class="title"><a href="manage-art-type.php">Total Art Type</a></div>
            </div>
          </div>

          <!-- Total Art Medium -->
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <?php 
                $query1 = mysqli_query($con, "SELECT * FROM tblartmedium");
                $amcount = mysqli_num_rows($query1);
              ?>
              <i class="fa fa-file"></i>
              <div class="count"><?php echo $amcount; ?></div>
              <div class="title"><a href="manage-art-medium.php">Total Art Medium</a></div>
            </div>
          </div>

          <!-- Total Art Product -->
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <?php 
                $query2 = mysqli_query($con, "SELECT * FROM tblartproduct");
                $apcount = mysqli_num_rows($query2);
              ?>
              <i class="fa fa-file"></i>
              <div class="count"><?php echo $apcount; ?></div>
              <div class="title"><a href="manage-art-product.php">Total Art Product</a></div>
            </div>
          </div>
        </div>

        <?php include_once('includes/footer.php'); ?>
      </section>
    </section>
  </section>

  <!-- JS Scripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js"></script>
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/owl.carousel.js"></script>
  <script src="js/jquery.rateit.min.js"></script>
  <script src="js/jquery.customSelect.min.js"></script>
  <script src="assets/chart-master/Chart.js"></script>
  <script src="js/scripts.js"></script>
  <script>
    $(function () {
      $(".knob").knob({
        'draw': function () {
          $(this.i).val(this.cv + '%')
        }
      });

      $("#owl-slider").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
      });

      $('select.styled').customSelect();
    });
  </script>
</body>
</html>