<!-- <div class="container">
  <div class="row">
    </?php foreach ($userCommentDemo as $key => $user): ?>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-block">
          <h5 class="card-text content"><b>User Name: </b></?=$user['user_name']?></h5>
        </div>
      </div>
    </div>
    </?php endforeach ?>
  </div>
</div> -->



<?php foreach ($userCommentDemo as $user): ?>
  <p class=""><b>ID: </b><?=$user['id']?></p>
  <p class=""><b>Comment: </b><?=$user['content']?></p>
  <p class=""><b>User Name: </b><?=$user['user_name']?></p>
  <p class=""><b>Post ID: </b><?=$user['post_id']?></p>
  <br/>
<?php endforeach ?>


<!-- </?php foreach ($userComment as $user): ?>
  <p class=""><b>ID: </b></?=$user['id']?></p>
  <p class=""><b>Comment: </b></?=$user['content']?></p>
  <p class=""><b>user Name: </b></?=$user['user_name']?></p>
  <br/>
</?php endforeach ?> -->


