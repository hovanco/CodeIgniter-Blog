<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class post_model extends CI_Model {

  public $variable;

  public function __construct()
  {
    parent::__construct();
  }
  
  // get data from controller and pass to db - add_post
  public function inserDataToDB($title,$content,$image,$user_id)
  {
    $data = array (
      'title' => $title,
      'content' => $content,
      'image' => $image,
      'user_id' => $user_id,
    );
    $this->db->insert('posts',$data);
    return $this->db->insert_id();
  }

  // get all data to show in view
  public function getAllData()
  {
    // log code
    // $this->db->select('*');
    // $all_data = $this->db->get('posts');
    // $all_data = $all_data->result_array();
    // return $all_data;

    // short code
    $data = $this->db->select('*')->get('posts');
    $result = $data->result_array();
    return $result;
  }

  // get data from database -UPDATE, details page
  public function getDataById($id)
  {
    $this->db->select('*');
    $this->db->where('id',$id);
    $query = $this->db->get('posts');
    $data = $query->result_array();
    return $data;
  }

  public function updateByID($id,$title,$content,$user_id,$image)
  {
    $data = array(
      'id' => $id,
      'title' => $title,
      'content' => $content,
      'user_id' => $user_id,
      'image' => $image
    );
    $this->db->where('id',$id);
    return $this->db->update('posts',$data);
  }

  public function removeDataByID($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('posts');
  }

  // =============== comment =======================
  public function insertCommentDataToDB($post_id,$user_id,$content)
  {
    $data = array (
      'post_id' => $post_id,
      'user_id' => $user_id,
      'content' => $content,
    );
    $this->db->insert('comments',$data);
    return $this->db->insert_id();
  }

  // get all comment from comment
  public function getCommentAllData()
  {
    $this->db->select('*');
    $query = $this->db->get('comments');
    $data = $query->result_array();
    return $data;
  }

  public function getCommentByPostID($post_id)
  {
    $this->db->select('*');
    $this->db->where('post_id',$post_id);
    $query = $this->db->get('comments');
    $comment_data = $query->result_array();
    return $comment_data;
  }

  public function getCommentByID($id)
  {
    $this->db->select('*');
    $this->db->where('id',$id);
    $query = $this->db->get('comments');
    $data = $query->result_array();
    return $data;
  }

  public function updateCommentByID($id,$content)
  {
    $data = array(
      'id' => $id,
      'content' => $content,
    );
    $this->db->where('id',$id);
    return $this->db->update('comments',$data);
  }
  
  public function removeCommentByID($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('comments');
  }

  public function getUserComment($post_id)
  {
    $this->db->select('*');
    $this->db->where('post_id',$post_id);
    $this->db->from('users');
    $this->db->join('comments','comments.user_id = users.id');
    $query = $this->db->get();
    $user = $query->result_array();
    return $user;
  }

  //get username and comment from comments join users table
  public function getAllUserComment()
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('comments','comments.user_id = users.id');
    $query = $this->db->get();
    $user = $query->result_array();
    return $user;
  }
  
}
