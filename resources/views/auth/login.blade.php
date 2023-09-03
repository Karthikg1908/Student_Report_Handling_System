<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Student Report Handling System | Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="../css/util.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <span class="login100-form-title p-b-26"><b>Student Report Handling System</b></span>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-26">
                        Login
                    </span>
                    {{-- <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="email" autofocus>
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <span class="input100" data-placeholder="Email"></span>
                    </div> --}}
                    {{-- <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pass">
                        <input id="pass" type="password" class="input100 @error('pass') is-invalid @enderror" name="pass" required autocomplete="current-pass">

                        @error('pass')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="input100" data-placeholder="pass"></span>
                    </div> --}}
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <p style="text-align:center;"><a href="/forgot-password">Forgot Password</a></p>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
                <p style="text-align:center;">Dont have account? <a href="/reg-user">Register</a></p>
            </div>
        </div>
    </div>

    <!-- pop up modal -->

    {{-- <div id="open-modal-forgotpswd" class="modal-window">
        <div>
            <a href="#modal-close-edit" title="Close" class="modal-close"> &times;</a>
            <form class="login100-form validate-form" method="GET" name="EnterEmail" id="EnterEmail" action="/forgot-password" enctype ="multipart/form-data">
                {{ csrf_field() }}
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
            <div id="Enter_Otp">
                @include('auth.passwords.EnterOTP')
           </div>

           <div id="Enter_new_Password">
               @include('auth.passwords.EnterNewPassword')
           </div>
        </div>
    </div> --}}
<script src="../vendor/jquery-3.2.1.min.js"></script>

<script src="../js/main.js"></script>

<script>
    $("#EnterEmail").on("submit",function(e){
    var Email = document.getElementById("email").value;
        document.getElementById('emailId').innerHTML = Email;
    e.preventDefault();
    });
</script>

<script>
    @if (session('status'))
        swal({
            title: ' {{ session('status') }}',
            icon: "error",
            button: "Done",
        });
    @endif
</script>

<script>
    $("#EnterEmail").on("submit",function(e){
        var dataString=$(this).serialize();
        alert(dataString);
        $.ajax({
            type:"GET",
            url:"/requestOTP",
            data:dataString,
            success:function(data)
            {
                var AObj = JSON.parse(JSON.stringify(data));

            switch (AObj.IsSuccess) {
                case "1":
                swal({
                                    title: 'Email Does not exits',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                case "2":
                                var x1 = document.getElementById("submitOTP");
                        if (x1.style.display === "block") {
                            document.getElementById("EnterEmail").style.display = "block";
                            x1.style.display = "none";
                            } else {
                            document.getElementById("EnterEmail").style.display = "none";
                            x1.style.display = "block";
                            }
                    break;
                    default:
                    swal({
                                    title: 'Something Went Wrong Please Try Again Later',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                }
            }
        });
        e.preventDefault();
    });
</script>

<script>
 $("#submitOTP").on("submit",function(e){
        var dataString=$(this).serialize();
        $.ajax({
        // alert("Requested OTP");
            type:"GET",
            url:"/verifyOTP",
            data:dataString,
            success:function(data)
            {
                // console.log(data);
                var AObj = JSON.parse(JSON.stringify(data));
                // console.log(AObj);
                // alert(AObj);
                // var switchValue =JSON.stringify(AObj.IsSuccess);

            switch (AObj.IsSuccess) {
                case "3":
                swal({
                                    title: 'Email Does not Exits',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                case "5":
                swal({
                                    title: 'Invalid OTP',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                case "4":
                                var x1 = document.getElementById("EnterNewPass");
                        if (x1.style.display === "block") {
                            document.getElementById("submitOTP").style.display = "block";
                            x1.style.display = "none";
                            } else {
                            document.getElementById("submitOTP").style.display = "none";
                            x1.style.display = "block";
                            }
                    break;
                    default:
                    swal({
                                    title: 'Something Went Wrong Please Try Again Later',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                }
            }
        });
        e.preventDefault();
    });
</script>

<script>
    $("#EnterNewPass").on("submit",function(e){
           var dataString=$(this).serialize();
           $.ajax({
           // alert("Requested OTP");
               type:"GET",
               url:"/NewPass",
               data:dataString,
               success:function(data)
               {
                var AObj = JSON.parse(JSON.stringify(data));
                console.log(AObj);
                switch (AObj.IsSuccess) {
                case "6":
                window.location = '/login';
                function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 0);

        window.onunload = function () { null };
                   swal({
                                       title: 'Password Changed Successfully',
                                       icon: "success",
                                       button: "Done",
                                   });
                break;
                case "7":
                swal({
                                    title: 'Password Did not Match',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;

               }
               }
           });
           e.preventDefault();
       });
   </script>
</body>

</html>
