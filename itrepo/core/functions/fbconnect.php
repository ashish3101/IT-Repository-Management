<?php
	
	require 'fbconnect/facebook.php';
	
	$facebook = new Facebook (array ( 'appId' => '345018952258555', 'secret' => 'af77ff6d2ecc95a07225820ac799b243' ));

	$user = $facebook->getUser ();

	if ($user)
	{
		try
		{
			$me = $facebook->api ('/me');		/* Stores the information of current logged in user. */
		}
		catch (FacebookApiException $e)
		{
			error_log ($e);
			$user = NULL;
		}
	}

	if ($user)
	{
		$logoutUrl = $facebook->getLogoutUrl (array ( 'next' => 'http://prisonbreak.lnmiit.ac.in/core/functions/logout.php' ));
	}
	else
	{
		$loginUrl = $facebook->getLoginUrl ();
	}
	$fb_user_id = $user;
	$_SESSION['uid'] = $fb_user_id;
?>
