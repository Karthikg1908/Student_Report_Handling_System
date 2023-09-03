<form class="login100-form validate-form" method="GET" name="submitOTP" id="submitOTP" action="/forgotPassword" enctype ="multipart/form-data">
    {{ csrf_field() }}
    <div id="myDIV4">

        <div class="wrap-input100 validate-input" data-validate="Enter Code">
            <input class="input100" type="text" name="OTP" id="OTP" autocomplete="off" oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" class="form-control form-control-user @error('OTP') is-invalid @enderror">
            <span class="focus-input100" data-placeholder="OTP"></span>
            @error('OTP')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
            @enderror
            {{-- <span class="focus-input100" data-placeholder="&#xf191;"></span> --}}
        </div>

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn" type="submit" name="verifyOTP" id="verifyOTP" value="verifyOTP">
                        Verify OTP
                    </button>
                </div>
            </div>
        </div>
    </form>
