<?php if(!defined("_access")) die("Error: You don't have permission to access here..."); ?>

<div class="codes">
	<h2>
		<?php echo getLanguage($code["Language"], TRUE); ?> <a href="<?php echo path("codes/". $code["ID_Code"] . "/" . $code["Slug"]); ?>" title="<?php echo $code["Title"]; ?>"><?php echo $code["Title"]; ?></a>
	</h2>

	<span class="small italic grey">
		<?php 
			echo __(_("Published")) ." ". howLong($code["Start_Date"]) ." ". __(_("by")) .' <a title="'. $code["Author"] .'" href="'. path("users/". $code["Author"]) .'">'. $code["Author"] .'</a> '; 
			 
			if($code["Tags"] !== "") {
				echo __(_("in")) ." ". exploding($code["Tags"], "codes/tag/");
			}
		?>			
		<br />

		<?php 
			echo '<span class="bold">'. __(_("Likes")) .":</span> ". (int) $code["Likes"]; 
			echo ' <span class="bold">'. __(_("Dislikes")) .":</span> ". (int) $code["Dislikes"];
			echo ' <span class="bold">'. __(_("Views")) .":</span> ". (int) $code["Views"];
		?>
	</span>
		
	<p><textarea id="code" data-mime="<?php echo $code["Syntax"];?>"><?php echo $code["Code"]; ?></textarea></p>

	<?php
		if(SESSION("ZanUser")) {
	?>
			<p class="small italic">
				<?php  echo like($code["ID_Code"], "codes", $code["Likes"]) ." ". dislike($code["ID_Code"], "codes", $code["Dislikes"]) ." ". report($code["ID_Code"], "codes"); ?>
			</p>
	<?php
		}
	?>

	<div class="codes-social">		
		<div class="fb-like logo-facebook" data-href="<?php echo path("codes/go/". $code["ID_Code"]); ?>" data-send="false" data-layout="button_count" data-width="45" data-show-faces="true" data-font="arial"></div>
			
		<a href="https://twitter.com/share" data-url="<?php echo path("codes/go/". $code["ID_Code"]);?>" data-text="<?php echo $code["Title"]; ?>" class="twitter-share-button logo-twitter" data-via="codejobs" data-lang="es" data-related="codejobs.biz" data-count="none" data-hashtags="codejobs.biz">
			<?php echo __(_("Tweet")); ?>
		</a>

		<div class="clear"></div>
	</div>

        <p><div class="fb-comments" data-href="<?php echo path("codes/". $code["ID_Code"] ."/". $code["Slug"]); ?>" data-num-posts="2" data-width="750"></div></p>
	<p>
		<a href="<?php echo path("codes"); ?>">&lt;&lt; <?php echo __(_("Go back")); ?></a>
	</p>
</div>
<?php
    $syntaxFiles = array_unique(getFilesByMIME(array($code["Syntax"])));
    foreach ($syntaxFiles as $syntaxFile) $this->js("CodeMirror/mode/$syntaxFile.js", "codes");
    echo $this->js;
?>
<script type="text/javascript">
    var editor = CodeMirror.fromTextArea($("#code").get(0), {
        lineNumbers: true,
        matchBrackets: true,
        mode: $("#code").dataset("mime"),
        readOnly: "nocursor",
        theme: "monokai"
    });
</script>