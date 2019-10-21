<?php
	$liked = false; 	
	$username = $_SESSION['username'];
	$query = "SELECT id FROM blog_users WHERE username = '$username'";
	$user_result = mysqli_query($db,$query);			
	$user_row = mysqli_fetch_array($user_result);		
	$user_id = $user_row['id'];

	//Determines if user has already liked this post
	$query = "SELECT * FROM blog_likes WHERE pid = $pid AND uid = $user_id";
	if(mysqli_query($db,$query)){
		$likes_result = mysqli_query($db,$query);
		if(mysqli_num_rows($likes_result) > 0){
			$liked = true;
		}else{
			$liked = false;
		}
	}
	

?>


<!-- if like is clicked commit to database -->
<?php if (isset($_GET['pid'])){
	$pid = $_GET['pid'];
	//determine if user has liked this post already
	$query = "SELECT * FROM blog_likes WHERE pid = $pid AND uid = $user_id";
	if(mysqli_query($db,$query)){
		$likes_result = mysqli_query($db,$query);
		if(mysqli_num_rows($likes_result) > 0){
			$liked = true;
		}else{
			$liked = false;
		}
	}
	//if post is currently not liked, mark it as liked in db else delete the like if user has already liked this post
	if(!$liked){
		$insert = "INSERT INTO blog_likes (pid,uid) VALUES ($pid,$user_id)";
		mysqli_query($db,$insert);
		
	}else{
		$delete = "DELETE FROM blog_likes WHERE pid = $pid AND uid = $user_id";
		mysqli_query($db,$delete);
		
	}

	//only allowing one like button commit to database
	unset($_GET['pid']);
	header('location: index.php');

}

?>
