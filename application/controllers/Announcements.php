<?php
/**
 *
 */
class Announcements extends CI_Controller
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
    $result = $this->qb->announcementTables();
    $q = array(
      'result' => $result
    );
    $this->load->view('announcement_view', $q);
  }
}
