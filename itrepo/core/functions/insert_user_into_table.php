<?php
//	$query = "SELECT * FROM users WHERE fb_user_id=$user";

//	if (mysql_query($query, $conn_id))
//	{
		require 'extract_user_info_from_fb.php';

		$query = "INSERT INTO users ( first_name, last_name, fb_username, fb_user_id, fb_profile_link, email, college ) VALUES (\"".$first_name."\", \"".$last_name."\", \"".$fb_username."\", ".$fb_user_id.", \"".$fb_profile_link."\", \"".$email."\", \"".$college."\")";
		mysql_query($query, $conn_id);
//	}
?>