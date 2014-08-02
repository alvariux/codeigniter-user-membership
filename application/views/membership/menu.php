<!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">User Membership</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo $this->config->item('base_url'); ?>index.php/membership/index">Home</a></li>
            <li><a href="<?php echo $this->config->item('base_url'); ?>index.php/membership/users">Users</a></li>
            <li><a href="<?php echo $this->config->item('base_url'); ?>index.php/membership/roles">Roles</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo $this->config->item('base_url'); ?>index.php/membership/admin_page">Admin page</a></li>
                <li><a href="<?php echo $this->config->item('base_url'); ?>index.php/membership/user_page">User page</a></li>                
              </ul>
            </li>
            <li><a href="<?php echo $this->config->item('base_url'); ?>index.php/membership/profile">Profile</a></li>
            <li><a href="<?php echo $this->config->item('base_url'); ?>index.php/membership/login">Login</a></li>
            <li><a href="<?php echo $this->config->item('base_url'); ?>index.php/membership/logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>