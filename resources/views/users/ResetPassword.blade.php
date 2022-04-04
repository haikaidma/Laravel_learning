<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
</head>

<body>
    <form action="" method="post" style="width:600px;" class="border border-primary border-2 m-auto p-2" id="formreset">
        <h4 style="text-align: center;">Đổi mật khẩu</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <h1>Form Register</h1>
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="password">Nhập Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="passwordchange"
                    placeholder="Enter password">
                <label for="repassword">Nhập lại Mật khẩu</label>
                <input type="password" class="form-control" id="repassword" name="repasswordchange"
                    placeholder="Enter Repassword">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Gửi yêu cầu</button>
            <br>
            <br>
            <a href="login-user" class="btn btn-success">Đăng nhập</a>
    </form>
</body>

</html>
