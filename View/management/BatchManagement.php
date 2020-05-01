

<?php
include './../Main/head.php';
include './../Main/TopNavigation.php';
include "./../Main/SideNavigation.php";


include '../../model/Connection.php';
function FillBatch($conn)
{
    $output = '';
    $sql = "SELECT DISTINCT tbl_batch.Class_ID, tbl_class.Class_Name FROM `tbl_batch` INNER JOIN tbl_class ON tbl_class.Class_ID = tbl_batch.Class_ID";
    $result = mysqli_query($conn, $sql);
    $output .= ' <option value="0">-- PLease Select a value</option>';
    while ($row = mysqli_fetch_array($result)) {

        $output .= '<option value="' . $row["Class_ID"] . '">' . $row["Class_Name"] . '</option>';
    }
    return $output;
}
function FillTeacher($conn)
{
    $output = '';
    $sql = "SELECT * FROM `tbl_teachers`";
    $result = mysqli_query($conn, $sql);
    $output .= ' <option value="0">-- PLease Select a value</option>';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Teacher_ID"] . '">' . $row["Teacher_Name"] . '</option>';
    }
    return $output;
}

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
                        <li class="breadcrumb-item active">Batch Management</li>
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
                            <h3 class="card-title">Driver Management</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">


                            <button type="button" class="btn btn-success btn-sm" id="AddDriver" name="AddDriver" >Add Batch</button>


                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog" style="margin-right: 300px;">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">

                                            <form id="Batch">

                                                <div class="form-group">
                                                    <label>Select Class</label>
                                                    <select id="SelectClass" name="SelectClass" class="form-control">

                                                        <?php
                                                        echo FillBatch($conn);
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Batch No</label>
                                                  <input type="text" name="SelectBatch" id="SelectBatch" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Select Teacher</label>
                                                    <select id="SelectTeacher" name="SelectTeacher" class="form-control">

                                                        <?php
                                                        echo FillTeacher($conn);
                                                        ?>
                                                    </select>
                                                </div>
                                            </form>
                                            <div id="inserted_data">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" id="SaveBatch" name="Save" class="btn btn-success" value="Save">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="hidden" id="HiddenID" name="HiddenID">
                                        </div>
                                    </div>
                                </div>
                            </div>
<hr>
                            <div class="modal fade bd-example-modal-lg" id="DataLoadBatchStu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Student List</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                                <div class="form-group">
                                                    <form id="LoadBatchStudentsFRM">
                                                        <div id="LoadBatchStudents">

                                                        </div>
                                                    </form>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Send message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="DataLoad">

                            </div>


                            <script>

                                $(document).ready(function () {

                                    $("#DataLoad").load("../../Controller/BatchMnagement/Fetch.php");

                                    $("#SelectClass").change(function () {
                                        $.ajax({
                                            url: "../../Controller/BatchMnagement/LoadBatchNoList.php",
                                            method: "post",
                                            data: $('#Batch').serialize(),
                                            success: function (data) {
                                                $("#SelectBatch").val(data);
                                                document.getElementById("SelectBatch").readOnly = true;
                                            }
                                        });
                                    });


                                    $(document).on("click", "#AddDriver", function () {
                                        $('#myModal').modal('show');

                                    });




                                    $(document).on("click", "#Save", function () {


                                        var id = $("#HiddenID").val();
                                        if (id == 0) {
                                            $.ajax({
                                                url: "../../Controller/DriverManagement/insert.php",
                                                method: "post",
                                                data: $('#DriverData').serialize(),
                                                success: function (data) {
                                                    $("<tr></tr>").html(data).appendTo("#Notice_Table");
                                                    $('#DriverData')[0].reset();
                                                    $("#HiddenID").val("0");
                                                    $("#Notice_Table").load("../../Controller/DriverManagement/Fetch.php");
                                                    $('#myModal').modal('hide');
                                                }
                                            });
                                        }
                                        else {
                                            $.ajax({
                                                url: "../../Controller/DriverManagement/Update.php",
                                                method: "post",
                                                data: $('#DriverData').serialize(),
                                                success: function (data) {
                                                    $("<tr></tr>").html(data).appendTo("#Notice_Table");
                                                    $('#DriverData')[0].reset();
                                                    $("#HiddenID").val("0");
                                                    $("#Notice_Table").load("../../Controller/DriverManagement/Fetch.php");
                                                    $('#myModal').modal('hide');

                                                }
                                            });

                                        }


                                    });

                                    $(document).on("click", ".del", function () {
                                        var del = $(this);
                                        var id = $(this).attr("data-id");
                                        $.ajax({
                                            url: "../../Controller/DriverManagement/Delete.php",
                                            method: "post",
                                            data: {id: id},
                                            success: function (data) {
                                                del.closest("tr").hide();
                                                $("<tr></tr>").html(data).appendTo("#Notice_Table");
                                            }
                                        });
                                    });

                                    $(document).on("click", ".view", function () {

                                        var id = $(this).attr("data-id");
                                        $.ajax({
                                            url: "../../Controller/BatchMnagement/LoadBatchStudents.php",
                                            method: "post",
                                            data: {id:id},
                                            success: function (data) {


                                                $("#LoadBatchStudents").html(data);

                                                $('#DataLoadBatchStu').modal('show');
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


<<?php
include './../Main/insideFooter.php';
include './../Main/footer.php';

?>

