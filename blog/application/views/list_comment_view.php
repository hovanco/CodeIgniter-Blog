<div class="container">
  <div class="row">
    <?php foreach ($comment_arr as $key => $value): ?>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-block">
          <h5 class="card-text content"><b>Comment ID: </b><?=$value['id']?></h5>
          <p class="card-text content"><b>Comment Content: </b><?=$value['content']?></p>
          <p class="card-text user_id"><b>User ID: </b><?=$value['user_id']?></p>
          <p class="card-text user_id"><b>Post ID: </b><?=$value['post_id']?></p>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>


