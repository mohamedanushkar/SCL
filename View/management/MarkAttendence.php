<!DOCTYPE html>

<?php
include '../../model/Connection.php';


function FillGrade($conn) {
    $output = '';
    $sql = "SELECT * FROM Grade";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Grade_ID"] . '">' . $row["Grade_Name"] . '</option>';
    }
    return $output;
}
?>
<html>


    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../../Assets/CSS/Form.css" rel="stylesheet" type="text/css"/>
   
    </head>

    <body style="margin-right: 300px">
         <p style="background-color: red; padding: 10px; color: white">Mark Attendence</p>
   
        <br />


        <div class="table-responsive">
            <form id="insert_data" style="margin: 10px">

                Exam Name:


                <select name="Grade_ID" id="Grade_ID" class="form-control Exam_ID txt">
<?php
echo FillGrade($conn);
?>
                </select>


                <div align="center">
                    <button type="button" name="save" id="save" class="btn btn-info ">Search</button>
                </div>
                
                <br>
                <div id="crud_table">

                  
                </div>
                
                <br />
              

            </form>

        </div>


    </body>
   
</html>

<script>
    $(document).ready(function () {    


       
        $('#save').click(function () {

            $.ajax({
                url: "../../Controller/MarkAttendence/fetch.php",
                method: "POST",
                data: $('#insert_data').serialize(),
                success: function (data) {
                    $('#crud_table').html(data);
                }
            });
        }); 
    });

</script>
