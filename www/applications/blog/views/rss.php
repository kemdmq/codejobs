<?php if(!defined("_access")) die("Error: You don't have permission to access here..."); 		
	
header("Content-Type: application/rss+xml"); 
echo "<?xml version='1.0' encoding='utf-8'?>";
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom"> 
  <channel> 
    <title><![CDATA[Codejobs - <?php echo __(_("Blog")); ?>  ]]></title> 
    <link><![CDATA[http://www.codejobs.com/]]></link> 
    <description><![CDATA[RSS Codejobs]]></description>
    <language>es-es</language> 
    <copyright><![CDATA[Codejobs]]></copyright>
    <atom:link href="<?php echo path("blog/rss"); ?>" rel="self" type="application/rss+xml" />
    

	<image>
		<url></url>

		<title>Codejobs - <?php echo __(_("blog")); ?></title>
		<link><?php echo path(); ?></link>
	</image>
	<?php 
	if(is_array($posts)) {		
	foreach($posts as $post) {

		$lock = (strlen($post["Pwd"]) === 40) ? img(get("webURL") . _sh . _lock, array("alt" => __("Private"), "class" => "no-border")) : NULL;
		$URL = path("blog/". $post["Year"] ."/". $post["Month"] ."/". $post["Day"] ."/". $post["Slug"]);
	?>
			
		<item>
		<title>
		<![CDATA[<?php echo $lock . $post["Title"]; ?>]]>
		</title>
		<link>
		<![CDATA[<?php echo $URL; ?>]]>
		</link>
		<description>
		<![CDATA[<?php echo $post["Content"]; ?>]]>
		</description>
		<guid isPermaLink="true">
		<![CDATA[<?php echo $URL; ?>]]>
		</guid>
		<author>
		<![CDATA[<?php echo $post["Author"];?>]]>
		</author>
		<pubDate>
		<![CDATA[<?php echo howLong($post["Start_Date"]); ?>]]>
		</pubDate>
		</item>
	<?php
		}
	}
	 ?>	
  </channel>

</rss>