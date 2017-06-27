<?php echo $data; ?>

<div id="loginContainer" class="container">
  <form action="/welcome/checkLogin" method="POST">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      </div>
    </div>
    <button id="login-btn" type="submit" class="btn btn-primary">Sign in</button>
    <input type="button" class="btn" value="AJAX" id="ajaxbtn"/>
  </form>
</div>
