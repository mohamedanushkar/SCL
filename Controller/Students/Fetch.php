<?php
include '../../model/Connection.php';
$query = "SELECT * FROM tbl_Student";
$result = mysqli_query($conn, $query);
?>
<table id="studentData" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Joined Year</th>
      <th>Options</th>
    </tr>
  </thead>
  <?php
  while ($row = mysqli_fetch_array($result)) {

    echo "        <tr> ";
    echo "<td>{$row["Student_ID"]}</td>";
    echo "<td>{$row["Student_Name"]}</td>";
    echo "<td>{$row["Student_Address"]}</td>";
    echo "<td>{$row["Student_Phone"]}</td>";
    echo "<td>{$row["Student_Email"]}</td>";
    echo "<td>{$row["Gender"]}</td>";
    echo "<td>{$row["BOD"]}</td>";
    echo " <td> <a  class='edit' data-pass='{$row["password"]}' data-id='{$row["Student_ID"]}'> <i  class='fa fa-edit'></i></a> <a  class='del' data-id='{$row["Student_ID"]}'> <i  class='fa fa-trash'></i></a> <a  class='View' data-id='{$row["Student_ID"]}'><i class='fa fa-eye' aria-hidden='true'></i></a></td>";

    echo "           </tr>";
  }
  ?>
</table>
<script>
  $(function() {

    $('#studentData').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
</script>