<?php
include 'head.php';
include 'TopNavigation.php';
include "SideNavigation.php";
?>
<!-- Site wrapper -->

  <!-- Navbar -->




  <!-- Content Wrapper. Contains page content -->
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
                <h3 class="card-title">Student Management</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
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
                              <input type="button" class="btn btn-success btn-block" name="userSubmit" id="userSubmit"  value="Save">
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
  <!-- /.content-wrapper -->


  <!-- /.control-sidebar -->

<!-- ./wrapper -->
<?php
include 'insideFooter.php';
include 'footer.php';

?>
