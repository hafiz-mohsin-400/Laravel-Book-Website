<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | AmericanBooks</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/assets/admin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/assets/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/assets/admin/dist/css/skins/_all-skins.min.css">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>American Books</b> CMS Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg text-info">Sign in to start your session</p>
   @if(Session::has('msg'))
   <div class="alert alert-danger">
   	{{ Session::get('msg') }}
   	</div>
   @endif 
     <form class="form-horizontal" method="POST" action="{{ route('login') }}">
     {{ csrf_field() }}
     <div class="form-group has-feedback">
       <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
       <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
       @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
     </div>
     <div class="form-group has-feedback">
        <div class="input-group">
          <input id="password" type="password" name="password" class="form-control lock_password" required placeholder="Password">
          <span class="input-group-btn">
            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
          </span>          
        </div> 
       <!-- <span><a href="#" class="text-dark" id="icon-click"><i class="fas fa-eye"></i></a></span> -->

       @if ($errors->has('password'))
           <span class="help-block">
               <strong>{{ $errors->first('password') }}</strong>
           </span>
       @endif
     </div>
     <div class="row">
       <div class="col-xs-8">
         <div>
           <label>
             <input type="checkbox"> Remember Me
           </label>
         </div>
       </div>
       <!-- /.col -->
       <div class="col-xs-4">
         <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
       </div>
       <!-- /.col -->
     </div>
   </form>

    <div class="social-auth-links text-center">
      <p class="text-info">- OR -</p>
      <a href="{{ route('login.social' , 'github') }}" class="btn btn-block btn-social btn-github btn-flat"><i class="fa fa-github"></i> Sign in using Github</a>

      <a href="{{ route('login.social' , 'facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>

    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="/assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/assets/admin/dist/js/app.min.js"></script>
<script src="/assets/admin/dist/js/demo.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<script>
  $(document).ready(function($) {
    $(".reveal").on('click',function() {
    var $pwd = $(".lock_password");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
  })
</script>

</body>
</html>
