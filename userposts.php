<?php
	//fetching logged in user id
	$user = $_SESSION['username'];
	$query = "SELECT * FROM `blog_users` WHERE username = '$user'";
	$result= mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($result);
	$user_id = $row['id'];
	$is_admin = $_SESSION['is_admin'];
	if(!$is_admin){
		$query = "SELECT * FROM `blog_posts` WHERE author_id = '$user_id'";
	}else{
		$query = "SELECT * FROM `blog_posts` ORDER BY post_date DESC" ;
	}
	//User blog posts
	$post = "";
	$result= mysqli_query($db,$query);


?>
	
	<?php if(mysqli_num_rows($result) > 0):?>
		<!-- fetching all post variables from each post in db -->
		<?php while($row = mysqli_fetch_assoc($result)): ?>
			<?php
			if(isset($_SESSION['$prev_pid'])){
				$prev_pid = $_SESSION['$prev_pid'];
			}
			$pid = $row['pid'];
			$_SESSION['$prev_pid']= $pid;
			$title = $row['title'];
			$content = $row['content'];
			$timestamp = $row['post_date'];
			$author_id = $row['author_id'];

			//fetching author username from author_id
			$query = "SELECT * FROM `blog_users` WHERE id = '$author_id'";
			$users_result= mysqli_query($db,$query);
			$users_row = mysqli_fetch_array($users_result);
			$author = $users_row['username'];

			$query = "SELECT * FROM blog_likes WHERE pid = $pid";
			$likes_result= mysqli_query($db,$query);
			$likes = mysqli_num_rows($likes_result);
			?>

			<div class="py-2">
			<a id="comment<?php echo $pid ?>">
    		<div class="container">
    		</a>
      		<div class="row">
        	<div class="col-md-12">
			<div class="posts">				
			<div class="card">
            <div class="card-body">
            <h2 class="card-title"><b><?php echo $title ?></b></h2>
            <h3 class="card-subtitle my-2 text-muted"><?php echo $content ?></h3>
            <p class="card-text"><?php echo "Posted by: ".$author." on ".$timestamp ?></p>
            <p class="card-text" style="color: green;"><?php echo "[ Likes: ".$likes." ]"?></p>               
            <a href="?delete= '<?php echo $pid?>'#comment<?php echo $prev_pid ?>" style = "color: red;"class="card-link" ">Delete Post</a>
            <a href="editpost.php?pid= '<?php echo $pid?>'" style = "color: blue;"class="card-link">Edit Post</a>		        
			</div>
			</div>
          	</div>
        	</div>
      		</div>
    		</div>
  			</div>
	    <?php endwhile ?>	
		<?php else: ?>
		<h2 class ="no-posts" align="center" style="color:white; padding-top: 50px;" >No posts to display</h2>
		<?php endif ?>

		