  <header class="navbar navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="<?=system_url()?>" class="navbar-brand">
          <img src="<?=images_path('lal_logo.png')?>" alt="<?=system_name()?> logo" />
        </a>
      </div>
      <div class="collapse navbar-collapse" id="main-navigation">
        <?php
        if (_logged_in()):
          $user = get_user();
        ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="<?=root_path('index.php')?>" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?=get_gravatar($user->email, 25)?>" width="25" height="25"
                  class="gravatar" alt="<?=$user->username?>'s Gravatar Picture">
                <?=$user->username?> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <?php if ($user->checkPermission('accessAdminPanel')): ?>
                  <li><a href="<?=root_path('admin/')?>"><i class="glyphicon glyphicon-home"></i> Admin Panel</a></li>
                <?php endif; ?>
                <li><a href="<?=root_path('member/')?>"><i class="glyphicon glyphicon-list-alt"></i> Member Panel</a></li>
                <li><a href="<?=root_path('profile.php')?>"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
                <?php if (pm_system_enabled()): ?>
                  <?php if ($user->receive_personal_messages > 0): ?>
                    <li><a href="<?=root_path('messages.php')?>"><i class="glyphicon glyphicon-envelope"></i> Messages
                    <span class="badge badge-important"><?=count_messages($user->id)?></span></a></li>
                  <?php endif; ?>
                <?php endif; ?>
                <?php if ($user->checkPermission('accessSettingsPanel')): ?>
                <li>
                  <a href="<?=root_path('admin/settings.php')?>"><i class="glyphicon glyphicon-cog"></i> Settings</a>
                </li>
                <?php endif; ?>
                <li class="divider"></li>
                <li><a href="<?=root_path('logout.php')?>">
                  <i class="glyphicon glyphicon-lock"></i> Logout <?=$user->username?></a>
                </li>
              </ul>
            </li><!--//dropdown-->
          </ul>
        <?php else: ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=root_path('login.php')?>">Login</a></li>
            <li><a href="<?=root_path('register.php')?>">Contribute a List</a></li>
          </ul>
        <?php endif; ?>
      </div><!--nav-collapse collapse-->
    </div><!--container-->
  </header><!--navbar navbar-inverse navbar-fixed-top-->
