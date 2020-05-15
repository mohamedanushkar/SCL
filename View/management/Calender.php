<?php
include './../Main/head.php';
include './../Main/links.php';
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
                                <h3 class="card-title">Send Mail</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">


                                    <div id="calendar"></div>
                             
                                <script>

                                    $(document).ready(function() {
                                        var calendar = $('#calendar').fullCalendar({
                                            editable:true,
                                            header:{
                                                left:'prev,next today',
                                                center:'title',
                                                right:'month,agendaWeek,agendaDay'
                                            },
                                            events: '../../Controller/Calender/load.php',
                                            selectable:true,
                                            selectHelper:true,
                                            select: function(start, end, allDay)
                                            {
                                                var title = prompt("Enter Event Title");
                                                if(title)
                                                {
                                                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                                                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                                                    $.ajax({
                                                        url:"../../Controller/Calender/insert.php",
                                                        type:"POST",
                                                        data:{title:title, start:start, end:end},
                                                        success:function()
                                                        {
                                                            calendar.fullCalendar('refetchEvents');
                                                            alert("Added Successfully");
                                                        }
                                                    })
                                                }
                                            },
                                            editable:true,
                                            eventResize:function(event)
                                            {
                                                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                                                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                                                var title = event.title;
                                                var id = event.id;
                                                $.ajax({
                                                    url:"../../Controller/Calender/update.php",
                                                    type:"POST",
                                                    data:{title:title, start:start, end:end, id:id},
                                                    success:function(){
                                                        calendar.fullCalendar('refetchEvents');
                                                        alert('Event Update');
                                                    }
                                                })
                                            },

                                            eventDrop:function(event)
                                            {
                                                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                                                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                                                var title = event.title;
                                                var id = event.id;
                                                $.ajax({
                                                    url:"../../Controller/Calender/update.php",
                                                    type:"POST",
                                                    data:{title:title, start:start, end:end, id:id},
                                                    success:function()
                                                    {
                                                        calendar.fullCalendar('refetchEvents');
                                                        alert("Event Updated");
                                                    }
                                                });
                                            },

                                            eventClick:function(event)
                                            {
                                                if(confirm("Are you sure you want to remove it?"))
                                                {
                                                    var id = event.id;
                                                    $.ajax({
                                                        url:"../../Controller/Calender/delete.php",
                                                        type:"POST",
                                                        data:{id:id},
                                                        success:function()
                                                        {
                                                            calendar.fullCalendar('refetchEvents');
                                                            alert("Event Removed");
                                                        }
                                                    })
                                                }
                                            },

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
