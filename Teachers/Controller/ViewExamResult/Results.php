
<?php
include './../../../model/Connection.php';

session_start();
$Grade_ID = $_SESSION["TechID"];

$query = "SELECT * FROM `tbl_exam_schedule` INNER JOIN tbl_batch ON tbl_batch.Batch_ID = tbl_exam_schedule.Batch_ID INNER JOIN tbl_teachers ON tbl_teachers.Teacher_ID = tbl_exam_schedule.Teacher_ID INNER JOIN tbl_class ON tbl_batch.Class_ID = tbl_class.Class_ID WHERE tbl_teachers.Teacher_ID ='$Grade_ID' ";
$result = mysqli_query($conn, $query);
?>

    <?php
    while ($row = mysqli_fetch_array($result)) {



        echo "  <div class='media'>
        <div class='media-body'>
          <h3 class='dropdown-item-title'>
          {$row["Class_Name"]}                       
          </h3>
          <p class='text-sm'>Batch Number: {$row["Batch_Number"]}</p>
          <p class='text-sm text-muted'><i class='fas fa-book mr-1'></i> {$row["Exam_Name"]}</p>
        </div>
        </div>
        <a href='#' data-id='{$row["Batch_ID"]}' data-load ='{$row["Exam_ID"]}' class='card-link select'>check results</a>
        <div class='dropdown-divider'></div>";
       
    }
    ?>
    