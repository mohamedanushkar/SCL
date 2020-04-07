<?php
include '../../model/Connection.php';
function FillBatch($conn)
{
    $output = '';
    $sql = "SELECT * FROM `tbl_batch` INNER JOIN tbl_class ON tbl_class.Class_ID = tbl_batch.Class_ID";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Batch_ID"] . '">' . $row["Class_Name"] . ' ' . $row["Batch_Number"] . '</option>';
    }
    return $output;
}


function Subjects($conn)
{
    $output = '';
    $sql = "SELECT * FROM `tbl_subject`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["Subject_ID"] . '">' . $row["Name"] . '</option>';
    }
    return $output;
}

?>

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
                            <h3 class="card-title">Exam Results</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"
                                        data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <form method="post" id="insert_form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Select Batch</label>
                                        <select id="Batch" name="Batch" class="form-control">
                                            <option>-- Select Batch --</option>
                                            <?php
                                            echo FillBatch($conn);
                                            ?>
                                        </select>
                                    </div>

                                </div>


                                <div class="modal fade" id="AddResultsMOdal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" name="BatchNumber" id="BatchNumber"
                                                               class="form-control"
                                                               readonly placeholder="First name">
                                                    </div>
                                                    <div class="col">
                                                        <select name="StudentList" id="StudentList"
                                                                class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="loadSubjects">

                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button id="SaveResults" type="button" class="btn btn-primary">Add
                                                    Results
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div id="Load_Exam_Main">

                                </div>

                            </form>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-xl">Extra large modal
                            </button>

                            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
                                 aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="div1">
                                                <select id="Batch2" name="Batch2" class="form-control">
                                                    <option>-- Select Batch --</option>
                                                    <?php
                                                    echo FillBatch($conn);
                                                    ?>
                                                </select>

                                                <div class="invoice p-3 mb-3">
                                                    <!-- title row -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h4>
                                                                <i class="fas fa-globe"></i> AdminLTE, Inc.
                                                                <small class="float-right">Date: 2/10/2014</small>
                                                            </h4>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- info row -->
                                                    <div class="row invoice-info">
                                                        <div class="col-sm-4 invoice-col">
                                                            From
                                                            <address>
                                                                <strong>Admin, Inc.</strong><br>
                                                                795 Folsom Ave, Suite 600<br>
                                                                San Francisco, CA 94107<br>
                                                                Phone: (804) 123-5432<br>
                                                                Email: info@almasaeedstudio.com
                                                            </address>
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-4 invoice-col">
                                                            To
                                                            <address>
                                                                <strong>John Doe</strong><br>
                                                                795 Folsom Ave, Suite 600<br>
                                                                San Francisco, CA 94107<br>
                                                                Phone: (555) 539-1037<br>
                                                                Email: john.doe@example.com
                                                            </address>
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-4 invoice-col">
                                                            <b>Invoice #007612</b><br>
                                                            <br>
                                                            <b>Order ID:</b> 4F3S8J<br>
                                                            <b>Payment Due:</b> 2/22/2014<br>
                                                            <b>Account:</b> 968-34567
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->

                                                    <!-- Table row -->
                                                    <div class="row">
                                                        <div class="col-12 table-responsive">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th>Qty</th>
                                                                    <th>Product</th>
                                                                    <th>Serial #</th>
                                                                    <th>Description</th>
                                                                    <th>Subtotal</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Call of Duty</td>
                                                                    <td>455-981-221</td>
                                                                    <td>El snort testosterone trophy driving gloves
                                                                        handsome
                                                                    </td>
                                                                    <td>$64.50</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Need for Speed IV</td>
                                                                    <td>247-925-726</td>
                                                                    <td>Wes Anderson umami biodiesel</td>
                                                                    <td>$50.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Monsters DVD</td>
                                                                    <td>735-845-642</td>
                                                                    <td>Terry Richardson helvetica tousled street art
                                                                        master
                                                                    </td>
                                                                    <td>$10.70</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Grown Ups Blue Ray</td>
                                                                    <td>422-568-642</td>
                                                                    <td>Tousled lomo letterpress</td>
                                                                    <td>$25.99</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->

                                                    <div class="row">
                                                        <!-- accepted payments column -->
                                                        <div class="col-6">
                                                            <p class="lead">Payment Methods:</p>
                                                            <img src="../../dist/img/credit/visa.png" alt="Visa">
                                                            <img src="../../dist/img/credit/mastercard.png"
                                                                 alt="Mastercard">
                                                            <img src="../../dist/img/credit/american-express.png"
                                                                 alt="American Express">
                                                            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                                                            <p class="text-muted well well-sm shadow-none"
                                                               style="margin-top: 10px;">
                                                                Etsy doostang zoodles disqus groupon greplin oooj voxy
                                                                zoodles, weebly ning heekya handango imeem
                                                                plugg
                                                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt
                                                                zimbra.
                                                            </p>
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-6">
                                                            <p class="lead">Amount Due 2/22/2014</p>

                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th style="width:50%">Subtotal:</th>
                                                                        <td>$250.30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tax (9.3%)</th>
                                                                        <td>$10.34</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Shipping:</th>
                                                                        <td>$5.80</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Total:</th>
                                                                        <td>$265.24</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->

                                                    <!-- this row will not appear when printing -->
                                                    <div class="row no-print">
                                                        <div class="col-12">
                                                            <a href="invoice-print.html" target="_blank"
                                                               class="btn btn-default"><i class="fas fa-print"></i>
                                                                Print</a>
                                                            <button type="button" class="btn btn-success float-right"><i
                                                                        class="far fa-credit-card"></i> Submit
                                                                Payment
                                                            </button>
                                                            <button type="button" class="btn btn-primary float-right"
                                                                    style="margin-right: 5px;">
                                                                <i class="fas fa-download"></i> Generate PDF
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary" onclick="PrintC('div1')">Save
                                                changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>

                                function PrintC(el) {
                                    var prtContent = document.getElementById(el);
                                    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                                    WinPrint.document.write(prtContent.innerHTML);
                                    WinPrint.document.close();
                                    WinPrint.focus();
                                    WinPrint.print();
                                    WinPrint.close();
                                }

                                $(document).ready(function () {
                                    $(".datepicker").datepicker({
                                        changeMonth: true,
                                        changeYear: true,
                                        dateFormat: "yy-mm-dd"
                                    });


                                    $("#Batch").change(function () {

                                        $.ajax({
                                            url: "./../../Controller/Results/Results.php",
                                            method: "post",
                                            data: $('#insert_form').serialize(),
                                            success: function (data) {
                                                $("#Load_Exam_Main").html(data);
                                            }
                                        });
                                    });

                                    $("#StudentList").change(function () {


                                    });
                                    $(document).on("click", ".select", function () {

                                        var id = $(this).attr("data-id");

                                        var load = $(this).attr("data-load");
                                        $('#BatchNumber').val(load);


                                        $.ajax({
                                            url: "./../../Controller/Results/LoadNameList.php",
                                            method: "POST",
                                            data: {id22: id},

                                            success: function (data) {
                                                $('#StudentList').html(data);

                                            }
                                        });

                                        $('#AddResultsMOdal').modal('show');
                                    });


                                });
                            </script>
                        </div>

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
<!-- /.content-wrapper --
<?php
include './../Main/insideFooter.php';
include './../Main/footer.php';

?>



