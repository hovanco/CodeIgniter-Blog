<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class comment_model extends CI_Model {

  public $variable;

  public function __construct()
  {
    parent::__construct();
  }
  
  // start add
  public function inserDataToDB($content,$user_id,$post_id)
  {
    $data = array (
      'content' => $content,
      'user_id' => $user_id,
      'post_id' => $post_id,
    );
    $this->db->insert('comments',$data);
    return $this->db->insert_id();
  }
  // end add

  // start get data to show at comment_view main
  public function getAllData()
  {
    $this->db->select('*');
    $query = $this->db->get('comments');
    $data = $query->result_array();
    return $data;
  }

  // get data by id from comments table database -UPDATE
  public function getDataById($id)
  {
    $this->db->select('*');
    $this->db->where('id',$id);
    $query = $this->db->get('comments');
    $data = $query->result_array();
    return $data;
  }

  public function updateByID($id,$content)
  {
    $data = array(
      'id' => $id,
      'content' => $content,
    );
    $this->db->where('id',$id);
    return $this->db->update('comments',$data);
  }

  public function removeDataByID($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('comments');
  }

}
