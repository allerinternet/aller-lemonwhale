<object width="<?php print $width; ?>" height="<?php print $height; ?>">
  <param name="movie" value="<?php print $movie; ?>"></param>
  <param name="allowfullscreen" value="true"></param>
  <param name="allowscriptaccess" value="always"></param>
  <param name="wmode" value="transparent">
  <param name="flashvars" value="sitegroupid=<?php print $sitegroupid; ?>&videoid=<?php print $args['videoid']; ?>&playerinstanceid=<?php print $playerinstanceid; ?>&playersettingsid=<?php print $playersettingsid; ?>&siteid=<?php print $siteid; ?>&slotid=&userid=&paneltype=<?php print $paneltype; ?>" ></param>
  
  <embed src="http://swf.lwcdn.com/flash11/Satellite.swf" quality="high" bgcolor="#000000" width="<?php print $width; ?>" height="<?php print $height; ?>" name="<?php print $movie_short; ?>" align="middle" allowScriptAccess="always" allowFullScreen="true" type="application/x-shockwave-flash" wmode="transparent" flashvars="sitegroupid=<?php print $sitegroupid; ?>&videoid=<?php print $args['videoid']; ?>&playerinstanceid=<?php print $playerinstanceid; ?>&playersettingsid=<?php print $playersettingsid; ?>&siteid=<?php print $siteid; ?>&slotid=&userid=&paneltype=<?php print $paneltype; ?>" pluginspage="http://www.macromedia.com/go/getflashplayer" ></embed>
</object>