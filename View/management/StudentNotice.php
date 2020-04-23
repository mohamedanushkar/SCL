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

function FillYear($conn) {
    $output = '';
    $sql = "select distinct Batch_Number from tbl_batch";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Batch_Number"] . '">' . $row["Batch_Number"] . '</option>';
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
                        <li class="breadcrumb-item active">Student Notices</li>
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
                                <button type="button" class="btn btn-info btn-sm" id="SelectStu" name="SelectStu">Select Student</button>

                            </div>
                            <div class="form-group">
                                <div id="message">
                                </div>

                                <span id="Notice_Table">
        </span>
                            </div>
                            <div class="modal fade" id="myModal" role="dialog" style="margin-right: 300px;">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="insert_data">
                                                <p class="lbl">Grade</p>
                                                <select name="Grade_ID" id="Grade_ID" class="form-control txt">
                                                    <?php
                                                    echo FillGrade($conn);
                                                    ?>
                                                </select>
                                                <p class="lbl">Batch Number</p>
                                                <select name="Year" id="Year" class="form-control txt">
                                                    <?php
                                                    echo FillYear($conn);
                                                    ?>
                                                </select>
                                            </form>
                                            <div id="inserted_data">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" id="Search" name="Search" class="btn btn-info" value="Search">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="myModal2" role="dialog" style="margin-right: 300px;">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="NoticeDate" >
                                                <p class="txt">Student ID</p>
                                                <input type="text" id="StuID" name="StuID" class="form-control txt" >
                                                <p class="txt">Notice Title</p>
                                                <input type="text" id="NoticeTitle" name="NoticeTitle" class="form-control txt">
                                                <p class="txt">Description</p>
                                                <textarea class="form-control" id="Description" name="Description" rows="10" cols="10" ></textarea>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" id="SaveNotice"  name="SaveNotice" class="btn btn-success" value="Send">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="hidden" id="HiddenID" name="HiddenID">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>

                                $(document).ready(function () {
                                    $("#Notice_Table").load("../../Controller/StudentNotice/fetchTable.php");


                                    $('#Search').click(function () {
                                        $.ajax({
                                            url: "../../Controller/StudentNotice/Fetch.php",
                                            method: "post",
                                            data: $('#insert_data').serialize(),
                                            success: function (data) {
                                                $("#inserted_data").html(data);
                                                $("#HiddenID").val("0");

                                            }
                                        });
                                    });

                                    $('#SelectStu').click(function () {
                                        $("#HiddenID").val("0");
                                        $('#myModal').modal('show');
                                    });

                                    $(document).on("click", ".select", function () {
                                        var id = $(this).attr("data-id");
                                        $('#myModal').modal('hide');
                                        $("#StuID").val(id);
                                        $('#StuID').attr('readonly', true);
                                        $('#SaveNotice').val("Save");
                                        $('#NoticeTitle').val('');
                                        $('#Description').val('');
                                        $('#myModal2').modal('show');

                                    });


                                    $(document).on("click", "#SaveNotice", function () {
                                        var id = $("#HiddenID").val();
                                        if (id == 0) {
                                            $.ajax({
                                                url: "../../Controller/StudentNotice/insert.php",
                                                method: "post",
                                                data: $('#NoticeDate').serialize(),
                                                success: function () {
                                                    $("#HiddenID").val("0");
                                                    $('#myModal2').modal('hide');
                                                    $('#NoticeDate')[0].reset();
                                                    $("#Notice_Table").load("../../Controller/StudentNotice/fetchTable.php");


                                                }

                                            });

                                        }
                                        else {
                                            $.ajax({
                                                url: "../../Controller/StudentNotice/Update.php",
                                                method: "post",
                                                data: $('#NoticeDate').serialize(),
                                                success: function (data) {

                                                    $("#HiddenID").val("0");
                                                    $('#myModal2').modal('hide');
                                                    $('#NoticeDate')[0].reset();
                                                    $("<p></p>").html(data).appendTo("#NoticeDate");
                                                    $("#Notice_Table").load("../../Controller/StudentNotice/fetchTable.php");
                                                }
                                            });
                                        }
                                    });

                                    $(document).on("click", ".del", function () {
                                        var del = $(this);
                                        var id = $(this).attr("data-id");
                                        $.ajax({
                                            url: "../../Controller/StudentNotice/delete.php",
                                            method: "post",
                                            data: {id: id},
                                            success: function (data) {
                                                del.closest("tr").hide();
                                                $("<p></p>").html(data).appendTo("#Notice_Table");
                                            }
                                        });
                                    });

                                    $(document).on("click", ".edit", function () {
                                        var id = $(this).attr("data-id");
                                        $("#HiddenID").val(id);
                                        $("#StuID").val(id);
                                        var name = $(this).closest('tr').find('td:eq(2)').text();
                                        $("#NoticeTitle").val(name);
                                        var name = $(this).closest('tr').find('td:eq(3)').text();
                                        $("#Description").val(name);
                                        $('#myModal2').modal('show');
                                        $('#SaveNotice').val("Update");
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

