<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="signinbox">


      <div class="row">
        <div class="col-md-6 signin">
          <h2>Welcome to YouFrame</h2>
          <form action="validation.php" method="post">
            <div class="form-group">
              <label> Username</label>
              <input type="text" name="user" class="form-control" required>
            </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <button type="submit" name="button" class="btn btn-primary">Login</button>
              <a style="float: right; color: blue;" href="Signup.php">New Here?</a>
          </form>

        </div>
      </div>
      </div>
    </div>

  </body>
</html>
