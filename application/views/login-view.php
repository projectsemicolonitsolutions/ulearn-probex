<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>U-Learn: Mobile Learning in Web Programming For Grade 11 Students in Probex School Inc.</title>
    <link rel="icon" href="./assets/img/favicon.ico" type="image/ico" />

      <!-- Insert custom CSS here  -->
      <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">

      <!-- Insert css framework here  -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- javascript initialization -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  </head>

<body>
  <main>
    <section>
    </section>
    <section id="section-wrapper" class="login-bg">
      <div class="container login-container">
        <div class="row">
          <div class="col-md-4 login-sec">
            <h2 class="text-center">U-Learn: Mobile Learning in Web Programming</h2>
            <form class="login-form" method="post" action="<?php echo base_url('login/auth'); ?>">
              <div class="form-group">
                <label for="user_id" class="text-uppercase">User ID</label>
                <input type="text" class="form-control" placeholder="Please Enter your User ID" id="user_id" name="user_id" required>
              </div>

              <div class="form-group">
                <label for="password" class="text-uppercase">Password</label>
                <input type="password" class="form-control" placeholder="Please Enter your Password" id="password" name="password" required>
              </div>

              <button type="submit" id="submit" class="btn btn-login float-right">Login</button>

            </form>
          </div>
          <div class="col-md-8 banner-sec"></div>

        </div>
      </div>
    </section>
  </main>
    <!-- insert init js here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- insert js framework here -->
</body>
</html>
