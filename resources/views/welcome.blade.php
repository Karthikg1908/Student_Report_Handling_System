<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Student Report Handling System | Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="../css/util.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <span class="login100-form-title p-b-26"><b>Student Report Handling System</b></span>
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-26">
                        Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        {{-- <input class="input100" type="text" name="email" autofocus> --}}
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <span class="input100" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        {{-- <input class="input100" type="password" name="pass"> --}}
                        <input id="pass" type="password" class="input100 @error('pass') is-invalid @enderror" name="pass" required autocomplete="current-pass">

                        @error('pass')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="input100" data-placeholder="pass"></span>
                    </div>
                    <p style="text-align:center;"><a href="#open-modal-forgotpswd">Forgot Password</a></p>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
                <p style="text-align:center;">Dont have account? <a href="register.html">Register</a></p>
            </div>
        </div>
    </div>

    <!-- pop up modal -->
    <div id="open-modal-forgotpswd" class="modal-window">
        <div>
            <a href="#modal-close-edit" title="Close" class="modal-close"> &times;</a>
            <form class="login100-form validate-form">
                <span class="login100-form-title p-b-26">
                    Request OTP
                </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                    <input class="input100" type="text" name="email" autofocus>
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Request OTP
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
{{-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> --}}

{{-- <script src="js/main.js"></script> --}}
</body>

</html>
