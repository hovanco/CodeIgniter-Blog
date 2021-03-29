<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class join_table_demo extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('post_view');
  }

  public function displayUserComment()
  {
    $this->load->model('post_model');
    $query = $this->post_model->getUserComment();
    $user = array("userComment" => $query);
    $this->load->view('list_post_view');
  }
}