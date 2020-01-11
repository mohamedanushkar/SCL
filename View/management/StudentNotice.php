<?php
include '../../model/Connection.php';

function FillGrade($conn) {
    $output = '';
    $sql = "SELECT * FROM Grade";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Grade_ID"] . '">' . $row["Grade_Name"] . '</option>';
    }
    return $output;
}

function FillYear($conn) {
    $output = '';
    $sql = "select distinct student.Year from student";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Year"] . '">' . $row["Year"] . '</option>';
    }
    return $output;
}
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="../../Assets/CSS/Form.css" rel="stylesheet" type="text/css"/>

    </head>
    <body style="margin-right: 300px;">
        <p style="background-color: red; padding: 10px; color: white">Student Notice</p>
        <br>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-sm" id="SelectStu" name="SelectStu">Select Student</button>


        <!-- Modal -->
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
                            <p class="lbl">Year</p>
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
        <div id="inserted_data_Notice">
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
                    </div>
                </div>
            </div>
        </div>
        <hr>
      
        <div id="message">
        </div>  
        
        <span id="Notice_Table">
        </span>
        <input type="hidden" id="HiddenID" name="HiddenID">
    </body>
</html>

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
                  $("<p></p>").html(data).appendTo("#message");
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
<!edit>