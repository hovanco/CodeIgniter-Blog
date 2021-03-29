<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  
	public function index()
	{
    // call func getAllData from model
    $this->load->model('user_model');
    $result = $this->user_model->getAllData();
    $result = array("arr_result" => $result);

    // check session or no to show user_view
    if ($this->session->userdata('account_session')) {
      $this->load->view('user_view',$result);
    }else {
      redirect('http://localhost:8080/blog/index.php/login_form_controller');
    }
	}

  public function add_user()
  {
    // handle upload image
    $target_dir = "Fileupload/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["avatar"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
   
    if ($_FILES["avatar"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    // get data by atribute name form from user view
    $avatar = base_url()."Fileupload/".basename($_FILES[("avatar")]["name"]);
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $phone_number = $this->input->post('phone_number');
    $email = $this->input->post('email');

    // call model
    $this->load->model('user_model');
    $result = $this->user_model->inserDataToDB($first_name,$last_name,$phone_number,$email,$avatar);
    if($result){
      redirect("http://localhost:8080/blog/index.php/user_controller");
    }else{
      echo "fail";
    }
  }

  // call func getDataById from model
  public function update_user($id)
  {
    $this->load->model('user_model');
    $this->user_model->getDataById($id);
    $data = $this->user_model->getDataById($id);
    $data = array('data_result' => $data);
    $this->load->view('user_update_view',$data, FALSE);
  }

  // get data from at form update and pass to DB
  public function update_data_user()
  {
    // get data form view edit
    $id = $this->input->post('id');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $phone_number = $this->input->post('phone_number');
    $email = $this->input->post('email');
    
    // handle upoad file image
    $target_dir = "Fileupload/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["avatar"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    if ($_FILES["avatar"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
   
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
    } else {
      if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
      } else {
      }
    }

    $avatar = basename($_FILES["avatar"]["name"]);

    if($avatar) 
    {
      $avatar = base_url()."Fileupload/".basename($_FILES["avatar"]["name"]);
    }else { // se lay anh avatar2 trong input hidden
      $avatar = $this->input->post('avatar2');
    }

    // call model  
    $this->load->model('user_model');
    if($this->user_model->updateByID($id,$first_name,$last_name,$phone_number,$email,$avatar))
    {
      redirect("http://localhost:8080/blog/index.php/user_controller");
    }else{
      echo "false";
    }
  }

  // call func removeDataByID from model, pass id user want to delete
  public function delete_user($id)
  {
    $this->load->model('user_model');
    if($this->user_model->removeDataByID($id))
    {
      redirect("http://localhost:8080/blog/index.php/user_controller");
    }else{
      echo "fail";
    }
  }
}