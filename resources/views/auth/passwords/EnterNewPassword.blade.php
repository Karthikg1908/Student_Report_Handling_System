<form class="login100-form validate-form" id="EnterNewPass" action="/forgotPassword" method="get" enctype ="multipart/form-data">
    {{ csrf_field() }}
    <div id="myDIV3">
        <span class="login100-form-title p-b-26">
            Enter New Password
        </span>
        <div class="wrap-input100 validate-input" data-validate="new password">
            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" id="password"
                name="password" required autocomplete="off" autofocus>
            <span class="focus-input100" data-placeholder="Password"></span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input" data-validate="re-enter password">
            <input class="input100 @error('RePassword') is-invalid @enderror" type="password" name="RePassword" id="RePassword"
                name="password" required autocomplete="off">
            <span class="focus-input100" data-placeholder="Re-Enter Password"></span>
            @error('RePassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" type=submit name="EnterPass" id="EnterPass" value="EnterPass">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>
