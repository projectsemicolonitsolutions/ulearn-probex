<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata('admin')) {
			redirect(base_url('admin'));
		}
		if ($this->session->userdata('teacher')) {
			redirect(base_url('teacher'));
		}
	}

	public function auth()
	{
		$username = $this->input->post('user_id');
		$password = $this->input->post('password');
		$res_user = "";
		$res_pass = "";
		$res_acct_id = "";
		$res_account_status = 1;
		$check_password = 0;
		$result = $this->qb->loginValidateData($username);
		foreach ($result->result() as $row) {
			$res_user = $row->username;
			$res_pass = $row->password;
			$res_acct_id = $row->acct_id;
			$res_account_status = $row->acct_status;
			$check_password = $row->check_password;
		}
		if ($res_acct_id === "2018001") {
			if ($res_pass !== $password) {
				echo "Incorrect username or password!<br>";
				echo $res_account_status;
				exit;
			}
			else {
				if ($res_account_status == 0) {
					echo "Account is inactive!";
					exit;
				}
				else
				{
					$access_desc = "";
					$result = $this->qb->getAccessLevel($res_acct_id);
					foreach ($result->result() as $row) {
						$access_desc = $row->access_desc;
					}
					if ($res_pass === $password) {
						$admin_no = "";
						$first_name = "";
						$middle_name = "";
						$last_name = "";
						$email_add = "";
						$contact_no = "";
						$admin_pic = "";
						$account_status = "";
						$r = $this->qb->getAdminInfo($res_user);
						foreach ($r->result() as $row) {
							$admin_no = $row->admin_no;
							$first_name = $row->first_name;
							$middle_name = $row->middle_name;
							$last_name = $row->last_name;
							$email_add = $row->email_add;
							$contact_no = $row->contact_no;
							$admin_pic = $row->admin_pic;
							$account_status = $row->account_status;
						}
						$userdata = array(
							'user_id' => $res_user,
							'admin_no' => $admin_no,
							'first_name' => $first_name,
							'middle_name' => $middle_name,
							'last_name' => $last_name,
							'email_add' => $email_add,
							'contact_no' => $contact_no,
							'admin_pic' => $admin_pic,
							'account_status' => $account_status,
							'acct_id' => $res_acct_id,
							'logged_in' => TRUE
						);
						$this->session->set_userdata('admin', $userdata);
						redirect(base_url('admin'));
						echo json_encode($userdata);
					}
				}

			}
		}
		elseif ($res_acct_id === "2018002") {
			if ($res_pass !== $password) {
				echo "Incorrect username or password!";
				return false;
			}
			else {
				$result = $this->qb->getAccessLevel($res_acct_id);
				if ($res_pass === $password) {
					if ($res_account_status == 0) {
						echo "Account is inactive!";
						exit;
					}
					else {
						$access_desc = "";
						$result = $this->qb->getAccessLevel($res_acct_id);
						foreach ($result->result() as $row) {
							$access_desc = $row->access_desc;
						}
						if ($res_pass === $password) {
							$teacher_no = "";
							$first_name = "";
							$middle_name = "";
							$last_name = "";
							$email_add = "";
							$contact_no = "";
							$account_status = "";
							$department_id = "";
							$section_id = "";
							$r = $this->qb->getTeacherInfo($res_user);
							foreach ($r->result() as $row) {
								$teacher_no = $row->teacher_no;
								$first_name = $row->first_name;
								$middle_name = $row->middle_name;
								$last_name = $row->last_name;
								$email_add = $row->email_add;
								$contact_no = $row->contact_no;
								$department_id = $row->department_id;
								$section_id = $row->section_id;
								$account_status = $row->account_status;

							}
							$userdata = array(
								'user_id' => $res_user,
								'teacher_no' => $teacher_no,
								'first_name' => $first_name,
								'middle_name' => $middle_name,
								'last_name' => $last_name,
								'email_add' => $email_add,
								'contact_no' => $contact_no,
								'account_status' => $account_status,
								'acct_id' => $res_acct_id,
								'logged_in' => TRUE
							);
							$this->session->set_userdata('teacher', $userdata);
							if ($check_password == 0) {
								redirect(base_url('teacher/change_pass'));
								echo $check_password;
							}
							elseif ($check_password == 1) {
								redirect(base_url('teacher'));
								echo $check_password;
								echo json_encode($userdata);
							}
						}
					}
				}
			}
		}

		elseif($res_user !== $username || $res_pass !== $password) {
			echo "Incorrect Username or Password";
		}
		else {
			echo "Incorrect Username or Password";
		}


	}

	public function index()
	{

		$this->load->view('login-view');
	}
}
