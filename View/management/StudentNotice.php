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
<html>
    <head>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./../../Assets/CSS/Main.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <body style="margin: 20px">
    <div class="form-group">
        <p class="CenterTopic">Send Notice</p>
    </div>
<div class="form-group">
    <button type="button" class="btn btn-info btn-sm" id="SelectStu" name="SelectStu">Select Student</button>

</div>
<div class="form-group">
    <div id="message">
    </div>

    <span id="Notice_Table">
        </span>
</div>


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
<!edit>