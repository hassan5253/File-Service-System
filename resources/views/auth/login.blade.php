
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha512-rRQtF4V2wtAvXsou4iUAs2kXHi3Lj9NE7xJR77DE7GHsxgY9RTWy93dzMXgDIG8ToiRTD45VsDNdTiUagOFeZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/custom/css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/custom/css/main.css') }}">
<section style="background-image: url('assets/img/bg-011.jpg');width: 100%;height: 100%;background-position: center;background-size: cover;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="{{ url('/login') }}" method="POST" class="login100-form validate-form">
                    <input type="hidden" name="date" id="date" value="{{ date("Y-m-d") }}">
                    {{ csrf_field() }}
                    <span class="login100-form-logo">
						<img alt="" style="width: 80%" src="assets/img/folder-1.png">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						BlockList Web Service
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="text" name="email" id="email" placeholder="Username" value="{{ old('email') }}">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" id="password"  placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong style="color:red;">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('password'))
                        <span class="help-block">
							<strong style="color:red;">{{ $errors->first('password') }}</strong>
						</span>
                    @endif

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-90">
                        <a class="txt1" href="{{ url('/register') }}">
                           Don't have an account
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

<script>

    function loader()
    {
        var div = document.getElementById('colorgraph');
        div.innerHTML = '';
        div.innerHTML += '<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="loader"></div></div></div>';
    }
</script>