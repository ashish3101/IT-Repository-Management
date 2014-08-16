<?php
	$query = "SELECT * FROM users WHERE fb_user_id=$fb_user_id";
	$fetched_user = mysql_query ($query, $conn_id);
	$fetched_user_array = mysql_fetch_row ($fetched_user);

	$first_name = $fetched_user_array[1];
	$last_name = $fetched_user_array[2];
	$fb_username = $fetched_user_array[3];
	$custom_username = $fetched_user_array[4];
	$fb_user_id = $fetched_user_array[5];
	$fb_profile_link = $fetched_user_array[6];
	$email = $fetched_user_array[7];
	$college = $fetched_user_array[8];
	$level = $fetched_user_array[9];
	$phone = $fetched_user_array[10];
	$bonus = $fetched_user_array[11];
?>	
