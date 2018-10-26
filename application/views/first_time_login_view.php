<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="../assets/img/favicon.ico" type="image/ico" />

    <title>U-Learn: Mobile Learning in Web Programming For Grade 11 Students in Probex School Inc.</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.min.css'); ?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h2 class="error-number">Welcome,
                <?php
                  $session_data = $this->session->all_userdata();
                  $lname = $session_data['teacher']['last_name'];
                  $fname = $session_data['teacher']['first_name'];
                  echo $fname . " " . $lname . "!";
                ?>
              </h2>
              <p>As a first time user of this Web Application. You are requested to change your password this is not mandatory, but for security purposes just to make your account more secure and hack free from every intruders want to access your account.<a href="<?php echo base_url('teacher/skip_change_pass'); ?>">If you want to skip this process, just click here to proceed to the dashboard</a></p>
                <br/>
                <fieldset>
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url('teacher/change_pass'); ?>">
                        <div class="form-group">
                                <label for="new_password" class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="new_password" class="form-control col-md-7 col-xs-12" pattern="^[a-zA-Z0-9].{6,25}$" type="password" name="new_password">
                                    <span>It only accepts alphanumeric character from A-Z up to 0-9. minimum of 6 characters and maximum of 25 characters</span>
                                  </div>
                        </div>
                        <div class="form-group">
                                <label for="new_password" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="new_password" class="form-control col-md-7 col-xs-12" type="password" pattern="^[a-zA-Z0-9].{6,25}$" name="new_password_confirm">
                                    <span>It only accepts alphanumeric character from A-Z up to 0-9. minimum of 6 characters and maximum of 25 characters</span>
                                  </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-7 col-sm-6 col-xs-12 col-md-offset-5">
                              <button type="submit" class="btn btn-success" name="change">Submit</button>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js'); ?>"></script>
  </body>
</html>
