<?php if(!defined("_access")) die("Error: You don't have permission to access here...");  ?>
		
<div class="videos">
	<?php
		foreach($videos as $video) {
		?>
		<?php $URL = path("videos/video/". $video["ID_Video"]);?>
			<p class="video-title">
				<h2>
					<a href="<?php echo $URL; ?>" title="<?php echo $video["Title"]; ?>">
						<?php echo $video["Title"]; ?>
					</a>
				</h2>

				<iframe width="800" height="460" src="http://www.youtube.com/embed/<?php echo $video["ID_YouTube"]; ?>" frameborder="0" allowfullscreen></iframe>
			</p>
		<?php
		}
	?>
	
	<br /><br />

	<?php echo $pagination; ?>	
</div>