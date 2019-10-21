<?php include('server.php');

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-dark">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar12"> <a class="navbar-brand d-none d-md-block" href="index.php">
          <i class="fa d-inline fa-lg fa-circle"></i>
          <b> Blog-It-Out</b>
        </a>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-3"> <a class="nav-link" href="post.php">Post</a> </li>
          <li class="nav-item px-3"> <a class="nav-link" href="index.php">Blog-Posts</a> </li>
          <li class="nav-item px-3"> <a class="nav-link" href="myposts.php">My Posts</a> </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item"> <a class="nav-link" href="login.php?logout= '1'">Log out(<?php echo $_SESSION['username'].")"?></a> </li>
          <li class="nav-item"> <a class="nav-link text-primary" href="register.php">Register</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="bg-dark py-4" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12 rounded rounded-left rounded-right rounded-top rounded-bottom border-light border border-left border-right border-top border-bottom bg-dark" style="">
          <h3 class="display-3 text-center text-capitalize text-light bg-dark"><b>Post a Blog Entry</b></h3>
        </div>
      </div>
    </div>
  </div>
  <a id = "posted">
  <div class="text-center" style="background-image: linear-gradient(to left bottom, rgba(189, 195, 199, .75), rgba(44, 62, 80, .75)); background-size: 100%;">
  </a>
    <div class="container">
      <div class="row" style="">
        <div class="mx-auto p-4 col-md-7">
          <h1 class="mb-4" style="color:white;">Tell us All About It!</h1>
          <form method="POST" action="#posted">
            <?php include('errors.php')?>

            <?php include('feedback.php')?>
            <div class="form-group"> <input type="text" class="form-control" id="form34" placeholder="Post Title" name="title"> </div>
            <div class="form-group"> <textarea class="form-control" id="form35" rows="10" placeholder="Your Post" name="content"></textarea>
            </div> <button type="submit" class="btn btn-block btn-outline-dark" name="postBtn" style="color:white;">Post It!</button>
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