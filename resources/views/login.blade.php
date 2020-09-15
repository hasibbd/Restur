
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Restur: The Restaurant Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="{{'image/backend/logo.webp'}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/assets/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('backend/assets/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/main.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <b>Restur</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        @if(Session::get('msg'))
            <p class="lead text-danger">* {{Session::get('msg')}}</p>
        @endif
      <form action="{{url('/logincheck')}}" method="post">
          @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email/ID" name="email" id="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
Remember Me
</label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
    <div class="card">
        <div class="card-body">
            <p>Get Account Details</p>
            <div class="form-group">
                <button class="btn btn-primary m-1 needid" value="1">Admin</button>
                <button class="btn btn-success  m-1 needid" value="2">Waiter1</button>
                <button class="btn btn-success  m-1 needid" value="3">Waiter2</button>
                <button class="btn btn-secondary  m-1 needid" value="4">Kitchen1</button>
                <button class="btn btn-secondary  m-1 needid" value="5">Kitchen2</button>
            </div>

        </div>
        <div class="card-footer">
            <p>Email:<a href="mailto:hasib.0951@gmail.com"> hasib.0951@gmail.com</a></p>
        </div>
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('backend/assets/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<script>
    $('.needid').click(function(){
        var t = $(this).val();

        switch (t) {
        case '1':
            $('#email').val("admin@email.com");
            $('#pass').val("123456");
            break;
            case '2':
                $('#email').val("waiter1@email.com");
                $('#pass').val("123456");
                break;
            case '3':
                $('#email').val("waiter2@email.com");
                $('#pass').val("123456");
                break;
            case '4':
                $('#email').val("kitchen1@email.com");
                $('#pass').val("123456");
                break;
            case '5':
                $('#email').val("kitchen2@email.com");
                $('#pass').val("123456");
                break;
        default:

        }

    });

</script>



</body>
</html>

