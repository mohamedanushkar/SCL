<?php
include '../../model/Connection.php';
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

?>

<?php
include './../Main/head.php';
include './../Main/TopNavigation.php';
include "./../Main/SideNavigation.php";
?>

<!-- Content Wrapper. Contains page content -->
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
                        <li class="breadcrumb-item active">Manage Drivers</li>
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
                            <h3 class="card-title">Exam Results</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"
                                        data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <form method="post" id="insert_form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Select Batch</label>
                                        <select id="Batch" name="Batch" class="form-control">
                                            <option>-- Select Batch --</option>
                                            <?php
                                            echo FillBatch($conn);
                                            ?>
                                        </select>
                                    </div>

                                </div>


                                <div class="modal fade" id="AddResultsMOdal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">View Exam Results</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" name="BatchNumber" id="BatchNumber"
                                                               class="form-control"
                                                               readonly placeholder="First name">
                                                    </div>
                                                    <div class="col">
                                                        <select name="StudentList" id="StudentList"
                                                                class="form-control">


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
                                                <button id="SaveResults" type="button" class="btn btn-primary">Add
                                                    Results
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div id="Load_Exam_Main">

                                </div>

                            </form>


                            <script>

                                function PrintC(el) {
                                    var prtContent = document.getElementById(el);
                                    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                                    WinPrint.document.write(prtContent.innerHTML);
                                    WinPrint.document.close();
                                    WinPrint.focus();
                                    WinPrint.print();
                                    WinPrint.close();
                                }

                                $(document).ready(function () {
                                    $(".datepicker").datepicker({
                                        changeMonth: true,
                                        changeYear: true,
                                        dateFormat: "yy-mm-dd"
                                    });


                                    $("#Batch").change(function () {

                                        $.ajax({
                                            url: "./../../Controller/Results/Results.php",
                                            method: "post",
                                            data: $('#insert_form').serialize(),
                                            success: function (data) {
                                                $("#Load_Exam_Main").html(data);
                                            }
                                        });
                                    });

                                    $("#StudentList").change(function () {

                                        $.ajax({
                                            url: "./../../Controller/ViewExamResult/ViewResults.php",
                                            method: "post",
                                            data: $('#insert_form').serialize(),
                                            success: function (data) {
                                                $("#loadSubjects").html(data);
                                            }
                                        });
                                    });
                                    $(document).on("click", ".select", function () {

                                        var id = $(this).attr("data-id");

                                        var load = $(this).attr("data-load");
                                        $('#BatchNumber').val(load);


                                        $.ajax({
                                            url: "./../../Controller/Results/LoadNameList.php",
                                            method: "POST",
                                            data: {id22: id},

                                            success: function (data) {
                                                $('#StudentList').html(data);

                                            }
                                        });

                                        $('#AddResultsMOdal').modal('show');
                                    });


                                });
                            </script>
                        </div>

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
<!-- /.content-wrapper --
<?php
include './../Main/insideFooter.php';
include './../Main/footer.php';

?>



