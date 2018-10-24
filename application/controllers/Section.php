<?php
/**
 *
 */
class Section extends CI_Controller
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
    $result = $this->qb->sectionTables();
    $q = array(
      'result' => $result
    );
    $this->load->view('sections_view', $q);
  }
}
