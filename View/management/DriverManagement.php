
<html>
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
    <body style="margin-right: 300px;">
        <p style="background-color: red; padding: 10px; color: white">Student Notice</p>
        <br>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-success btn-sm" id="AddDriver" name="AddDriver" >Add</button>


        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" style="margin-right: 300px;">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <form id="DriverData">
                            <p class="lbl">Grade</p>
                            <input type="text" id="Driver_ID" name="Driver_ID" class="form-control txt">
                            <p class="lbl">Name</p>
                            <input type="text" id="Name" name="Name" class="form-control txt">
                            <p class="lbl">Address</p>
                            <input type="text" id="Address" name="Address" class="form-control txt">
                            <p class="lbl">B.O.D</p>
                            <input type="date" id="Birth_Of_Date" name="Birth_Of_Date" class="form-control txt">
                            <p class="lbl">Phone</p>
                            <input type="number" max="3" id="Phone" name="Phone" class="form-control txt">
                            <p id="demo"></p>
                        </form>
                        <div id="inserted_data">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" id="Save" name="Save" class="btn btn-success" value="Save">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <hr>


        <span id="Notice_Table">
        </span>
        <input type="hidden" id="HiddenID" name="HiddenID">
    </body>
</html>

<script>

    $(document).ready(function () {
        $("#Notice_Table").load("../../Controller/DriverManagement/Fetch.php");


        $(document).on("click", "#AddDriver", function () {
            $('#myModal').modal('show');

        });




        $(document).on("click", "#Save", function () {


            var id = $("#HiddenID").val();
            if (id == 0) {
                $.ajax({
                    url: "../../Controller/DriverManagement/insert.php",
                    method: "post",
                    data: $('#DriverData').serialize(),
                    success: function (data) {
                        $("<tr></tr>").html(data).appendTo("#Notice_Table");
                        $('#DriverData')[0].reset();
                        $("#HiddenID").val("0");
                        $("#Notice_Table").load("../../Controller/DriverManagement/Fetch.php");
                        $('#myModal').modal('hide');
                    }
                });
            }
            else {
                $.ajax({
                    url: "../../Controller/DriverManagement/Update.php",
                    method: "post",
                    data: $('#DriverData').serialize(),
                    success: function (data) {
                        $("<tr></tr>").html(data).appendTo("#Notice_Table");
                        $('#DriverData')[0].reset();
                        $("#HiddenID").val("0");
                        $("#Notice_Table").load("../../Controller/DriverManagement/Fetch.php");
                        $('#myModal').modal('hide');

                    }
                });

            }


        });











        $(document).on("click", ".del", function () {
            var del = $(this);
            var id = $(this).attr("data-id");
            $.ajax({
                url: "../../Controller/DriverManagement/Delete.php",
                method: "post",
                data: {id: id},
                success: function (data) {
                    del.closest("tr").hide();
                    $("<tr></tr>").html(data).appendTo("#Notice_Table");
                }
            });
        });

        $(document).on("click", ".edit", function () {
            var id = $(this).attr("data-id");
            $("#HiddenID").val(id);
            $("#Driver_ID").val(id);
            var name = $(this).closest('tr').find('td:eq(1)').text();
            $("#Name").val(name);
            var name = $(this).closest('tr').find('td:eq(2)').text();
            $("#Address").val(name);
            var name = $(this).closest('tr').find('td:eq(3)').text();
            $("#Birth_Of_Date").val(name);
            var name = $(this).closest('tr').find('td:eq(4)').text();
            $("#Phone").val(name);
            $('#Driver_ID').attr('readonly', true);

            $('#myModal').modal('show');

        });


    });
</script>
<!edit>