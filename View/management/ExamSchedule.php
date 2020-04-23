<?php
include '../../model/Connection.php';
function FillBatch($conn) {
    $output = '';
    $sql = "SELECT * FROM `tbl_batch` INNER JOIN tbl_class ON tbl_class.Class_ID = tbl_batch.Class_ID";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Batch_ID"] . '">' . $row["Class_Name"] . ' '. $row["Batch_Number"]. '</option>';
    }
    return $output;
}
function Teacher($conn) {
    $output = '';
    $sql = "SELECT * FROM `tbl_teachers`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Teacher_ID"] . '">' . $row["Teacher_Name"] . '</option>';
    }
    return $output;
}

function Subjects($conn) {
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
                        <li class="breadcrumb-item active">Exam Schedule</li>
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
                            <h3 class="card-title">Schedule Exam</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" id="insert_form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Select Batch</label>
                                        <select id="Batch" name="Batch" class="form-control">
                                            <?php
                                            echo FillBatch($conn);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Select Teacher</label>
                                        <select id="Teacher" name="Teacher" class="form-control">
                                            <?php
                                            echo Teacher($conn);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <span id="error"></span>
                                <table class="table table-bordered table-striped" id="item_table">
                                    <tr>
                                        <th>Select Subject</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th><button type="button" name="add" class="btn btn-success btn-sm add">+</button></th>
                                    </tr>
                                </table>
                                <div align="center">
                                    <input type="submit" name="submit"  class="btn btn-warning btn-sm btn-block" value="Insert" />

                                </div>

                            </form>

                            <script>
                                $(document).ready(function(){
                                    $(".datepicker").datepicker({
                                        changeMonth: true,
                                        changeYear: true,
                                        dateFormat: "yy-mm-dd"
                                    });
                                    $(document).on('click', '.add', function(){
                                        var html = '';
                                        html += '<tr>';
                                        html += '<td><select  name="Subject[]" class="form-control Subject"><?php echo Subjects($conn); ?> </select></td>';
                                        html += '<td><input class="form-control Date datepicker" name="Date[]"></td>';
                                        html += '<td>  <input type="time" class="form-control startTime"  name="StartTime[]"></td>';
                                        html += '<td><input type="time" class="form-control endTime" name="EndTime[]" ></td>';
                                        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove">-</button></td></tr>';
                                        $('#item_table').append(html);
                                        $(".datepicker").datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            dateFormat: "yy-mm-dd"
                                        });
                                    });

                                    $(document).on('click', '.remove', function(){
                                        $(this).closest('tr').remove();
                                    });

                                    $('#insert_form').on('submit', function(event){
                                        event.preventDefault();
                                        var error = '';
                                        var count = 1;
                                        $('.Date').each(function(){
                                            if($(this).val() == '')
                                            {
                                                error += "<p>Enter Date at  "+count+" Row</p>";
                                                return false;
                                            }
                                            count  += 1;
                                        });
                                        count = 1;
                                        $('.startTime').each(function(){

                                            if($(this).val() == '')
                                            {
                                                error += "<p>Enter Start Time at "+count+" Row</p>";
                                                return false;
                                            }
                                            count  += 1;
                                        });
                                        count = 1;
                                        $('.endTime').each(function(){

                                            if($(this).val() == '')
                                            {
                                                error += "<p>Enter End Time at "+count+" Row</p>";
                                                return false;
                                            }
                                            count  += 1;
                                        });
                                        var form_data = $(this).serialize();
                                        if(error == '')
                                        {

                                            $.ajax({
                                                url:"./../../Controller/ExamSchedule/insert.php",
                                                method:"POST",
                                                data:form_data,
                                                success:function(data)
                                                {       $("<span></span>").html(data).appendTo("#error");
                                                    $('#item_table').find("tr:gt(0)").remove();
                                                }
                                            });
                                        }
                                        else
                                        {
                                            $('#error').html('<div class="alert alert-danger">'+error+'</div>');
                                        }
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
