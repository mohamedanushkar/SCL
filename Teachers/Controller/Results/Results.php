
<?php
include './../../../model/Connection.php';

session_start();
$Grade_ID = $_SESSION["TechID"];

$query = "SELECT * FROM `tbl_exam_schedule` INNER JOIN tbl_batch ON tbl_batch.Batch_ID = tbl_exam_schedule.Batch_ID INNER JOIN tbl_teachers ON tbl_teachers.Teacher_ID = tbl_exam_schedule.Teacher_ID INNER JOIN tbl_class ON tbl_batch.Class_ID = tbl_class.Class_ID WHERE tbl_teachers.Teacher_ID ='$Grade_ID' ";
$result = mysqli_query($conn, $query);
?>

    <?php
    while ($row = mysqli_fetch_array($result)) {





        echo '
        
        <!-- Message to the right -->
        <div class="direct-chat-msg right">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">Batch Number '.$row["Batch_Number"].'</span>
            <span class="direct-chat-timestamp float-left"> <a href="#" data-id="'.$row["Batch_ID"].'" data-load ="'.$row["Exam_ID"].'" class="card-link sel">Add results</a>
            </span>
          </div>
          <!-- /.direct-chat-infos -->
         
          <div class="direct-chat-text">Class name: 
        '.$row["Class_Name"].'
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->'
        
       
        ;
    }
    ?>
    