<?php if (! defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class login_form_controller extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->library('session');
  }

  public function index()
  {
      $this->load->view('login_form_view');
  }

  public function register()
  {
      $this->load->view('register_form_controller');
  }

  public function getRegister()
  {
    $user_name = $this->input->post('user_name');
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $confirm_password = md5($this->input->post('confirm_password'));

    if ($password == $confirm_password) {
      $this->load->model('account_model');
      $this->account_model->insertUser($user_name, $email, $password);
    } else {
      echo "Password doesn't match";
    }
  }

  // delete session to logout
  public function getLogout()
  {
    if ($this->session->userdata('account_session')) {
      $this->session->unset_userdata('account_session');
      redirect('http://localhost:8080/blog/index.php/login_form_controller');
    }
  }



  public function getLogin()
  {
    // $email = $this->input->post('email');
    $user_name = $this->input->post('user_name');
    $password = md5($this->input->post('password'));
    $this->load->model('account_model');
    $result = $this->account_model->getDataByUserName($user_name,$password);

    // echo '<pre>';
    // var_dump($result);exit;
    // if($result->role == 1) {
    // }
    
    if ( $result) {
      $this->session->set_userdata('account_session',$user_name);
      $this->session->set_userdata('user_id',$result->id );
      redirect('http://localhost:8080/blog/index.php/user_controller');
    }else {
      echo "login fail";
    }
  }
}
