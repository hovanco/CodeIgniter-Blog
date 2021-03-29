<nav class="navbar navbar-light bg-faded" style="background-color: cyan;">
  <div class="collapse navbar-toggleable-xs " id="exCollapsingNavbar2">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">User</a>
    <div class="style-navbar" style="display: flex; justify-content: space-between;">
      <ul class="navbar-nav" style="list-style-type: none;">
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>index.php/user_controller">List Data<span
              class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>index.php/user_controller">Add Data</a>
        </li>
      </ul>
      <ul class="navbar-nav" style="list-style-type: none;">
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>index.php/register_form_controller">Register<span
              class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>index.php/login_form_controller">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>