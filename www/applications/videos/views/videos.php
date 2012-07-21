<?php if(!defined("_access")) die("Error: You don't have permission to access here...");  ?>
		
<div class="videos">
	<?php
		$i = 1;
		foreach($videos as $video) {
		?>
		<?php $URL = path("videos/video/". $video["ID_Video"]); ?>
			<div class="video">
				<h3>
					<a href="<?php echo $URL; ?>" title="<?php echo $video["Title"]; ?>">
						<?php echo $video["Title"]; ?>
					</a>
				</h3>

				<iframe width="300" height="200" src="http://www.youtube.com/embed/<?php echo $video["ID_YouTube"]; ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		<?php
			if($i === 2) {
				echo '<div class="clear"></div><br /><br />';
				$i = 1;
			} else {
				$i++;
			}
		}
	?>

	<?php echo $pagination; ?>	
</div>