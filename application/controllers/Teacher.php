<?php
/**
 *
 */
class Teacher extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
		if (!$this->session->userdata('teacher')) {
			redirect(base_url());
		}
  }

  public function index()
  {
    $this->load->view('teacher_view');
  }

  public function tryToDisplay()
  {
    $session_data = $this->session->all_userdata();
    $fname = $session_data['teacher']['first_name'];
    $mname = $session_data['teacher']['middle_name'];
    $lname = $session_data['teacher']['last_name'];
    $teacher_no = $session_data['teacher']['teacher_no'];
    echo $teacher_no;
  }

  public function skip_change_pass()
  {
    $session_data = $this->session->all_userdata();
    $user_id = $session_data['teacher']['user_id'];
    $this->tm->skipChange($user_id);
    redirect(base_url('teacher'));
  }

  public function change_pass()
  {
    if (isset($_POST['change'])) {
      $new_password = $this->input->post('new_password');
      $new_password_confirm = $this->input->post('new_password_confirm');
      $session_data = $this->session->all_userdata();
      $username = $session_data['teacher']['user_id'];
      if ($new_password === $new_password_confirm) {
        $changeData = array(
          'new_password' => $new_password,
          'user_id' => $username,
        );
        $this->tm->changePassword($changeData);
        redirect(base_url('teacher'));
      }
      else {
        $url = base_url('teacher/change_pass');
        $msg =  '<script>';
        $msg .= 'alert("Password did not match!");';
        $msg .= 'window.location.href = '.$url.';';
        $msg .= '</script>';
      }
    }
    $this->load->view('first_time_login_view');
  }

  public function student()
  {

    $r = $this->tm->displayStudents();
    $q = array(
      'result' => $r
    );
    $this->load->view('teacher/student-view.php', $q);
  }

  public function logout()
  {
    $this->session->unset_userdata('teacher');
		redirect(base_url());
  }
}
