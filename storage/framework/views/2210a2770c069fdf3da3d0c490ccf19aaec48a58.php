
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
<link href="<?php echo e(asset('vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset('vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(asset('vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo e(asset('vendors/animate.css/animate.min.css')); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('build/css/custom.min.css')); ?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <?php echo $__env->make('public.message_validate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
      </div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php echo e(Form::open(['route' => 'login'])); ?>

              <h1>Login Form</h1>
              <div>
                <?php echo Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Username']); ?>

              </div>
              <div>
                <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']); ?>

              </div>
              <div class="text-center" style="padding-left:100px;">
                <?php echo Form::submit('Log in', ['class' => 'btn btn-default submit']); ?>

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
              </div>
            <?php echo e(Form::close()); ?>

          </section>
        </div>
      </div>
    </div>
  </body>
</html>
