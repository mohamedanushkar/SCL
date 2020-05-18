<?php


include './../../model/Connection.php';
session_start();

function FillBatch($conn)
{
  $output = '';
  $sql = "SELECT * FROM `tbl_batch` INNER JOIN tbl_class ON tbl_class.Class_ID = tbl_batch.Class_ID";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $output .= '<option value="' . $row["Batch_ID"] . '">' . $row["Class_Name"] . ' ' . $row["Batch_Number"] . '</option>';
  }
  return $output;
}


function Subjects($conn)
{
  $output = '';
  $sql = "SELECT * FROM `tbl_subject`";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $output .= '<option value="' . $row["Subject_ID"] . '">' . $row["Name"] . '</option>';
  }
  return $output;
}


function FillGrade($conn)
{
  $Teacher = $_SESSION["TechID"];
  $sql = "SELECT * FROM `tbl_batch` INNER JOIN tbl_class ON tbl_class.Class_ID = tbl_batch.Class_ID WHERE tbl_batch.Teacher_ID ='$Teacher' AND tbl_batch.status = 'Open'";
  $output = '';
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $output .= '<option value="' . $row["Batch_ID"] . '">' . $row["Class_Name"] . ' ' . $row["Batch_Number"] . '</option>';
  }
  return $output;
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

  <title>Teaachers Dashboard</title>
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
              <h1 class="m-0 text-dark"> The Teachers<small> dashboard</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Teacher</li>
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
                  <h5 class="card-title">Add results</h5>
                  <p class="card-text">
                    <form method="post" id="insertMarks">
                      <div class="modal fade" id="AddResultsMOdal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Exam Results</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-row">
                                <div class="col">
                                  <input type="text" name="Batchno" id="Batchno" class="form-control" readonly placeholder="First name">
                                </div>
                                <div class="col">
                                  <select name="Student" id="Student" class="form-control">
                                  </select>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-12">
                                  <span id="error"></span>
                                </div>
                              </div>
                              <hr>
                              <div id="loadres">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                              </button>
                              <button id="SaveRes" type="button" class="btn btn-primary">Add
                                Results
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div id="Load_Exam_Maindata">
                      </div>
                    </form>
                  </p>
                </div>
              </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">View Results</h5>
                </div>
                <div class="card-body">
                  <form method="post" id="insert_form">
                    <div class="row">
                      <div id="loadTeacherBatchesss" class="col-md-12">
                      </div>
                    </div>
                    <div class="modal fade" id="AddResultsMOdal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Exam Results</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-row">
                              <div class="col-md-12">
                                <input type="hidden" name="BatchNumber" id="BatchNumber" class="form-control" readonly placeholder="First name">
                                <select name="StudentListForshow" id="StudentListForshow" class="form-control">
                                </select>
                              </div>
                            </div>
                            <hr>
                            <div id="loadSubjects">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                              Close
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div id="Load_Exam_Main">
                    </div>
                  </form>
                </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Mark Attendance</h5>
                  <p class="card-text">

                    <div class="form-group">


                    <button type="button" id="OPenModel"  class="btn btn-success" data-toggle="modal" data-target="#Modal">Mark
     </button>

                    </div>
                    <div class="form-group">
                      <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <form id="SearchData">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mark Attendance</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                  <select id="SelectClass" class="form-control" name="SelectClass">
                                    <?php
                                    echo FillGrade($conn);
                                    ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <button type="button" id="Search" name="Search" class="btn btn-info">search</button>
                                </div>
                                <div id="table" class="form-group">



                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="Save" name="Save" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>

                      <a href=""></a>
                    </div>
                    <div id="load" class="form-group">

                    </div>

                  </p>
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


      $("#loadTeacherBatchesss").load("./../Controller/ViewExamResult/Results.php");


      $("#StudentListForshow").change(function() {

        $.ajax({
          url: "./../Controller/ViewExamResult/ViewResults.php",
          method: "post",
          data: $('#insert_form').serialize(),
          success: function(data) {
            $("#loadSubjects").html(data);
          }
        });
      });
      $(document).on("click", ".select", function() {

        var id = $(this).attr("data-id");

        var load = $(this).attr("data-load");
        $('#BatchNumber').val(load);


        $.ajax({
          url: "./../Controller/Results/LoadNameList.php",
          method: "POST",
          data: {
            id22: id
          },

          success: function(data) {
            $('#StudentListForshow').html(data);

          }
        });

        $('#AddResultsMOdal2').modal('show');
      });





      $.ajax({
        url: "./../Controller/Results/Results.php",
        method: "post",


        success: function(data) {
          $("#Load_Exam_Maindata").html(data);
        }
      });


      $(document).on("click", ".sel", function() {
        var id = $(this).attr("data-id");
        var id22 = $(this).attr("data-id");

        var load = $(this).attr("data-load");
        $('#BatchNumber').val(load);
        $.ajax({
          url: "./../Controller/Results/LoadSubjects.php",
          method: "POST",
          data: {
            id: id
          },
          success: function(data) {
            $('#loadres').html(data);

          }
        });


        $.ajax({
          url: "./../Controller/Results/LoadNameList.php",
          method: "POST",
          data: {
            id22: id22
          },
          success: function(data) {
            $('#Student').html(data);

          }
        });

        $('#AddResultsMOdal').modal('show');
      });

      $('#SaveRes').click(function() {


        var error = '';
        count = 1;

        var value = $('#StudentList').val();;
        if (value == 0) {
          error += "<p>Student Should Be Selected";

        }
        $('.Marks').each(function() {

          if ($(this).val() == '') {
            error += "<p>value cannot be empty at row " + count + "</p>";
            return false;
          }
          if ($(this).val() <= -1) {
            error += "<p>valur should be greater than 0 at row " + count + "</p>";
            return false;
          }
          if ($(this).val() > 100) {
            error += "<p>value should be less than 100 at row" + count + "</p>";
            return false;
          }
          count += 1;
        });

        if (error == '') {

          $.ajax({
            url: "./../Controller/Results/insertData.php",
            method: "POST",
            data: $('#insertMarks').serialize(),
            success: function(data) {
              $("<span></span>").html(data).appendTo("#Load_Exam_Main");

            }
          });
        } else {
          $('#error').html('<div class="alert alert-danger">' + error + '</div>');
        }



      });


      ///attendance
      $("#load").load("../../Controller/MarkAttendence/FetchTable.php");


      $('#Search').click(function() {
        $.ajax({
          url: "../Controller/MarkAttendence/fetch.php",
          method: "POST",
          data: $('#SearchData').serialize(),
          success: function(data) {
            $('#table').html(data);
            $("#load").load("../../Controller/MarkAttendence/FetchTable.php");

          }
        });
      });

      $('#Save').click(function() {

        $.ajax({
          url: "../Controller/MarkAttendence/insert.php",
          method: "POST",
          data: $('#SearchData').serialize(),
          success: function(data) {
            $('#load').html(data);
            $("#load").load("../../Controller/MarkAttendence/FetchTable.php");
            $('#Modal').modal('hide');
           

          }
        });
      });
    });
  </script>

</body>

</html>