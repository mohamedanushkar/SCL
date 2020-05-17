<?php

include './../../../model/Connection.php';
session_start();
$Exam_ID = $_POST["id"];
$Stuid = $_SESSION["StuID"];

$query = "SELECT * FROM `tbl_exam_results` INNER JOIN tbl_subject ON tbl_subject.Subject_ID = tbl_exam_results.Subject_ID WHERE tbl_exam_results.Exam_ID = '$Exam_ID' AND tbl_exam_results.Student_ID = '$Stuid'";
$result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


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



        echo "
        <div class='media'>
        <div class='media-body'>
          <h3 class='dropdown-item-title'>
          {$row["Name"]}                       
          </h3>
          <br>
          <p class='text-sm'>{$row["Marks"]}</p>

          <p class='text-sm text-muted'> $status</p>
        </div>
        </div>
        <div class='dropdown-divider'></div>
        ";
    }
?>