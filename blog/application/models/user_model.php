<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {

  public $variable;

  public function __construct()
  {
    parent::__construct();
  }
  
  // get data from controller and pass to db - add_user
  public function inserDataToDB($first_name,$last_name,$phone_number,$email,$avatar)
  {
    $data = array (
      'first_name' => $first_name,
      'last_name' => $last_name,
      'phone_number' => $phone_number,
      'email' => $email,
      'avatar' => $avatar
    );
    $this->db->insert('users',$data);
    return $this->db->insert_id();
  }

  // get all data to show in view
  public function getAllData()
  {
    $this->db->select('*');
    $query = $this->db->get('users');
    $data = $query->result_array();
    return $data;
  }

  // get data from database -UPDATE
  public function getDataById($id)
  {
    $this->db->select('*');
    $this->db->where('id',$id);
    $query = $this->db->get('users');
    $data = $query->result_array();
    return $data;
  }

  public function updateByID($id,$first_name,$last_name,$phone_number,$email,$avatar)
  {
    $data = array(
      'id' => $id,
      'first_name' => $first_name,
      'last_name' => $last_name,
      'phone_number' => $phone_number,
      'email' => $email,
      'avatar' => $avatar,
    );
    $this->db->where('id',$id);
    return $this->db->update('users',$data);
  }

  public function removeDataByID($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('users');
  }
}
