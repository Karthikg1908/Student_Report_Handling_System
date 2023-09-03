<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Student Report Handling System | Register Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body>
    <!-- <div style="text-align: center; background-color: #F2F2F2;"><h2>Alumini Management System</h2></div> -->
    <div class="limiter">
        <div class="container-login100">
            <form method="post" action="/newUsers" enctype="multipart/form-data">
            <div class="wrap-login100">
                <span class="login100-form-title p-b-26"><b>Student Report Handling System</b></span>
                    <span class="login100-form-title p-b-26">
                        Register
                    </span>
                    @csrf
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="phone" autofocus>
                        <span class="focus-input100" data-placeholder="Phone number"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="email" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">

                        <input class="input100" type="password" name="pass">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Re-Enter password">

                        <input class="input100" type="password" name="confirmPassword">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Register
                            </button>
                        </div>
                    </div>
                <p style="text-align:center;">Already have account? <a href="/">Login</a></p>
            </div>
        </form>
        </div>
    </div>
    <script src="../vendor/jquery-3.2.1.min.js"></script>

    <script src="../js/main.js"></script>

    <script>
        @if (session('failure'))
            swal({
            title: ' {{ session('failure') }}',
            icon: "warning",
            button: "Done",
            });
        @endif
    </script>
    <script>
        @if (session('status'))
            swal({
            title: ' {{ session('status') }}',
            icon: "success",
            button: "Done",
            });
        @endif
    </script>

</body>

</html>
