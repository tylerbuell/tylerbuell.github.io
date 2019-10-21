<?php 			
			$username = $_SESSION['username'];
			$comments = False;
			$query = "SELECT id FROM blog_users WHERE username = '$username'";
			$user_result = mysqli_query($db,$query);			
			$user_row = mysqli_fetch_array($user_result);		
			$author_id = $user_row['id'];
?>
<!-- if comment is posted commit to database -->
<?php if(isset($_POST['postCommentBtn'])): ?>
	<?php 
		$pid = $_GET['commentid'];
		$comment = mysqli_real_escape_string($db,$_POST['comment']);	
	    $time = time();
		$timestamp = date("m/d/y h:i:s a",$time); 

	if(!empty($comment)){
	$insert = "INSERT INTO blog_comments (pid,comment,post_date,author_id) VALUES ($pid,'$comment','$timestamp','$author_id')";
	mysqli_query($db,$insert);
	}
//only allowing one post button commit to database
unset($_POST['postCommentBtn']);
?>
<?php endif ?>

<?php 
//select blog comments
$query = "SELECT * FROM blog_comments";
			$comment_result = mysqli_query($db,$query);			
			// $comment_row = mysqli_fetch_array($comment_result);		
			
?>
	

<?php if(mysqli_num_rows($comment_result) > 0):?>
		<!-- fetching all post comment attributes -->
		<?php while($comment_row = mysqli_fetch_assoc($comment_result)): ?>
			<?php
			 
			$comment = $comment_row['comment'];
			$comment_pid = $comment_row['pid'];
			$post_date = $comment_row['post_date'];
			$author_id = $comment_row['author_id'];

			//getting author username
			$query = "SELECT * FROM `blog_users` WHERE id = '$author_id'";
			$users_result= mysqli_query($db,$query);
			$users_row = mysqli_fetch_array($users_result);
			$author = $users_row['username'];
			?>
			<!-- if comment belongs to post, then display all those comments -->
			<?php if($comment_pid == str_ireplace("'", "",$_SESSION['pid'])): ?>
			<div style = "border: 1px solid black; padding: 5px; margin: 5px; border-radius: 15px;">
				<p class="card-text" style="color: white; background-color: black; border-radius: 8px; padding-left: 5px;"><?php echo $author." said: ".$comment."<br>Date Posted: ".$post_date ?> </p>
			</div>
			<?php $comments = True; ?>
			<?php endif ?>
		<?php endwhile ?>		
<?php endif ?>

<!-- if there are no comments to display  -->
<?php if($comments == False): ?>
<p class="card-text">No Comments to Display</p>
<?php endif ?>