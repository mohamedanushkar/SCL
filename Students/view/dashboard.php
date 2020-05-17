<?php
session_start();

if(isset($_SESSION['StuID']) && !empty($_SESSION['StuID'])) {
  
}
else{
  header('Location:./../index.php');
}
  


?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Student Dashboard</title>
  <?php
  include './../../View/Main/links.php';

  ?>

</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="../../index3.html" class="navbar-brand">

          <span class="brand-text font-weight-light">Welcome


            <?php
            echo $_SESSION["User"];
            ?>
          </span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index3.html" class="nav-link">Home</a>
            </li>


          </ul>

          <!-- SEARCH FORM -->
          <form class="form-inline ml-0 ml-md-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-cog"></i>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Options</span>
                <div class="dropdown-divider"></div>
                <a href="./../../View/management/UserProfile.php" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="./../Controller/loginverify/logout.php" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Log Out
                </a>

               
                <div class="dropdown-divider"></div>

                <div class="dropdown-divider"></div>
            </div>
        </li>

          <!-- Notifications Dropdown Menu -->

        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"> The Student<small> dashboard</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Student</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> Contact Number</strong>

                  <p class="text-muted">
                    <?php
                    echo $_SESSION["Phone"];
                    ?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                  <p class="text-muted">
                    <?php
                    echo $_SESSION["Address"];
                    ?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-pencil-alt mr-1"></i> User Name</strong>

                  <p class="text-muted">
                    <?php
                    echo $_SESSION["User"];
                    ?>
                  </p>

                </div>
                <!-- /.card-body -->
              </div>

              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="card-title">check results</h5>

                  <p class="card-text">
                    <div class='dropdown-divider'></div>
                    <?php
                    include '../../model/Connection.php';

                    $stuid = $_SESSION["StuID"];
                    $query = "SELECT DISTINCT(tbl_exam_schedule.Exam_ID), tbl_exam_schedule.Exam_Name, tbl_batch.Batch_Number , tbl_class.Class_Name FROM `tbl_exam_results` INNER JOIN tbl_exam_schedule on tbl_exam_schedule.Exam_ID = tbl_exam_results.Exam_ID INNER JOIN tbl_batch on tbl_batch.Batch_ID = tbl_exam_schedule.Batch_ID INNER JOIN tbl_class on tbl_batch.Class_ID = tbl_class.Class_ID WHERE tbl_exam_results.Student_ID = '$stuid'";
                    $result = mysqli_query($conn, $query);


                    while ($row = mysqli_fetch_array($result)) {
                      echo "
                    <div class='media'>
                    <div class='media-body'>
                      <h3 class='dropdown-item-title'>
                      {$row["Class_Name"]}                       
                      </h3>
                      <p class='text-sm'>Batch Number: {$row["Batch_Number"]}</p>
                      <p class='text-sm text-muted'><i class='fas fa-book mr-1'></i> {$row["Exam_Name"]}</p>
                    </div>
                    </div>
                    <a href='#' data-id='{$row["Exam_ID"]}' class='card-link results'>check results</a>
                    <div class='dropdown-divider'></div>
                    ";
                    }
                    ?>
                  </p>

                </div>
              </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">Recent Notices</h5>
                </div>
                <div class="card-body">

                  <?php


                  $stuid = $_SESSION["StuID"];
                  $query = "SELECT * FROM `tbl_notice` WHERE tbl_notice.Student_ID = '$stuid' ORDER BY `tbl_notice`.`Date` DESC LIMIT 5";
                  $result = mysqli_query($conn, $query);


                  while ($row = mysqli_fetch_array($result)) {
                    echo "
                    <div class='media'>
                    <div class='media-body'>
                      <h3 class='dropdown-item-title'>
                      {$row["Notice_Title"]}                       
                      </h3>
                      <p class='text-sm'>{$row["Description"]}</p>
                      <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> {$row["Date"]}</p>
                    </div>
                    </div>
                    <div class='dropdown-divider'></div>
                    ";
                  }
                  ?>

                </div>
              </div>

              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">results will be viewed here</h5>
                </div>
                <div id="loadres" class="card-body">


                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">

      </div>
      <!-- Default to the left -->

    </footer>
  </div>
  <!-- ./wrapper -->

  <?php

  ?>
  <!-- REQUIRED SCRIPTS -->
  <script>
    $(document).ready(function() {


      $(document).on("click", ".results", function() {

        var id = $(this).attr("data-id");


        $.ajax({
          url: "./../Controller/dashboard/getresults.php",
          method: "post",
          data: {
            id: id
          },
          success: function(data) {
            $("#loadres").html(data);
          }
        });
      });

    });
  </script>

</body>

</html>