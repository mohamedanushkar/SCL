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
                        <li class="breadcrumb-item active">Teacher Management</li>
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
                            <h3 class="card-title">Teacher Management</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <form  id="insert_data" class="col-md-5" >

                                <div class="form-group">
                                    <p class="lbl">ID</p>
                                    <input type="number" required="" class="form-control txt" name="ID" id="ID">
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
                                    <input type="number" required="" class="form-control txt" name="Phone" id="Phone">
                                </div>
                                <div class="form-group">
                                    <p class="lbl">Email</p>
                                    <input type="email" required="" class="form-control txt" name="Email" id="Email">

                                </div>

                                <div class="form-group">

                                    <p class="lbl">BOD</p>
                                    <input class="form-control" require="" name="datepicker" id="datepicker">


                                </div>
                                <div class="form-group">

                                    <p class="lbl">Gender</p>
                                    <select class="form-control" id="Gender" name="Gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <p class="lbl">Subject</p>
                                    <select name="Subject" required="" id="Subject" class="form-control txt">
                                        <?php
                                        include '../../model/Connection.php';
                                        $sql = "SELECT * FROM tbl_Subject";
                                        $res = $conn->query($sql);
                                        if ($res->num_rows > 0) {
                                            $i = 0;
                                            while ($row = $res->fetch_assoc()) {
                                                $i++;
                                                echo '<option value="' . $row["Subject_ID"] . '">' . $row["Name"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" value="0">
                                    <input type="submit" class="btn btn-success" name="userSubmit" id="userSubmit"  value="Save">
                                </div>
                            </form>
                            <div class="form-group col-md-12">
                                <div id="inserted_data" >
                                </div>
                            </div>
                            <script>
                                $(document).ready(function () {

                                    $("#inserted_data").load("../../Controller/Teachers/Fetch.php");


                                    $("#datepicker").datepicker({
                                        changeMonth: true,
                                        changeYear: true,
                                        dateFormat: "yy-mm-dd"
                                    });



                                    $('#insert_data').on('submit', function(event){
                                        event.preventDefault();
                                        
                                        var Name = $("#Name").val();
                                        var pattern = /^[a-zA-Z ]+$/;
                                        if (!Name.match(pattern) || Name == null){
                                            alert("name error");
                                            return false;
                                        }

                                        var Address = $("#Address").val();
                                        if(Address == null){
                                            alert("Address cannot be empty");
                                            return false;
                                        }

                                        var Phone = $("#Phone").val();
                                            if(Phone.toString().length > 10  || Phone.toString().length < 10){
                                            alert("maximum limit is between 0 and 10");
                                            return false;
                                        
                                        }
                                
                                        var BOD = $("#datepicker").val();
                                        if(BOD == ''){
                                            alert("salect BOD");
                                            return false;
                                        }

                                        var id = $("#id").val();
                                        if (id == 0) {
                                            $.ajax({
                                                url: "../../Controller/Teachers/insertStu.php",
                                                method: "post",
                                                data: $('#insert_data').serialize(),
                                                success: function (data) {
                                                    $("<p></p>").html(data).appendTo("#inserted_data");
                                                    $('#insert_data')[0].reset();
                                                    $("#id").val("0");
                                                    $("#inserted_data").load("../../Controller/Teachers/Fetch.php");
                                                }
                                            });
                                        }
                                        else {
                                            $.ajax({
                                                url: "../../Controller/Teachers/updateStu.php",
                                                method: "post",
                                                data: $('#insert_data').serialize(),
                                                success: function (data) {
                                                    $("<p></p>").html(data).appendTo("#insert_data");
                                                    $('#ID').removeAttr('readonly');
                                                    $("#inserted_data").load("../../Controller/Teachers/Fetch.php");
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
                                            url: "../../Controller/Teachers/deletestu.php",
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
<?php
include './../Main/insideFooter.php';
include './../Main/footer.php';

?>
