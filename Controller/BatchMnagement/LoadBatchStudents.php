<?php
include '../../model/Connection.php';

$ID = $_POST["id"];
$query = "SELECT * FROM `tbl_batch` INNER JOIN tbl_batch_students ON tbl_batch_students.Batch_ID = tbl_batch.Batch_ID INNER JOIN tbl_student ON tbl_student.Student_ID = tbl_batch_students.Student_ID WHERE tbl_batch_students.Batch_ID = '$ID' ";
$result = mysqli_query($conn, $query);
?>

    <?php
    while ($row = mysqli_fetch_array($result)) {

        echo "        <p> ";
        echo $row["Batch_Number"];
        echo "           </p>";
    }
    ?>