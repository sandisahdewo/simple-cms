
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Haltec CMS | Login Aplikasi</title>

    <!-- Bootstrap -->
    <script type="text/javascript">
</script>
<link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        @include('public.message_validate') 
      </div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            {{ Form::open(['route' => 'login']) }}
              <h1>Login Form</h1>
              <div>
                {!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Username']) !!}
              </div>
              <div>
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
              </div>
              <div class="text-center" style="padding-left:100px;">
                {!! Form::submit('Log in', ['class' => 'btn btn-default submit']) !!}
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
              </div>
            {{ Form::close() }}
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
