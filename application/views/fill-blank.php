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
    <link href="<?php echo base_url('/assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('assets/vendors/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.min.css'); ?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-underline"></i> <span>U-Learn</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>
                  <?php
                  if ($this->session->userdata('admin')) {
                    $session_data = $this->session->all_userdata();
                    $fname = $session_data['admin']['first_name'];
                    $mname = $session_data['admin']['middle_name'];
                    $lname = $session_data['admin']['last_name'];
                    echo $fname." ".$lname;
                  }
                  else {
                    echo "No Admin Name";
                  }?>
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Administrator</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('users/admin'); ?>">Administrator</a></li>
                      <li><a href="<?php echo base_url('users/teacher'); ?>">Teacher</a></li>
                      <li><a href="<?php echo base_url('users/student'); ?>">Student</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sticky-note"></i> Quiz Questionaire <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('questionnaires/multipleChoice'); ?>">Multiple Choice Questionaire</a></li>
                      <li><a href="<?php echo base_url('questionnaires/fillInTheBlank'); ?>">Fill in the Blank Questionaire</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url('section'); ?>"><i class="fa fa-balance-scale"></i> Sections</a></li>
                  <li><a href="<?php echo base_url('department'); ?>"><i class="fa fa-object-group"></i> Department</a></li>
                  <li><a href="<?php echo base_url('category'); ?>"><i class="fa fa-folder-open"></i> Category</a>
                  <li><a href="<?php echo base_url('topic'); ?>"><i class="fa fa-folder"></i> Topic</a>
                  <li><a href="<?php echo base_url('content'); ?>"><i class="fa fa-folder-open"></i> Content</a>
                  <li><a href="<?php echo base_url('progress'); ?>"><i class="fa fa-bars"></i> Progress</a>
                  <li><a href="<?php echo base_url('assignments'); ?>"><i class="fa fa-book"></i> Assignments</a></li>
                  <li><a href="<?php echo base_url('announcements'); ?>"><i class="fa fa-bullhorn"></i> Announcement</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">
                    <?php
                    if ($this->session->userdata('admin')) {
                      $session_data = $this->session->all_userdata();
                      $fname = $session_data['admin']['first_name'];
                      $mname = $session_data['admin']['middle_name'];
                      $lname = $session_data['admin']['last_name'];
                      echo $fname." ".$lname;
                    }
                    else {
                      echo "No Admin Name";
                    }?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.html"> Profile</a></li>
                    <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>Question Page</h3>
            </div>
          </div>
          <!-- table start -->
          <div class="x_content">
                <div class="x_panel">
                        <div class="x_title">
                          <h2>Fill in the Blanks<small>Questionnaire</small></h2>
                          <!-- <ul class="nav navbar-right panel_toolbox">
                            <li><a href="add_fillblank.html"><i class="fa fa-user-plus"></i> Add Fill in the Blank Question</a>
                          </ul> -->
                          <div class="clearfix"></div>
                </div>
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Question No</th>
                      <th>Category</th>
                      <th>Topic</th>
                      <th>Question</th>
                      <th>Answer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($result->result() as $row): ?>
                      <tr>
                        <td><?php echo $row->question_no; ?></td>
                        <td><?php echo $row->cat_id; ?></td>
                        <td><?php echo $row->topic_id; ?></td>
                        <td><xmp><?php echo $row->test_question; ?></xmp></td>
                        <td><xmp><?php echo $row->question_answer; ?></xmp></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
          <!-- table end  -->
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; 2018. U-Learn
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
    <!-- Chart.js -->
    <script src="<?php echo base_url('assets/vendors/Chart.js/dist/Chart.min.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js'); ?>"></script>

  </body>
</html>
