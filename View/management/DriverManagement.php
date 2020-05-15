

    <?php
    include './../Main/head.php';
    include './../Main/links.php';
    include './../Main/TopNavigation.php';
    include "./../Main/SideNavigation.php";
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Welcome Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active">Student Management</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Driver Management</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">


                                <button type="button" class="btn btn-success btn-sm" id="AddDriver" name="AddDriver" >Add</button>


                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog" style="margin-right: 300px;">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"></h4>
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

                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                Thank You
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>


    <<?php
    include './../Main/insideFooter.php';
    include './../Main/footer.php';

    ?>

