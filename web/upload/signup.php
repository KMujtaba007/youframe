<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Signup</title>
  </head>
  <body>
    <div class="container">
      <div class="signupbox">


      <div class="row">
        <div class="col-md-6 signup">
          <h2>Signup to YouFrame</h2>
          <form action="registration.php" method="post">
            <div class="form-group">
              <label> Username</label>
              <input type="text" name="user" class="form-control" required>
            </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <button type="submit" name="button" class="btn btn-primary">Signup</button>
              <a style="float: right; color: blue;" href="Signin.php">Already a user?</a>
          </form>
        </div>
      </div>
      </div>
    </div>

  </body>
</html>
