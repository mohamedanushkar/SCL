<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./../includes/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../includes/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../includes/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../includes/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../includes/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../includes/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../includes/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../includes/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../includes/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../includes/css/util.css">
    <link rel="stylesheet" type="text/css" href="./../includes/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" >
					<span class="login100-form-title-1">
						Sign In
					</span>
            </div>

            <form action="./Controller/loginverify/login.php" method="post" class="login100-form validate-form">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="UserName" placeholder="Enter username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="Password" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>



                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="./../includes/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="./../includes/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="./../includes/vendor/bootstrap/js/popper.js"></script>
<script src="./../includes/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="./../includes/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="./../includes/vendor/daterangepicker/moment.min.js"></script>
<script src="./../includes/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="./../includes/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="./../includes/js/main.js"></script>

</body>
</html>