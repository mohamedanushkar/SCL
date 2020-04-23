<?php
include './../Main/head.php';
include './../Main/TopNavigation.php';
include "./../Main/SideNavigation.php";
?>




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
                            <li class="breadcrumb-item active">Send Mail</li>
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
                                <h3 class="card-title">Send Mail</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="Mail" >
                                    <div class="form-row">
                                        <div class="form-group col-md-4" >
                                            <label>Receivers Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                                </div>
                                                <input type="text" id="name" name="name" placeholder="Sender Name" class="form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Enter Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                                </div>
                                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email"/>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Enter Subject</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                                </div>
                                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter Subject"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Enter Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Enter Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="button" id="send" name="send" value="Send" class="btn btn-warning btn-sm btn-block" />
                                    </div>
                                    <div id="message">

                                    </div>
                                </form>

                                <script>
                                    $(document).ready(function () {
                                        $('#send').click(function () {
                                            $.ajax({
                                                url: "./../../Controller/SendMail/index.php",
                                                method: "post",
                                                data: $('#Mail').serialize(),
                                                beforeSend: function() {
                                                    $('#send').val('Sending...');
                                                    $('#send').attr('disabled','disabled');
                                                },
                                                success: function (data) {
                                                    $('#Mail')[0].reset();
                                                    $('#send').val('Send');
                                                    $('#send').attr('disabled', false);
                                                    $("<p></p>").html(data).appendTo("#message");

                                                }
                                            });
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
    <!-- /.content-wrapp
<?php
include './../Main/insideFooter.php';
include './../Main/footer.php';

?>