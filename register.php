<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css">
</head>

<body>
  <div class="py-5 text-center bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-5 col-lg-6 col-10 mx-auto border">
          <h1 class="mb-4">Blog Registration</h1>
          <form method="POST" action="register.php">
            <!--Displaying validation erros here-->
            <?php include('errors.php')?>
            <!--Displaying Feedback message here-->
            <?php include('feedback.php')?>
            <div class="form-group"> <input type="text" class="form-control" placeholder="Username" name="username"> </div>
            <div class="form-group"> <input type="email" class="form-control" placeholder="Email" name="email"> </div>
            <div class="form-group"> <input type="password" class="form-control" placeholder="Password" name="password">
              <div class="form-group"><input type="password" class="form-control mt-2" placeholder="Confirm Password" name="confirm_password"></div> <small class="form-text text-muted text-right">
                <a href="login.php"> Already have an account?</a>
              </small>
              
            </div> <button type="submit" class="btn btn-primary" name="registerBtn">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  
</body>

</html>