<?php
	if ($user)
	{
		echo "<div id=\"user_picture\"><img src=\"http://graph.facebook.com/".$fb_user_id."/picture\" height=\"30\" width=\"30\" /></div>\n";
		if ($custom_username)				
			echo "\t\tWelcome ".$custom_username."!\n";
		else
			echo "\t\tWelcome ".$first_name."!\n";
		echo "\t\t&nbsp;&nbsp;&nbsp;<br />\n";
		echo "\t\t<a href=\"".$logoutUrl."\">LOGOUT</a>\n";
	}
	else
	{
		echo "\t\t<br />\n\t\t<a href=\"".$loginUrl."\" style=\"margin-right: -5px;\">LOGIN WITH FACEBOOK</a>\n";
//		echo "\t\t<br />\n\t\t<a href=\"#\" style=\"margin-right: -5px;\">LOGIN WITH FACEBOOK</a>\n";
	}
?>
