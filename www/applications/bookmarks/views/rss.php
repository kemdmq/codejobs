<?php if(!defined("_access")) die("Error: You don't have permission to access here..."); 		

header("Content-Type: application/rss+xml"); 
echo "<?xml version='1.0' encoding='utf-8'?>";
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom"> 
  <channel> 
    <title><![CDATA[Codejobs - <?php echo __(_("Bookmarks")) ?> ]]></title> 
    <link><![CDATA[http://www.codejobs.com/]]></link> 
    <description><![CDATA[RSS Codejobs]]></description>
    <language>es-es</language> 
    <copyright><![CDATA[Codejobs]]></copyright>
    <atom:link href="<?php echo path("bookmarks/rss"); ?>" rel="self" type="application/rss+xml" />
    

	<image>
		<url> </url>

		<title>Codejobs - <?php echo __(_("Bookmarks")); ?></title>
		<link><?php echo path()?></link>
	</image>
	<?php 
	if(is_array($bookmarks)) {	
	
	foreach($bookmarks as $bookmark) {

		
	?>
			
		<item>
		<title>
		<![CDATA[<?php echo $bookmark["Title"]; ?>]]>
		</title>
		<link>
		<![CDATA[<?php echo $bookmark["URL"]; ?>]]>
		</link>
		<description>
		<![CDATA[<?php echo $bookmark["Description"]; ?>]]>
		</description>
		<guid isPermaLink="true">
		<![CDATA[]]>
		</guid>
		<author>
		<![CDATA[<?php echo $bookmark["Author"]; ?>]]>
		</author>
		<pubDate>
		<![CDATA[<?php echo $bookmark["Start_Date"]; ?>]]>
		</pubDate>
		</item>
	<?php
		}
	}
	 ?>	
  </channel>

</rss>