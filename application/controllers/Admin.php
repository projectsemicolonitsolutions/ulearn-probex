<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if (!$this->session->userdata('admin')) {
			redirect(base_url());
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('admin');
		redirect(base_url());
	}

	public function index()
	{
		$adminCount = $this->qb->adminCount();
		$teacherCount = $this->qb->teacherCount();
		$studentCount = $this->qb->studentCount();
		$categoryCount = $this->qb->categoryCount();
		$topicCount = $this->qb->topicCount();
		$departmentCount = $this->qb->departmentCount();
		$adminData = array(
			'ac' => $adminCount,
			'tc' => $teacherCount,
			'sc' => $studentCount,
			'cc' => $categoryCount,
			'toc' => $topicCount,
			'dc' => $departmentCount,
		);
		$this->load->view('admin_dashboard', $adminData);
	}
}
