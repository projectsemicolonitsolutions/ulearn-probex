<?php
/**
 *
 */
class Department extends CI_Controller
{

  function __construct()
  {
    parent:: __construct();
    if (!$this->session->userdata('admin')) {
			redirect(base_url());
		}
  }

  public function index()
  {
    $result = $this->qb->departmentTables();
    $q = array(
      'result' => $result
    );
    $this->load->view('department_view', $q);
  }
}
