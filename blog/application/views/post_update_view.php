<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Post</title>
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
  <div class="container">
    <div class="row">
      <div class="container">
        <div class="text-xs-center">
          <h3 class="display-6">Update Post</h3>
          <hr />
        </div>
        <form action="<?=base_url()?>./index.php/post_controller/update_data_post" method='post'
          enctype="multipart/form-data" style=" padding-right: 176px; padding-top: 50px; background: pink; border-radius: 12px; 
          box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, 
          rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, 
          rgba(0, 0, 0, 0.09) 0px -3px 5px;
          background-image: linear-gradient(#009fff,#ec2f4b);">

          <?php foreach ($data_result as $key => $value): ?>

          <div class="form-group row">
            <label for="image" class="col-sm-4 form-control-label text-xs-right"><b>Image</b></label>
            <div class="col-sm-8">

              <img src="<?=$value['image']?>" alt="" class="ing-fluid" style="width: 200px; height:100px; object-fit: cover;">

              <input name="image2" type="text" value="<?=$value['image']?>" class="form-control" id="image">

              <input name="id" hidden type="text" class="form-control" value="<?=$value['id']?>"
                placeholder="1" id="id">

              <input name="image" type="file" class="form-control" placeholder="Upload avatar" id="image">
            </div>
          </div>

          <div class="form-group row">
            <label for="title" class="col-sm-4 form-control-label text-xs-right"><b>Post Title</b></label>
            <div class="col-sm-8">
              <input name="title" type="text" value="<?=$value['title']?>" class="form-control" placeholder="Rain" id="title">
            </div>
          </div>

          <div class="form-group row">
            <label for="content" class="col-sm-4 form-control-label text-xs-right"><b>Post Content</b></label>
            <div class="col-sm-8">
              <input name="content" type="text" value="<?=$value['content']?>" class="form-control" placeholder="Rain" id="content">
            </div>
          </div>

          <div class="form-group row">
            <label for="user_id" class="col-sm-4 form-control-label text-xs-right"><b>Post User ID</b></label>
            <div class="col-sm-8">
              <input name="user_id" type="number" value="<?=$value['user_id']?>" class="form-control" placeholder="0388884256"
                id="user_id">
            </div>
          </div>
          <?php endforeach ?>

          <div class="form-group row">
            <button type="submit" class="btn btn-primary" style="margin-left: 35%; margin-bottom: 45px;">Update</button>
          </div>
      </div>
    </div>
    </form>
  </div>
</body>

</html>