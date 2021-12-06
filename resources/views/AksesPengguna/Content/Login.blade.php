<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medikasoft</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    <style>
    body {
        background-image: url("images/bg.jpg");
        background-repeat: no-repeat;
        background-size: cover
    }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                Login
            </div>
            <!-- Pesan Error -->
            @if(\Session::has('alert-success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-sign-out-alt"></i><b> Success!!</b></h6>
                {{Session::get('alert-success')}}
            </div>
            @endif
            @if(\Session::has('alert-danger'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-sign-out-alt"></i><b> Gagal!!</b></h6>
                {{Session::get('alert-danger')}}
            </div>
            @endif
            <!-- /.Pesan Error -->

            <div class="card-body">
                <p class="login-box-msg"><img src="{{asset('images/key.png')}}"></p>
                <form action=" {{route('postlogin')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-group mb-3">
                        <input type="text" name="uname" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pwd" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4 center">
                            <button type="submit" class="btn btn-primary btn-block">OK</button>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Cancel</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>

</html>