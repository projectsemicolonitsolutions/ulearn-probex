<?php
/**
 *
 */
class Category extends CI_Controller
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
    $result = $this->qb->categoryTables();
    $q = array(
      'result' => $result
    );
    $this->load->view('category_view', $q);
  }
}
