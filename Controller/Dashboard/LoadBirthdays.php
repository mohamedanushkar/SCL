<?php
include '../../model/Connection.php';

$sql = "SELECT * FROM tbl_student WHERE DATE_ADD(BOD, INTERVAL YEAR(CURDATE())-YEAR(BOD) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(BOD),1,0) YEAR) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 9 DAY) OR MONTH(BOD) = MONTH(NOW()) AND DAY(BOD) = DAY(NOW()) ORDER by tbl_student.BOD ASC limit 4";


$result = mysqli_query($conn, $sql);
?>
<table id="employee_data" class="table table-striped table-valign-middle">

    <?php

    while ($row = mysqli_fetch_array($result)) {


        echo '<tr><td><img src="./../../includes/dist/img/pancakes_96px.png" alt="Product 1" class="img-circle img-size-32 mr-2">';

        $dataaaa = $row["BOD"];


        $time = strtotime($dataaaa);
        $month = date("d", $time) . " Of " . date("F", $time);

        echo "{$row["Student_Name"]}'s Birthday is on";
        echo ' <span class="badge bg-danger">';

        echo $month;
        echo '</span>';

        echo ' </td><tr> ';

    }

    ?>
</table>
