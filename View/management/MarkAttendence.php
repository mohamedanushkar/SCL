<!DOCTYPE html>

<?php
include '../../model/Connection.php';




function FillGrade($conn) {
    $output = '';
    $sql = "SELECT * FROM tbl_Class";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Class_ID"] . '">' . $row["Class_Name"] . '</option>';
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

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    </head>

    <body style="margin: 20px">
         <p class="CenterTopic">Mark Attendance</p>

<div class="form-group">
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">Mark
             </button>
         </div>

         <div  class="form-group">
             <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <form id="SearchData">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <div class="form-group">
                                     <select id="SelectClass" class="form-control" name="SelectClass">
                                         <?php
                                         echo FillGrade($conn);
                                         ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <button type="button" id="Search" name="Search" class="btn btn-info">search</button>
                                 </div>
                                 <div id="table" class="form-group">



                                 </div>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" id="Save" name="Save" class="btn btn-primary">Save changes</button>
                             </div>
                         </form>

                     </div>
                 </div>
             </div>

             <a href=""></a>
         </div>

         <!-- Modal -->
      <div id="load" class="form-group">

         </div>
         <script>
             $(document).ready(function () {

                 $('#employee_data').DataTable();

                 $("#load").load("../../Controller/MarkAttendence/FetchTable.php");

                 $('#Search').click(function () {
                     $.ajax({
                         url: "../../Controller/MarkAttendence/fetch.php",
                         method: "POST",
                         data: $('#SearchData').serialize(),
                         success: function (data) {
                             $('#table').html(data);
                             $("#load").load("../../Controller/MarkAttendence/FetchTable.php");

                         }
                     });
                 });

                 $('#Save').click(function () {

                     $.ajax({
                         url: "../../Controller/MarkAttendence/insert.php",
                         method: "POST",
                         data: $('#SearchData').serialize(),
                         success: function (data) {
                             $('#employee_data').html(data);
                             $("#load").load("../../Controller/MarkAttendence/FetchTable.php");
                             $('#Modal').modal('hide');
                         }
                     });
                 });
             });

         </script>
    </body>
</html>

