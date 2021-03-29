<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

  <!-- use bootstrap and css -->
  <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">

  <style>
  body {
    margin: 0;
    padding: 0;
    background-color: #17a2b8;
    height: 100vh;
  }

  #login .container #login-row #login-column #login-box {
    margin-top: 65px;
    max-width: 600px;
    height: 320px;
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;

  }


  #login .container #login-row #login-column #login-box #login-form {
    padding: 20px;
  }

  #login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -85px;
  }

  .title-form {
    text-align: center;
    margin-top: 20px;
    font-size: 50px;
  }

  .register-style {
    box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
    border-radius: 5px;
  }
  </style>
</head>

<body>
  <div id="login">
    <h3 class="text-center text-white pt-5 title-form">Register form</h3>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center" style="justify-content: center;">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12 register-style" style="min-height: 500px;">
            <form action="<?= base_url() ?>index.php/login_form_controller/getRegister" method="post" id="login-form" class="form" >
              <h3 class="text-center text-info">Register</h3>

              <div class="form-group">
                <label for="user_name" class="text-info">User name:</label><br>
                <input type="text" name="user_name" id="user_name" required="" class="form-control">
              </div>

              <div class="form-group">
                <label for="email" class="text-info">Email:</label><br>
                <input type="email" name="email" id="email" required="" class="form-control">
              </div>

              <div class="form-group">
                <label for="password" class="text-info">Password:</label><br>
                <input type="password" name="password" id="password" required="" class="form-control">
              </div>

              <div class="form-group">
                <label for="confirm_password" class="text-info">Confirm password:</label><br>
                <input type="password" name="confirm_password" id="confirm_password" required="" class="form-control">
              </div>

              <div class="form-group">
                <a href="http://localhost:8080/blog/index.php/login_form_controller" class="text-info">Login here</a>
              </div>

              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-danger btn-md" value="submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>