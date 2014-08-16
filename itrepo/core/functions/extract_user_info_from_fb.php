<?php
	$first_name = $me['first_name'];
	$last_name = $me['last_name'];
	$fb_username = $me['username'];
	$fb_user_id = $me['id'];
	$fb_profile_link = $me['link'];
	$email = $me['email'];
	$i = 0;
	while ($i < 4)
	{
		if ( $me['education'][$i]['type'] === 'College' )
		{
			$college = $me['education'][$i]['school']['name'];
			break;
		}
		else
		{
			$college = '';
		}
		$i++;
	}
?>
