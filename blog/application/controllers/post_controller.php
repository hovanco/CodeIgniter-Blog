<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class post_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    


    $this->load->model('post_model');
    $result = $this->post_model->getAllData();
    $result = array("arr_result" => $result);
    $this->load->view('post_view', $result);
  }

  public function add_post()
  {
    $target_dir = "Fileupload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    if ($_FILES["image"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $image =  base_url() . "Fileupload/" . basename($_FILES[("image")]["name"]);
    $title = $this->input->post('title');
    $content = $this->input->post('content');
    // $user_id = $this->input->post('user_id');
    $user_id = $this->session->userdata('user_id');
    $this->load->model('post_model');
    $result = $this->post_model->inserDataToDB($title, $content, $image, $user_id);
    if ($result) {
      redirect("http://localhost:8080/blog/index.php/post_controller/");
    } else {
      echo "fail";
    }
  }

  // call func getDataById from model
  public function update_post($id)
  {
    $this->load->model('post_model');
    $this->post_model->getDataById($id);
    $data = $this->post_model->getDataById($id);
    $data = array('data_result' => $data);
    $this->load->view('post_update_view', $data, false);
  }


  public function update_data_post()
  {
    // handle upoad file image
    $target_dir = "Fileupload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    if ($_FILES["image"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      } else {
      }
    }

    // get data form view edit
    $image = basename($_FILES["image"]["name"]);
    $id = $this->input->post('id');
    $title = $this->input->post('title');
    $content = $this->input->post('content');
    $user_id = $this->session->userdata('user_id');

    if ($image) {
      $image = base_url() . "Fileupload/" . basename($_FILES["image"]["name"]);
    } else {
      $image = $this->input->post('image2');
    }

    $this->load->model('post_model');
    if ($this->post_model->updateByID($id, $title, $content, $user_id, $image)) {
      redirect("http://localhost:8080/blog/index.php/post_controller");
    } else {
      echo "false";
    }
  }

  public function delete_post($id)
  {
    $this->load->model('post_model');
    if ($this->post_model->removeDataByID($id)) {
      redirect("http://localhost:8080/blog/index.php/post_controller");
    } else {
      echo "fail";
    }
  }

  public function detail_post($id)
  {
    $this->load->model('post_model');
    $details = $this->post_model->getDataById($id);
    $data = $this->post_model->getCommentByPostID($id);
    $query = $this->post_model->getUserComment($id);
    // push key(data) in to array
    $this->load->view('post_detail_view', array('all_details' => $details, "comment_arr" => $data, "userComment" => $query), false);
  }
  // =========================================   comment   =====================

  public function addComment()
  {
    // $post_id = $this->uri->segment('3');
    $post_id = $this->input->post("post_id");
    $user_id = $this->session->userdata('user_id');
    $content = $this->input->post("content");
    $this->load->model('post_model');
    $result = $this->post_model->insertCommentDataToDB($post_id, $user_id, $content);
    if ($result) {
      // return detail page after add comment success
      redirect(base_url() . "index.php/post_controller/detail_post/" . $post_id);
    } else {
      echo "fail";
    }
  }

  // get all comment with all post from * comments
  public function getdata()
  {
    $this->load->model('post_model');
    $data = $this->post_model->getCommentAllData();
    $comment = array("comment_arr" => $data);
    $this->load->view('list_comment_view',$comment);
  }

  // get all comment with each post by post_id of comments table
  public function getAllCommentByPostID($post_id)
  {
    $this->load->model('post_model');
    $data = $this->post_model->getCommentByPostID($post_id);
    $comment = array("comment_arr" => $data);
    $this->load->view('list_comment_view', $comment);
  }

  // show data want to update by id_comment
  public function editComment($id)
  {
    $this->load->model('post_model');
    $this->post_model->getCommentByID($id);
    $query = $this->post_model->getCommentByID($id);
    $data = array('getCommentByID' => $query);
    $this->load->view('comment_update_view',$data, FALSE);
  }

  // update comment after enter submit btn 
  public function updateComment()
  { 
    // $post_id = $this->uri->segment('3'); get post_id from url
    $id = $this->input->post('id');
    $content = $this->input->post('content');
    $this->load->model('Post_model');
    if($this->Post_model->updateCommentByID($id,$content))
    {
      redirect(base_url() . "index.php/post_controller");
    }else{
      echo "false";
    }
  }

  // delete comment by id
  public function deleteComment($id)
  {
    $this->load->model('post_model');
    if($this->post_model->removeCommentByID($id))
    {
      redirect(base_url() . "index.php/post_controller");
    }else{
      echo "fail";
    }
  }

  // get all user have comment by posst id
  public function getUserByCommentID($post_id)
  {
    $this->load->model('post_model');
    $query = $this->post_model->getUserComment($post_id);
    $user = array("userComment" => $query);
    $this->load->view('list_comment_view', $user);
  }

  // get all user and all comment
  public function getAllUserCommentPost()
  {
    $this->load->model('post_model');
    $query = $this->post_model->getAllUserComment();
    $user = array("userCommentDemo" => $query);
    $this->load->view('list_post_view', $user);
  }

  public function styleFileCodeigniter()
  {
    $this->load->view('HTML_view');
  }
}