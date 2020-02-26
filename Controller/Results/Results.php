
<?php
include '../../model/Connection.php';


$Grade_ID = $_POST["Batch"];

$query = "SELECT * FROM `tbl_exam_schedule` INNER JOIN tbl_batch ON tbl_batch.Batch_ID = tbl_exam_schedule.Batch_ID INNER JOIN tbl_teachers ON tbl_teachers.Teacher_ID = tbl_exam_schedule.Teacher_ID INNER JOIN tbl_class ON tbl_batch.Class_ID = tbl_class.Class_ID WHERE tbl_batch.Batch_ID ='$Grade_ID' ";
$result = mysqli_query($conn, $query);
?>

<table id="data" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Exam ID</th>
        <th>Grade</th>
        <th>Teacher Name</th>
        <th>Select</th>

    </tr>
    </thead>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row["Batch_ID"]}</td>";
        echo "<td>{$row["Class_Name"]}</td>";
        echo "<td>{$row["Teacher_Name"]}</td>";
        echo " <td> <a  class='select' data-id='{$row["Batch_ID"]}' data-load ='{$row["Exam_ID"]}' ><i class='fa fa-check'></i></a></td>";
        echo "</tr>";
    }
    ?>
</table>
