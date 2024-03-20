<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BengkelApps</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box shadow-lg">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary"> <img src="dist/img/Logo-PAL-Login.png" alt="Logo Login PT.Pal">
            <div class="card-header text-center">
                <h1 class="text-lg text-bold">BENGKEL SISTEM HO</h1>
                <h1 class="text-lg">(Hull Outfiting)</h1>
            </div>

            @if(session()->get('error_username'))
            <div class="alert alert-error bg-red alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ session()->get('error_username') }}
            </div>
            @endif
            @if(session()->get('error_password'))
            <div class="alert bg-red alert-red alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ session()->get('error_password') }}
            </div>
            @endif

            <div class="card-body">
                <form action="/login-proses" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mr-1 ml-1">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
