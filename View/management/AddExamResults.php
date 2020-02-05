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
    <script type="text/javascript" src="./../../Assets/JS/qrcode.min.js"></script>
    <script type="text/javascript" src="./../../Assets/JS/canvas2image.js"></script>
    <script type="text/javascript" src="./../../Assets/JS/html2canvas.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body style="margin: 20px;">
<p class="CenterTopic">Schedule Exam</p>

<div >
</div>

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
    <hr>
    <span id="error"></span>
    <table class="table table-bordered table-striped" id="item_table">
        <tr>
            <th>Select Subject</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>

        </tr>
    </table>

    </form>

<script>
    $(document).ready(function(){
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });


        $("#Batch").change(function(){
            $.ajax({
                url: "./../../Controller/Results/Results.php",
                method: "post",
                data: $('#DriverData').serialize(),
                success: function (data) {
                    $("<tr></tr>").html(data).appendTo("#Notice_Table");
                }
            });
        });






    });
</script>
</body>

</html>
