<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show List Comments</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
            <a class="nav-link" href="<?= base_url() ?>index.php/post_controller">Post</a>
          </li>
        </ul>
        <ul class="navbar-nav" style="list-style-type: none;">
          <li class="nav-item active">
            <a class="nav-link" href="" style="cursor: context-menu;">
            <b style="color: blue;"><?= $this->session->userdata('account_session');?></b>
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
      <h3 class="display-6">Update Comment</h3>
      <hr />
    </div>
    <form action="<?= base_url() ?>./index.php/post_controller/updateComment" method='post'
      enctype="multipart/form-data" style=" padding-right: 176px; padding-top: 50px; background: pink; border-radius: 12px; 
      box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
      background-image: linear-gradient(#ece9e6,#ffffff);">
      <?php foreach ($getCommentByID as $key => $value) : ?>
      <div class="form-group row">
        <label for="content" class="col-sm-4 form-control-label text-xs-right"><b>Comment content:
          </b></label>
        <div class="col-sm-8">
          <input name="content" type="text" value="<?= $value['content'] ?>" class="form-control"
            placeholder="Good information" id="content">
        </div>
      </div>
      <?php endforeach ?>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary" style="margin-left: 35%; margin-bottom: 45px;">Update</button>
      </div>
    </form>
  </div>
</body>
</html>