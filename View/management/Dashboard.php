<?php
include './../Main/head.php';

include './../Main/links.php';
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="./../../includes/plugins/chart.js/Chart.min.js"></script>
<script src="./../../includes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<?php
include './../Main/TopNavigation.php';
include "./../Main/SideNavigation.php";
include '../../model/Connection.php';

$Query = "SELECT COUNT(Gender) as gen , Gender FROM tbl_teachers GROUP BY Gender";
$result = mysqli_query($conn, $Query);


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Welcome Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>

                                <?php
                                date_default_timezone_set('Asia/Colombo');
                                $date = date("Y-m-d");

                                // the table geek
                                $query = "SELECT start_event FROM `tbl_events` WHERE tbl_events.start_event = '$date'";

                                // Execute the query and store the result set
                                $results = mysqli_query($conn, $query);

                                if ($results) {
                                    // it return number of rows in the table.
                                    $rowevents = mysqli_num_rows($results);


                                    echo $rowevents;
                                }
                                ?>
                            </h3>

                            <p>Events Today</p>


                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?php


                                // the table geek
                                $query = "SELECT * FROM `tbl_batch`";

                                // Execute the query and store the result set
                                $results = mysqli_query($conn, $query);

                                if ($results) {
                                    // it return number of rows in the table.
                                    $rowevents = mysqli_num_rows($results);

                                    echo $rowevents;

                                    // close the result.
                                    mysqli_free_result($results);
                                }
                                ?>
                            </h3>

                            <p>Total Batches</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3> <?php


                                    // the table geek
                                    $query = "SELECT * FROM `tbl_student`";

                                    // Execute the query and store the result set
                                    $results = mysqli_query($conn, $query);

                                    if ($results) {
                                        // it return number of rows in the table.
                                        $rowevents = mysqli_num_rows($results);

                                        echo $rowevents;

                                        // close the result.
                                        mysqli_free_result($results);
                                    }
                                    ?>
                            </h3>

                            <p>Student Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> <?php


                                    // the table geek
                                    $query = "SELECT * FROM `tbl_teachers` WHERE tbl_teachers.Status = 'Active';";

                                    // Execute the query and store the result set
                                    $results = mysqli_query($conn, $query);

                                    if ($results) {
                                        // it return number of rows in the table.
                                        $rowevents = mysqli_num_rows($results);

                                        echo $rowevents;

                                        // close the result.
                                        mysqli_free_result($results);
                                    }
                                    ?></h3>

                            <p>Active Staffs</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Annual Attendance Teachers</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Active Staff</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Annual Attendance Students</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- BAR CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Anual Registration Rate</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="stackedBarChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->




                </div>
                <!-- /.col (RIGHT) -->


            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">


                    <div class="card card-warning">
                        <div class="card-header border-0">
                            <h3 class="card-title">Up-Coming BirthDays Of Students</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <div id="Birthdays">

                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">


                    <!-- Calendar -->
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-bars"></i></button>
                                    <div class="dropdown-menu float-right" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>
                <!-- /.col-md-6 -->
            </div>

        </div><!-- /.container-fluid -->
    </section>

</div>

<script>
    $(function() {
        setTimeout(function() {
            window.location.reload(1);
        }, 900000);
        // The Calender
        $('#calendar').datetimepicker({
            format: 'L',
            inline: true
        });
        $.ajax({
            url: "./../../Controller/Dashboard/LoadBirthdays.php",
            method: "post",
            success: function(data) {
                $("#Birthdays").html(data);

            }
        });





        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d');

        var areaChartData = {
            labels: [


                <?php
                $date = date("Y-m-d");
                $query = "SELECT  MonthName( Date) AS Monthname FROM `tbl_attendence_teachers` WHERE tbl_attendence_teachers.Status = 1 AND year( Date) = '$date' GROUP BY month(Date)";
                $results = mysqli_query($conn, $query);
                while ($row3 = mysqli_fetch_array($results)) {
                    echo "'" . $row3["Monthname"] . "',";
                }
                ?>
            ],
            datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [

                        <?php
                        $queryForTeacherAttendenceres = "SELECT  COUNT(Date) AS NumOfOccurance FROM `tbl_attendence_teachers` WHERE tbl_attendence_teachers.Status = 1 AND year( Date) = '$date'GROUP BY month(Date)";
                        $resultForTeacherAttendenceres = mysqli_query($conn, $queryForTeacherAttendenceres);
                        while ($row3 = mysqli_fetch_array($resultForTeacherAttendenceres)) {
                            echo $row3["NumOfOccurance"] . ',';
                        }
                        ?>

                    ]
                },

                {},

            ]
        };

        var BRCHRT = {
            labels: [


                <?php
                $query = "SELECT  monthname(Joined_Year) as Monthname FROM `tbl_student` WHERE year( Joined_Year) = '$date' GROUP BY month(Joined_Year)";
                $results = mysqli_query($conn, $query);
                while ($row3 = mysqli_fetch_array($results)) {
                    echo "'" . $row3["Monthname"] . "',";
                }
                ?>
            ],
            datasets: [{
                    label: 'Registration Rate',
                    backgroundColor: 'rgba(175,96,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [

                        <?php
                        $queryForTeacherAttendenceres = "SELECT COUNT(Joined_Year) as  NumOfOccurance FROM `tbl_student` WHERE year( Joined_Year) = '$date' GROUP BY month(Joined_Year)";
                        $resultForTeacherAttendenceres = mysqli_query($conn, $queryForTeacherAttendenceres);
                        while ($row3 = mysqli_fetch_array($resultForTeacherAttendenceres)) {
                            echo $row3["NumOfOccurance"] . ',';
                        }
                        ?>

                    ]
                },



            ]
        };


        var AttendanceStudents = {
            labels: [


                <?php
                $query = "SELECT  MonthName( Date) AS Monthname FROM `tbl_attendence` WHERE tbl_attendence.Status = 1 AND year( Date) = '$date'GROUP BY month(Date)";
                $results = mysqli_query($conn, $query);
                while ($row3 = mysqli_fetch_array($results)) {
                    echo "'" . $row3["Monthname"] . "',";
                }
                ?>
            ],
            datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(175,96,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [

                        <?php
                        $queryForTeacherAttendenceres = "SELECT  COUNT(Date) AS NumOfOccurance FROM `tbl_attendence` WHERE tbl_attendence.Status = 1 AND year( Date) = '$date'GROUP BY month(Date)";
                        $resultForTeacherAttendenceres = mysqli_query($conn, $queryForTeacherAttendenceres);
                        while ($row3 = mysqli_fetch_array($resultForTeacherAttendenceres)) {
                            echo $row3["NumOfOccurance"] . ',';
                        }
                        ?>

                    ]
                },
                {},


            ]
        };
        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        };

        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        });

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
        var lineChartOptions = jQuery.extend(true, {}, areaChartOptions);
        var lineChartData = jQuery.extend(true, {}, AttendanceStudents);
        lineChartData.datasets[0].fill = false;
        lineChartData.datasets[1].fill = false;
        lineChartOptions.datasetFill = false;

        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        });

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
        var donutData = {
            labels: [
                <?php
                $Query3 = "SELECT COUNT(Gender) as gen , Gender FROM tbl_teachers GROUP BY Gender";
                $result3 = mysqli_query($conn, $Query3);
                while ($row3 = mysqli_fetch_array($result3)) {
                    echo "'" . $row3["Gender"] . "',";
                }
                ?>
            ],
            datasets: [{
                data: <?php
                        $Query2 = "SELECT COUNT(Gender) as gen , Gender FROM tbl_teachers GROUP BY Gender";
                        $result2 = mysqli_query($conn, $Query2);
                        echo '[';
                        while ($row2 = mysqli_fetch_array($result2)) {
                            echo $row2["gen"] . ',';
                        }
                        echo ']';
                        ?>,
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        };
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        });

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.

        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.



        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var stackedBarChartCanvas = $('#stackedBarChart2').get(0).getContext('2d');


        var stackedBarChartData = jQuery.extend(true, {}, BRCHRT);

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        };

        var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })


    })
</script>
<<?php
    include './../Main/insideFooter.php';
    include './../Main/footer.php';

    ?>