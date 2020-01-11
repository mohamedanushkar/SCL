<html>


    <head>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body style="margin: 20px">
        <form  id="insert_data" class="col-md-5" >

            <div class="form-group">
                <p class="lbl">ID</p>
                <input type="text" required="" class="form-control txt" name="ID" id="ID">
            </div>
            <div class="form-group">
                <p class="lbl">Name</p>
                <input type="text" required="" class="form-control txt" name="Name" id="Name">
            </div>
            <div class="form-group">
                <p class="lbl">Address</p>
                <input type="text" required="" class="form-control txt" name="Address" id="Address">
            </div>
            <div class="form-group">
                <p class="lbl">Phone</p>
                <input type="text" required="" class="form-control txt" name="Phone" id="Phone">
            </div>
            <div class="form-group">
                <p class="lbl">Email</p>
                <input type="text" required="" class="form-control txt" name="Email" id="Email">

            </div>
            <div class="form-group">
                <p class="lbl">Grade</p>
                <select name="Grade" required="" id="Grade" class="form-control txt">
                    <?php
                    include '../../model/Connection.php';
                    $sql = "SELECT * FROM tbl_Class";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0) {

                        $i = 0;
                        while ($row = $res->fetch_assoc()) {
                            $i++;
                            echo '<option value="' . $row["Class_ID"] . '">' . $row["Class_Name"] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">

                <p class="lbl">Joined Date</p>
                <input class="form-control" name="datepicker" id="datepicker">


            </div>
            <div class="form-group">

                <p class="lbl">Gender</p>
                <select class="form-control" id="Gender" name="Gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

            </div>
            <div class="form-group">
                <input type="hidden" id="id" name="id" value="0">
                <input type="button" class="btn btn-success" name="userSubmit" id="userSubmit"  value="Save">
            </div>










        </form>

        <div class="form-group col-md-12">
            <div id="inserted_data" >

            </div>
        </div>

        <script>
            $(document).ready(function () {

                $("#inserted_data").load("../../Controller/Students/Fetch.php");


                    $("#datepicker").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "yy-mm-dd"
                    });


                $('#employee_data').DataTable();
                $('#userSubmit').click(function () {
                    var id = $("#id").val();
                    if (id == 0) {
                        $.ajax({
                            url: "../../Controller/Students/insertStu.php",
                            method: "post",
                            data: $('#insert_data').serialize(),
                            success: function (data) {
                                $("<p></p>").html(data).appendTo("#inserted_data");
                                $('#insert_data')[0].reset();
                                $("#id").val("0");
                                $("#inserted_data").load("../../Controller/Students/Fetch.php");
                            }
                        });
                    }
                    else {
                        $.ajax({
                            url: "../../Controller/Students/updateStu.php",
                            method: "post",
                            data: $('#insert_data').serialize(),
                            success: function (data) {
                                $("<p></p>").html(data).appendTo("#insert_data");
                                $('#ID').removeAttr('readonly');
                                $("#inserted_data").load("../../Controller/Students/Fetch.php");
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
                        url: "../../Controller/Students/deletestu.php",
                        method: "post",
                        data: {id: id},
                        success: function (data) {

                            del.closest("tr").hide();
                            $("<p></p>").html(data).appendTo("#insert_data");
                        }
                    });
                });

                $(document).on("click", ".edit", function () {

                    var id = $(this).attr("data-id");

                    var grade = $(this).attr("data-grade");


                    $("#id").val(id);

                    $("#ID").val(id);


                    var name = $(this).closest('tr').find('td:eq(1)').text();
                    $("#Name").val(name);
                    var name = $(this).closest('tr').find('td:eq(2)').text();
                    $("#Address").val(name);
                    var name = $(this).closest('tr').find('td:eq(3)').text();
                    $("#Phone").val(name);
                    var name = $(this).closest('tr').find('td:eq(4)').text();
                    $("#Email").val(name);



                    $("#Grade").val(grade);


                    var name = $(this).closest('tr').find('td:eq(7)').text();
                    $("#Date").val(name);
                    $('#ID').attr('readonly', true);

                });

            });
        </script>

    </body>


</html>
