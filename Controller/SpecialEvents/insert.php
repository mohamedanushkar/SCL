
<?php

//insert.php
include '../../model/Connection.php';
$Grade = $_POST["Grade"];
$Award_Name = $_POST["Award_Name"];
$Description = $_POST["Description"];
$Date = $_POST["Date"];




if ($Grade != '') {

    $sql = "INSERT INTO `Special_Awards`(`Student_ID`, `Award_Name`, `Description`, `Recieved_Date`)VALUES('$Grade','$Award_Name','$Description','$Date')";

    $conn->query($sql);

    $last_id = $conn->insert_id;
    echo "<td>{$last_id}</td>";
    echo "<td>{$Grade}</td>";
    echo "<td>{$Award_Name}</td>";
    echo "<td>{$Description}</td>";
    echo "<td>{$Date}</td>";
    echo " <td> <a  class='edit' data-id='{$row["Special_Awards_ID"]}'> <i  class='fa fa-edit'></i></a></td>";
    echo "<td>  <a  class='del' data-id='{$row["Special_Awards_ID"]}'> <i  class='fa fa-trash'></i></a></td>";
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Date Inserted Successfully');";
    echo "</script>";
} else {

    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('all fields are required');";
    echo "</script>";
}
?>
