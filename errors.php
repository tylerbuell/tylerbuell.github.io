<?php $error_count = 0; ?>
	<?php if (count($errors) > 0): ?>
		
		<div class = "error">
			<h5 align = center style = "color:red;">-------Invalid Input-------</h5>
			<?php foreach ($errors as $error): ?>
				<?php $error_count += 1; ?>
				<p align = center  style = "color:red;"> <?php echo $error_count. ". " . $error; ?></p>		
			<?php endforeach ?>
		</div>
	<?php endif ?>

