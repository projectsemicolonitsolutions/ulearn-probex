<?php
/**
 *
 */
class Content extends CI_Controller
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
    $result = $this->qb->contentTables();
    $q = array(
      'result' => $result
    );
    $this->load->view('content_view', $q);
  }
}
