<?php
include './../../../model/Connection.php';

$Exam_ID = $_POST["BatchNumber"];

$StudentName = $_POST["StudentListForshow"];

$query = "SELECT * FROM `tbl_exam_results` INNER JOIN tbl_exam_schedule ON tbl_exam_results.Exam_ID = tbl_exam_schedule.Exam_ID INNER JOIN tbl_student ON tbl_student.Student_ID = tbl_exam_results.Student_ID INNER JOIN tbl_subject ON tbl_subject.Subject_ID = tbl_exam_results.Subject_ID WHERE tbl_exam_results.Student_ID = '$StudentName' AND tbl_exam_results.Exam_ID = '$Exam_ID'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<br>
<table id="employee_data1" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Subject ID</th>
        <th>Subject</th>
        <th>Marks</th>
        <th>Grade</th>

    </tr>
    </thead>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row["Subject_ID"]}</td>";
        echo "<td>{$row["Name"]}</td>";
        echo "<td>{$row["Marks"]}</td>";


        $status = '';
        if ($row["Marks"] >= 75) {
            $status = '<label class="badge badge-success">A</label>';
        } else  if ($row["Marks"] >= 65) {
            $status = '<label class="badge badge-info">B</label>';
        }
        else if ($row["Marks"] >= 55){
            $status = '<label class="badge badge-warning">c</label>';
        }
        else if ($row["Marks"] >= 35){
            $status = '<label class="badge badge-primary">S</label>';
        }
        else {
            $status = '<label class="badge badge-danger">F</label>';
        }

        echo "<td>$status</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#employee_data1').DataTable();
    });
</script>  