<!DOCTYPE html>

<?php
include '../../model/Connection.php';




function FillGrade($conn) {
    $output = '';
    $sql = "SELECT * FROM tbl_Class";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Class_ID"] . '">' . $row["Class_Name"] . '</option>';
    }
    return $output;
}

?>
<?php
include './../Main/head.php';
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
                        <li class="breadcrumb-item active">Student Management</li>
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
                            <h3 class="card-title">Teachers Attendance</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">


                            <div class="form-group">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">Mark
                                </button>
                            </div>

                            <div  class="form-group">
                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form id="SearchData">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

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

                            <!-- Modal -->
                            <div id="load" class="form-group">

                            </div>
                            <script>
                                $(document).ready(function () {



                                    $("#table").load("../../Controller/MarkTeachersAttendence/fetch.php");
                                    $("#load").load("../../Controller/MarkTeachersAttendence/FetchTable.php");


                                    $('#Save').click(function () {

                                        $.ajax({
                                            url: "../../Controller/MarkTeachersAttendence/insert.php",
                                            method: "POST",
                                            data: $('#SearchData').serialize(),
                                            success: function (data) {
                                                $('#employee_data').html(data);
                                                $("#load").load("../../Controller/MarkTeachersAttendence/FetchTable.php");
                                                $('#Modal').modal('hide');
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

