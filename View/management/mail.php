
<!DOCTYPE html>
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
<body style="margin: 20px;">
<p class="CenterTopic">Send Mail</p>
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
</body>
</html>
