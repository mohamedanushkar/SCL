<!DOCTYPE html>

<?php
include '../../model/Connection.php';




function FillGrade($conn)
{

    $sql = "SELECT * FROM `tbl_batch` INNER JOIN tbl_class ON tbl_class.Class_ID = tbl_batch.Class_ID WHERE tbl_batch.status = 'Open'";
    $output = '';
    $result = mysqli_query($conn, $sql);

    $output .= '<option value="0">-- Please select a value --</option>';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Batch_ID"] . '">' . $row["Class_Name"] . ' ' . $row["Batch_Number"] . '</option>';
    }
    return $output;
}

?>
<?php
include './../Main/head.php';
include './../Main/links.php';
include './../Main/TopNavigation.php';
include "./../Main/SideNavigation.php";
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
                        <li class="breadcrumb-item active">Student Attendance</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Students Attendance</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">


                            <div class="form-group">


                                <button type="button" id="OPenModel" class="btn btn-success" data-toggle="modal" data-target="#Modal">Mark
                                </button>



                            </div>
                            <div class="form-group">

                                <div class="modal fade bd-example-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
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
                            <script>
                                $(document).ready(function() {



                                    $("#load").load("../../Controller/MarkAttendence/FetchTable.php");

                                    $('#Search').click(function() {
                                        $.ajax({
                                            url: "../../Controller/MarkAttendence/fetch.php",
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
                                            url: "../../Controller/MarkAttendence/insert.php",
                                            method: "POST",
                                            data: $('#SearchData').serialize(),
                                            success: function(data) {
                                                $('#employee_data').html(data);
                                                $("#load").load("../../Controller/MarkAttendence/FetchTable.php");
                                                $('#Modal').modal('hide');
                                                $('#OPenModel').attr('disabled', 'disabled');
                                                $('#OPenModel').val('Alreaady Marked today');

                                            }
                                        });
                                    });
                                });
                            </script>


                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            Thank You
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


<?php
include './../Main/insideFooter.php';
include './../Main/footer.php';

?>