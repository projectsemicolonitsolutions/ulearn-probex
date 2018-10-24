<?php
/**
 *
 */
class Students extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
		if (!$this->session->userdata('teacher')) {
			redirect(base_url());
		}
  }


  



}
