<?php if (count($feedback) > 0): ?>
	<div class="feedback">
		<?php foreach ($feedback as $message): ?>
			<p style = "color: white;">
				<?php echo $message ?>	
			</p>
		<?php endforeach ?>		
	</div>
<?php endif ?>