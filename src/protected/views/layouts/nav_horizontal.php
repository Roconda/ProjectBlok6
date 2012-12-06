    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
<div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/"><span class="avans-text"><?php echo CHtml::encode(Yii::app()->name); ?></span></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#contact">Settings</a></li>
            </ul>
            
            <form class="navbar-form pull-right" action="/src/index.php/user/auth/login" method="post">
              <input class="span2" type="text" placeholder="Username" name="YumUserLogin[username]">
              <input class="span2" type="password" placeholder="Password" name="YumUserLogin[password]">
              <button type="submit" class="btn">Sign in</button>
            </form>
            <ul class="nav pull-right">
              <li><a class="disabled">Logged in as <?php echo Yii::app()->user->name; ?></a></li>
              <li class="active"><a href="#">Log out</a></li>
            </ul>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>