<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class comment_controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  
	public function index()
	{
    $this->load->model('comment_model');
    $result = $this->comment_model->getAllData();
    $result = array("arr_result" => $result);
    $this->load->view('post_detail_view',$result);
	}

  public function add_comment()
  {
    $content = $this->input->post("content");
    $user_id = $this->session->userdata('user_id');
    $post_id = $this->session->userdata('post_id');
    $this->load->model('comment_model');
    $result = $this->comment_model->inserDataToDB($content,$user_id,$post_id);
    if($result){
      redirect('http://localhost:8080/blog/index.php/post_controller/');
    }else{
      echo "fail";
    }
  }

  public function update_comment($id)
  {
    $this->load->model('comment_model');
    $this->comment_model->getDataById($id);
    $data = $this->comment_model->getDataById($id);
    $data = array('data_result' => $data);
    $this->load->view('comment_update_view',$data, FALSE);
  }


  public function update_data_comment()
  {
    // get data form view edit
    $id = $this->input->post('id');
    // $post_id = $this->input->post('post_id');
    // $user_id = $this->input->post('user_id');
    $content = $this->input->post('content');

    // call model  
    $this->load->model('comment_model');
    if($this->comment_model->updateByID($id,$content))
    {
      redirect("http://localhost:8080/blog/index.php/comment_controller");
    }else{
      echo "false";
    }
  }

  public function delete_comment($id)
  {
    $this->load->model('comment_model');
    if($this->comment_model->removeDataByID($id))
    {
      redirect("http://localhost:8080/blog/index.php/comment_controller");
    }else{
      echo "fail";
    }
  }
}