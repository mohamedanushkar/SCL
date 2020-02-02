
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
    <body style="margin:20px">
    <p class="CenterTopic">Driver Management</p>
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
                            <div class="form-group">
                                <p class="lbl">Driver ID</p>
                                <input type="text" id="Driver_ID" name="Driver_ID" class="form-control txt">
                            </div>
                            <div class="form-group">
                                <p class="lbl">Name</p>
                                <input type="text" id="Name" name="Name" class="form-control txt">
                            </div>
                            <div class="form-group">
                                <p class="lbl">Address</p>
                                <input type="text" id="Address" name="Address" class="form-control txt">
                            </div>
                            <div class="form-group">
                                <p class="lbl">Phone</p>
                                <input type="number" id="Phone" name="Phone" class="form-control txt">
                            </div>
                            <div class="form-group">
                                <p class="lbl">E-Mail</p>
                                <input type="email" max="3" id="Phone" name="Phone" class="form-control txt">

                            </div>
                            <div class="form-group">
                                <p class="lbl">Joined Date</p>
                                <input class="form-control" name="datepicker" id="datepicker">
                            </div>
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
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });


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