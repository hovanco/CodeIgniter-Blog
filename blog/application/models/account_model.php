<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account_model extends CI_Model {

  public $variable;

  public function __construct()
  {
    parent::__construct();
  }

  public function insertUser($user_name, $email, $password )
  {
    $data = array(
      'user_name' => $user_name,
      'email' => $email,
      'password' => $password
    );
    $this->db->insert('users',$data);
    redirect("http://localhost:8080/blog/index.php/login_form_controller");
  }

  public function getDataByUserName($user_name,$password)
  {
    
    $this->db->where('user_name',$user_name);
    $this->db->where('password',$password);
    // return $this->db->get('users')->num_rows();
    return $this->db->get('users')->row();
  }
}

