<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
    <link href="../../Assets/CSS/Form.css" rel="stylesheet" type="text/css"/>  
</head>
<body style="margin-right: 300px">

    <p style="background-color: red; padding: 10px; color: white">Special Awards</p>
    <form id="insert_data" style="width: 500px; padding: 20px; background-color: #f1f1f1;">

        <p class="lbl">Grade</p>
        <select name="Grade" id="Grade" class="form-control txt">
            <?php
            include '../../model/Connection.php';
            $sql = "SELECT * FROM Student";
            $res = $conn->query($sql);
            if ($res->num_rows > 0) {

                $i = 0;
                while ($row = $res->fetch_assoc()) {
                    $i++;
                    echo '<option value="' . $row["id"] . '">' . 'Name: ' . $row["Student_Name"] . ' Grade: ' . $row["Grade_ID"] . '</option>';
                }
            }
            ?>
        </select>

        <p class="lbl">Award Name</p>
        <input type="text" id="Award_Name" name="Award_Name" class="form-control txt">

        <p class="lbl">Description</p>
        <input type="text" id="Description" name="Description" class="form-control txt">

        <p class="lbl">Date</p>
        <input type="date" id="Date" name="Date" class="form-control txt">

        <input type="hidden" id="id" name="id" value="0">
        <input type="button" class="btn btn-success" name="userSubmit" id="userSubmit"  value="Save">
    </form>
    <div id="Data">
        
    </div>
</body>

<script>

    $(document).ready(function () {
        $("#Data").load("../../Controller/SpecialEvents/SearchStudent.php");



        $('#userSubmit').click(function () {
            var id = $("#id").val();
            if (id == 0) {
                $.ajax({
                    url: "../../Controller/SpecialEvents/insert.php",
                    method: "post",
                    data: $('#insert_data').serialize(),
                    success: function (data) {
                        $("<tr></tr>").html(data).appendTo(".table");
                        $('#insert_data')[0].reset();
                        $("#id").val("0");
                    }
                });
            }
            else {
                $.ajax({
                    url: "../../Controller/SpecialEvents/Update.php",
                    method: "post",
                    data: $('#insert_data').serialize(),
                    success: function (data) {
                         $("<p></p>").html(data).appendTo("#insert_data");
                        $('#ID').removeAttr('readonly');
                        $("#Data").load("../../Controller/SpecialEvents/SearchStudent.php");
                        $('#insert_data')[0].reset();
                        $("#id").val("0");

                    }
                });
                $('#ID').removeAttr('readonly');
            }
        });


        $(document).on("click", ".del", function () {
            var del = $(this);
            var id = $(this).attr("data-id");

            $.ajax({
                url: "../../Controller/SpecialEvents/Delete.php",
                method: "post",
                data: {id: id},
                success: function (data) {
                     $("<p></p>").html(data).appendTo("#insert_data");
                    del.closest("tr").hide();
                }
            });
        });

        $(document).on("click", ".edit", function () {
            var del = $(this);
            var id = $(this).attr("data-id");




            $("#id").val(id);

            


            var name = $(this).closest('tr').find('td:eq(1)').text();
            $("#Grade").val(name);
            var name = $(this).closest('tr').find('td:eq(2)').text();
            $("#Award_Name").val(name);
            var name = $(this).closest('tr').find('td:eq(3)').text();
            $("#Description").val(name);
            var name = $(this).closest('tr').find('td:eq(4)').text();
            $("#Date").val(name);
           
           

        });

    });
</script>
