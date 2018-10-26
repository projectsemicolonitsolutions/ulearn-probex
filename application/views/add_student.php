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
    <!-- iCheck -->
    <link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">

     <!-- Datatables -->
     <link href="<?php echo base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'); ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'); ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.min.css') ?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('admin'); ?>" class="site_title"><i class="fa fa-underline"></i> <span>U-Learn</span></a>
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
                <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Student <small>Add New Account</small></h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <br />
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label" for="employee_id">Username / User ID</label>
                                    <input type="text" id="user_id" name="user_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                                    <input type="hidden" id="user_id" name="user_id" required="required" class="form-control col-md-7 col-xs-12" value="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label" for="employee_id">Student LRN Number </label>
                                    <input type="text" id="student_no"  name="student_no" required="required" class="form-control col-md-7 col-xs-12" disabled>
                                    <input type="hidden" id="student_no" name="student_no" required="required" class="form-control col-md-7 col-xs-12" value="">
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label class="control-label" for="first-name">First Name</label>
                                  <input type="text" id="first-name" name="first_name"required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label class="control-label" for="last-name">Last Name</label>  
                                  <input type="text" id="last-name" name="last_name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label for="middle-name" class="control-label">Middle Name / Initial</label>  
                                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle_name">
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label for="email-address" class="control-label">Email Address</label>  
                                  <input id="email-address" class="form-control col-md-7 col-xs-12" type="text" name="email_add">
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label for="contact_no" class="control-label">Contact Number</label>  
                                  <input id="contact_no" class="form-control col-md-7 col-xs-12" type="text" name="contact_no">
                                </div>

                               <div class="form-group">
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                  <label class="control-label" for="employee_id">Track </label>
                                        <select id="heard" name="department_id" class="form-control" required>
                                          <?php foreach ($r->result() as $row): ?>
                                            <option value="<?php echo $row->department_tinker; ?>"><?php echo $row->department_tinker; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                  </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                  <label class="control-label" for="employee_id">Student Section </label>
                                  <select id="heard" name="section_id" class="form-control" required>
                                          <?php foreach ($s->result() as $row): ?>
                                            <option value="<?php echo $row->section_tinker; ?>"><?php echo $row->section_desc; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                
                                </div>
                                
                                <div class="form-group">
                                    <label for="email-address" class="control-label col-md-3 col-sm-3 col-xs-12">Section Teacher</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="heard" name="teacher_no" class="form-control" required>
                                          <?php foreach ($t->result() as $row): ?>
                                            <option value="<?php echo $row->teacher_no; ?>"><?php echo $row->first_name." ".$row->last_name; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="in_solid"></div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                  <div class="col-md-1 col-sm-6 col-xs-12 col-md-offset-11">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
          <!-- form end  -->
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
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js'); ?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/jszip/dist/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/vfs_fonts.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js'); ?>"></script>

  </body>
</html>
