<?php
	date_default_timezone_set('America/New_York');
	session_start();
	$username = "";
	$email = "";
	$errors = array();
	$feedback = array();
	$posts = array();
	//connect to the blog database
	$db = mysqli_connect('localhost','root','','blog');



	//Post blog Entry
	if(isset($_POST['postBtn'])){
		$title = mysqli_real_escape_string($db,$_POST['title']);
		$content = mysqli_real_escape_string($db,$_POST['content']);
		$timestamp = "";

		if (empty($title)){
			array_push($errors,"Title is a required field");
		}

		if (empty($content)){
			array_push($errors,"Post Content is a required field");
		}
		
		if(count($errors) == 0){
			$username = $_SESSION['username'];
			$query = "SELECT id FROM blog_users WHERE username = '$username'";
			$result = mysqli_query($db,$query);
			
			$row = mysqli_fetch_array($result);
		
			$author_id = $row['id'];			
			$time = time();
			$timestamp = date("m/d/y h:i:s a",$time);
			$insert = "INSERT INTO `blog_posts` (title,content,post_date,author_id) VALUES ('$title','$content','$timestamp','$author_id')";
			mysqli_query($db,$insert);
			$success = "Blog Post was Submitted Successfully!";
			array_push($feedback,$success);

		}

	
	}

	//update Blog Post
    if(isset($_POST['updateBtn'])){
	    $pid = $_SESSION['pid'];
		$query = "SELECT * FROM `blog_posts` WHERE pid = $pid";
		$result= mysqli_query($db,$query);
		$row = mysqli_fetch_array($result);  

		$pid = $row['pid'];
		$title = $row['title'];
		$content = $row['content'];
		$timestamp = $row['post_date'];
		if(strpos($timestamp,"edited") === false){
		$timestamp = $timestamp." (edited)";
		}
		$author_id = $row['author_id'];
		

	    $updated_title = mysqli_real_escape_string($db,$_POST['update_title']);
	    $updated_content = mysqli_real_escape_string($db,$_POST['update_content']);

	    if (empty($updated_title)){
			array_push($errors,"Title is a required field");
		}

		if (empty($updated_content)){
			array_push($errors,"Post Content is a required field");
		}
		if(count($errors) == 0){
		    $update = "UPDATE `blog_posts` SET title = '$updated_title', content = '$updated_content',post_date = '$timestamp' WHERE pid = '$pid'";
		    if(mysqli_query($db,$update)){
		      array_push($feedback, "Post Updated Successfully!");
		    }else{
		      array_push($errors, "Error Updating Post");
		    }
		}
  	}


	

	//if register btn is clicked
	if (isset($_POST['registerBtn'])){
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$confirm_password = mysqli_real_escape_string($db,$_POST['confirm_password']);

		if (empty($username)){
			array_push($errors,"Username is a required field");
		}

		if (empty($email)){
			array_push($errors,"Email is a required field");
		}

		if (empty($password)){
			array_push($errors,"Password is a required field");
		}
		if (empty($confirm_password)){
			array_push($errors,"Confirm Password is a required field");
		}

		if ($password != $confirm_password) {
			array_push($errors,"Passwords do not match");
		}
		$query = "SELECT * FROM blog_users WHERE username= '$username'";
		$result = mysqli_query($db,$query);
		if($result){
			if (!$result OR mysqli_num_rows($result) > 0) {
				array_push($errors,"An Account with Username: ".$username." already exists");
			}
		}
		$query = "SELECT * FROM blog_users WHERE email = '$email'";
		$result = mysqli_query($db,$query);

		if($result){
			if (mysqli_num_rows($result) > 0) {
				array_push($errors,"An Account with Email: ".$email." already exists");
			}
		}

		//if no errors occur insert form data into users table
		if (count($errors)== 0) {
			//encrypt password using md5 hash
			$password = md5($password);
			$insert = "INSERT INTO blog_users (username,email, password) VALUES ('$username', '$email','$password')"; 
			//execute sql statement
			mysqli_query($db,$insert);

			$success = "User: ".$username." was registered successfully!";
			array_push($feedback,$success);

			$_SESSION['username'] = $username;
			// header("Refresh:0"); 
			// header('location: login.php');#redirect
			
		}
	}


	//login user
	if (isset($_POST['loginBtn'])) {

		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

		// if (isset($_POST['login_checkbox'])){
		// 		  $_SESSION['remembered'] = "is Remembered";
		// 	}	


		if (empty($username)){
			array_push($errors,"Username is a required field");
		}

		if (empty($password)){
			array_push($errors,"Password is a required field");
		}
		if (count($errors)== 0) {
			$password = md5($password);//encrypting password
			$query = "SELECT * FROM blog_users WHERE username= '$username' AND password = '$password'";
			$result = mysqli_query($db,$query);
			//Query to determine user	
			$row = mysqli_fetch_assoc($result);
			$_SESSION['is_admin'] = $row['is_admin'];

			if($result){
				if (mysqli_num_rows($result) == 1){
					//log user in
					$_SESSION['username'] = $username;
					$_SESSION['feedback'] = $username." is now logged in";
					header('location: index.php'); #redirect

				}else{
					array_push($errors, "Wrong username/password combination");

				}
			}
		}
	}


	//logout
	if (isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}

	//Change User Password
	if (isset($_POST['changePwBtn'])) {
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['new_password']);
		$confirm_password = mysqli_real_escape_string($db,$_POST['confirm_new']);

		if (empty($password)){
			array_push($errors,"Password is a required field");
		}
		if (empty($confirm_password)){
			array_push($errors,"Confirm Password is a required field");
		}

		if ($password != $confirm_password){
			array_push($errors,"New passwords did not match");
		}
		if (empty($email)){
			array_push($errors,"Email is a required field");
		}else{

			$query = "SELECT * FROM blog_users WHERE email= '$email'";
			$result = mysqli_query($db,$query);

			if($result){
				if (mysqli_num_rows($result) == 0){
					array_push($errors,"Invalid Email Address");
				}

			}		
		}

		if(count($errors)== 0){
			//change password
			$password = md5($password);
			$query = "UPDATE blog_users SET password ='$password' WHERE email = '$email'";
			mysqli_query($db,$query);

			$query = "SELECT username FROM blog_users WHERE email= '$email'";
			$result = mysqli_query($db,$query);
			$row = mysqli_fetch_array($result);
			$username= $row['username'];
			$success = "Password Changed Successfully for User: ".$username;
			array_push($feedback,$success);
		}

	
	
	}
	
	//delete User
	if (isset($_GET['delete'])){
    $pid = $_GET['delete'];
    $query = "DELETE FROM `blog_posts` WHERE pid = $pid";
    mysqli_query($db,$query);
  	}

		

  
  	
 ?>