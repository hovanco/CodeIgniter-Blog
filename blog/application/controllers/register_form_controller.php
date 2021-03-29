<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register_form_controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  
	public function index()
	{
    $this->load->view('register_form_view');
	}
}