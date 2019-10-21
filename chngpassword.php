<?php include('server.php')?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.2.1.css">
</head>

<body >
  <div class="py-5 text-center bg-dark text-white" style="">
    <div class="container">
      <div class="row">
        <div class="p-5 col-lg-6 col-10 mx-auto border">
          <h1 class="mb-4">Change Password</h1>
          <form method="POST" action="chngpassword.php">

            <?php include('errors.php')?>
            <?php include('feedback.php')?>

            <div class="form-group"> <input type="email" class="form-control my-1" placeholder="Email" name= email id="form14"> </div>
            <div class="form-group"> <input type="password" class="form-control" placeholder="New Password" name="new_password" id="form15">
              <div class="form-group my-3"><input type="password" class="form-control py-0" placeholder="Confirm New Password" name="confirm_new" id="form15"></div>
              <small class="form-text text-muted text-right">
                <a href="login.php"> Login</a>
              </small>
            </div>
            <button type="submit" class="btn btn-primary" name ="changePwBtn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>