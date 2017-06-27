<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <?php
        
        foreach ($data as $key => $value) {
          if($key == $info){
          echo '<li class="active">
            <a href = "' .$value. '" >' .$key. '</a>
            </li>';
          }
          else {
            echo '<li class="">
              <a href = "' .$value. '" >' .$key. '</a>
            </li>';

          }
        }
        ?>
      </ul>
     <span style="color:red"><?=@$_REQUEST["msg"]?@$_REQUEST["msg"]: '';?></span>
        <?php if(@$_SESSION && @$_SESSION["loggedin"]==1){ ?>
          <form class="navbar-form navbar-right">
            <a href="/profile">Profile</a>
            <a href="/auth/logout">Logout</a>
          </form>
        <?php } else{ ?>
          <form class="navbar-form navbar-right" role="search" method="POST" action="/auth/login">
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="username">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="password" placeholder="password">
            </div>
            <button type="submit" class="btn btn-default">Sign In</button>
          </form>
        <?php } ?>

    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>