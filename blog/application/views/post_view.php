<!DOCTYPE html>
<html lang="en">

<head>
  <title>Show List User</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- use bootstrap and css -->
  <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>

<body>
  <nav class="navbar navbar-light bg-faded" style="background-color: cyan;">
    <div class="collapse navbar-toggleable-xs " id="exCollapsingNavbar2">
      <div class="style-navbar" style="display: flex; justify-content: space-between;">
        <ul class="navbar-nav" style="list-style-type: none;">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>index.php/user_controller">User<span class="sr-only"></span></a>
          </li>
          <!-- <li class="nav-item active">
            <a class="nav-link" href="</?= base_url() ?>index.php/comment_controller">Comment<span
                class="sr-only"></span></a>
          </li> -->
        </ul>
        <ul class="navbar-nav" style="list-style-type: none;">
          <li class="nav-item active">
            <a class="nav-link" href="#">
              <b style="color: blue;"><?= $this->session->userdata('account_session'); ?></b>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>index.php/login_form_controller/getLogout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="text-xs-center">
      <h3 class="display-6">List Post</h3>
      <hr />
    </div>
  </div>

  <div class="container">
    <div class="row">
      <?php foreach ($arr_result as $key => $value) : ?>
        <div class="col-sm-4">
          <div class="card">
            <a href="<?= base_url() ?>./index.php/post_controller/detail_post/<?= $value['id'] ?>"> 
            <img class="card-img-top img-fluid" style="width: 400px; height: 200px; object-fit: cover;" 
            src="<?= $value['image'] ?>" alt="Card image cap" /></a>
            <div class="card-block">
              <h5 class="card-title title"><?= $value['title'] ?></h5>
              <p style="display:-webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:7; overflow:hidden; text-overflow: ellipsis;" 
              class="card-text content"><?= $value['content'] ?></p>
              <p class="card-text edit">
                <small><a href="<?= base_url() ?>./index.php/post_controller/update_post/<?= $value['id'] ?>" 
                class="btn btn-warning btn-xs">Update <i class="fa fa-pencil"></i></a>
                </small>
                <small><a href="<?= base_url() ?>./index.php/post_controller/delete_post/<?= $value['id'] ?>" 
                class="btn btn-outline-danger btn-xs">Delete <i class="fa fa-remove"></i></a>
                </small>
                <small><a href="<?= base_url() ?>./index.php/post_controller/detail_post/<?= $value['id'] ?>" 
                class="btn btn-outline-success btn-xs">Details </a>
                </small>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach ?>

      <div class="container">
        <div class="text-xs-center">
          <h3 class="display-6">Add New Post</h3>
          <hr />
        </div>
        <form action="<?= base_url() ?>./index.php/post_controller/add_post" method='post' enctype="multipart/form-data" 
          style=" padding-right: 176px; padding-top: 50px; background: pink; border-radius: 12px; 
          box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, 
          rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, 
          rgba(0, 0, 0, 0.09) 0px -3px 5px;
          background-image: linear-gradient(#C02425,#F0CB35);">
          <div class="form-group row">
            <label for="image" class="col-sm-4 form-control-label text-xs-right"><b>Image</b></label>
            <div class="col-sm-8">
              <input name="image" type="file" class="form-control" placeholder="Upload post image" id="image">
            </div>
          </div>

          <div class="form-group row">
            <label for="title" class="col-sm-4 form-control-label text-xs-right"><b>Post title</b></label>
            <div class="col-sm-8">
              <input name="title" type="text" class="form-control" placeholder="Highlight Real Madrid vs Barca" id="title">
            </div>
          </div>

          <div class="form-group row">
            <label for="content" class="col-sm-4 form-control-label text-xs-right"><b>Post content</b></label>
            <div class="col-sm-8">
              <input name="content" type="text" class="form-control" placeholder="John Felix is an American..." id="content">
            </div>
          </div>

          <div class="form-group row">
            <button type="submit" class="btn btn-primary" style="margin-left: 35%; margin-bottom: 45px;">Add
              New</button>
          </div>
      </div>
    </div>
    </form>
  </div>
</body>

</html>