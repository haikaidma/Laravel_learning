<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>

<body>
    <!-- main -->
    <div class="center-container">
        <!--header-->
        <div class="header-top">
            <h1>Data Management</h1>
        </div>
        <!--//header-->
        <div class="main-content-agile">
            <div class="sub-main-w3">
                <div class="wthree-pro">
                    <h2>ADMIN</h2>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('login.user') }}" method="post" id="myForm">
                    @csrf
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="user-name">
                        <input placeholder="Email" name="email"
                            class="{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"
                            value="{{ old('email') }}">
                        {{-- @if ($errors->has('email'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif --}}
                    </div>
                    <br>
                    <div class="pass-word">
                        <input placeholder="Password" name="password" class="pass" type="password" value="">
                    </div>
                    <br>
                    <div class="remember-me">
                        <label for="remember-me" style="color:white;">Remember me</label>
                        <input name="remember" type="checkbox" value="1">
                    </div>
                    <br>
                    <a class="reg" href="/register-user">Do not have an account?</a>
                    <br>
                    <div class="bnt-reg-sub">
                        <div class="submit">
                            <button class="btn-2" type="submit" name="submit">Sign In</button>
                            <a class="reg" href="forgot-password">Forgot password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--//main-->
        <!--footer-->
        <div class="footer">
            <p>&copy; 2022 NINE PLUS SOLUTIONS | Design by <a href="https://www.facebook.com/haigd2000/">Haikadima</a>
            </p>
        </div>
        <!--//footer-->
    </div>
</body>

</html>
