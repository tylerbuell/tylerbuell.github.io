<?php 
	
	//blog posts
	$post = "";
	$query = "SELECT * FROM `blog_posts` ORDER BY pid DESC";
	$result= mysqli_query($db,$query);
?>

	
	<?php if(mysqli_num_rows($result) > 0):?>
		<!-- fetching all post variables from each post in db -->
		<?php while($row = mysqli_fetch_assoc($result)): ?>
			<?php $pid = $row['pid'];
			$_SESSION['pid'] = $pid;
			$title = $row['title'];
			$content = $row['content'];
			$timestamp = $row['post_date'];
			$author_id = $row['author_id'];
			include('likes.php');
			//fetching author username from author_id
			$query = "SELECT * FROM `blog_users` WHERE id = '$author_id'";
			$users_result= mysqli_query($db,$query);
			$users_row = mysqli_fetch_array($users_result);
			$author = $users_row['username'];
			
		    //Getting number of likes for the post
			$query = "SELECT * FROM blog_likes WHERE pid = $pid";
			$likes_result = mysqli_query($db,$query);			
			$num_of_likes = mysqli_num_rows($likes_result);
			?>
			<a id="post<?php echo $pid?>">
			<div class="py-2">
			</a>				
    		<div class="container">    		
      		<div class="row">
        	<div class="col-md-12">			
			<div class="posts">							
			<div class="card">			
            <div class="card-body">                      
            <h2 class="card-title" style="text-align: center;"><b><?php echo $title ?></b></h2>   
            <a id="post_comments<?php echo $pid?>">     	
            <h3 class="card-subtitle my-2 text-muted" style="text-align: center;"><?php echo $content ?></h3>      
            </a> 
            <p class="card-text" style="text-align: center;"><?php echo "Posted by: ".$author." on ".$timestamp ?></p> 
            <p class="card-text" style="color: green; text-align: center;"><?php echo "[ ".$num_of_likes?> <?php if($num_of_likes == 1):?>like ]<?php else:?> likes ]<?php endif ?></p>                     
            <a href="?pid= '<?php echo $pid ?>'#post<?php echo $pid?>" class="card-link" name = "like" style = "color: blue;"><?php if(!$liked):?>Like <?php else: ?> Un-Like <?php endif ?></a>

			<p class="card-text">Comments:</p>				            
            <form method="POST" action="index.php?commentid= '<?php echo $pid ?>'#post_comments<?php echo $pid?>" >		
            <?php include('comment.php') ?>
            <div class="form-group" style="padding-top: 15px;"> <textarea class="form-control" id="form35" rows="3" placeholder="Leave a comment" name="comment"></textarea>
            <!-- <a href="?comment= '<?php echo $pid ?>'" class="card-link" style = "color: blue; float: right; ">Comment</a> -->
            </div>
           	<button type="submit" class="btn btn-block btn-outline-dark" name="postCommentBtn">Post Comment</button>
            </form>            
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
		
    		
        
	


