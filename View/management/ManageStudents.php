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
        <script type="text/javascript" src="./../../Assets/JS/qrcode.min.js"></script>
        <script type="text/javascript" src="./../../Assets/JS/canvas2image.js"></script>
        <script type="text/javascript" src="./../../Assets/JS/html2canvas.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body style="margin: 20px;">
    <p class="CenterTopic">Student Management</p>
    <div >
        <form id="insert_data" class="col-md-5" >

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
                    $sql = "SELECT * FROM `tbl_batch` INNER JOIN tbl_class ON tbl_class.Class_ID = tbl_batch.Class_ID";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0) {
                        $i = 0;
                        while ($row = $res->fetch_assoc()) {
                            $i++;
                            echo '<option value="' . $row["Batch_ID"] . '">' . $row["Class_Name"] . ' ' . $row["Batch_Number"] .'</option>';
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

    </div>

    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <p><span id="SpanID"></span>'s ID</p>
                </div>
                <div  id="Details" class="modal-body">
                    <div class="print_div">
                        <div class="row" style="background-color: rgba(255,255,0,0.08); padding: 20px">
                            <div class="col-md-6">
                                <b> <p>MNS Student ID</p></b>
                                <hr>
                                <p>ID: <span id="PID"></span></p>
                                <hr>
                                <p>Name: <span id="PName"></span></p>
                                <hr>
                                <p>Address: <span id="PAddress"></span></p>
                                <hr>
                                <p>Joined Year: <span id="PJoinedYear"></span></p>
                                <span id="prevew"></span>
                            </div>
                            <div class="col-md-6">
                                <div id="qrcode" style="width:200px; height:200px; margin-top:15px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-warning" id="Print" value="Download ID">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" id="HiddenID" name="HiddenID">
                </div>
            </div>
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

                $(document).on("click", ".View", function () {
                    var ID = $(this).closest('tr').find('td:eq(0)').text();
                    var name = $(this).closest('tr').find('td:eq(1)').text();
                    var Address = $(this).closest('tr').find('td:eq(2)').text();
                    var Phone = $(this).closest('tr').find('td:eq(3)').text();
                    var JoinedYear = $(this).closest('tr').find('td:eq(7)').text();
                    var all = 'ID \t: ' +ID +'\n' + 'Name \t: ' + name + '\n' + 'Address\t: '+ Address + '\n' +'Phone\t: '+ Phone;
                    qrcode.makeCode(all);
                    $("#PID").html(ID);
                    $("#SpanID").html(name);
                    $("#PName").html(name);
                    $("#PAddress").html(Address);
                    $("#PJoinedYear").html(JoinedYear);
                    $('#myModal2').modal('show');
                });

                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    width : 200,
                    height : 200,
                });

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

                $('#Print').on('click', function() {
                    var elm = $('.print_div').get(0);
                    var lebar = "600";
                    var tinggi = "450";
                    var type = "png";
                    var filename =  "imgxfd";
                    html2canvas(elm).then(function (canvas) {
                        Canvas2Image.saveAsImage(canvas, lebar, tinggi, type,filename);
                    });
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
