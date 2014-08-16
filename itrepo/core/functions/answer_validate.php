<?php
	require 'ff3d39b625aa4ed9bed510f713f70df855c528ea/e3d9bca2ecaf11825872780f9493ca0df05ec56a.php';
	if ($_SESSION['uid'] != 0)
	{
		if ($_SESSION['level'] == 2)
		{
			if (isset($_POST['flag']))
			{
				if (sha1($_POST['flag']) == $level2_answer)
				{
					$query = "UPDATE users SET level = 2, timestamp = NOW() WHERE fb_user_id = ".$_SESSION['uid'];
					mysql_query ($query, $conn_id);
					header ('Location: https://www.facebook.com/dialog/feed?app_id=345018952258555&link=http%3A%2F%2Fprisonbreak.hostoi.com%2Fprison_break%2F&picture=http%3A%2F%2Fprisonbreak.hostoi.com%2Fprison_break%2Fimages%2Fmap.jpg&name=Prison+Break&caption=Level+2+Cleared&redirect_uri=http%3A%2F%2Fprisonbreak.hostoi.com%2Fprison_break%2Fchallenges.php');
				}
			}
		}

		if ($_SESSION['level'] == 3)
		{
			if (isset($_POST['flag']))
			{
				if (sha1($_POST['flag']) == $level3_answer)
				{
					$query = "UPDATE users SET level = 3, timestamp = NOW() WHERE fb_user_id = ".$_SESSION['uid'];
					mysql_query ($query, $conn_id);
				}
			}
		}

		if ($_SESSION['level'] == 6)
		{
			if (isset($_POST['flag']))
			{
				if (sha1($_POST['flag']) == $level3_answer)
				{
					$query = "UPDATE users SET level = 3, timestamp = NOW() WHERE fb_user_id = ".$_SESSION['uid'];
					mysql_query ($query, $conn_id);
				}
			}
		}

		if ($_SESSION['level'] == 8)
		{
			if (isset($_POST['flag']))
			{
				if (sha1($_POST['flag']) == $level8_answer)
				{
					$query = "UPDATE users SET level = 8, timestamp = NOW() WHERE fb_user_id = ".$_SESSION['uid'];
					mysql_query ($query, $conn_id);
				}
			}
		}

		$query = "SELECT level FROM users WHERE fb_user_id = ".$_SESSION['uid'];
		$result = mysql_fetch_array(mysql_query($query, $conn_id));
		$_SESSION['level'] = $result['level'] + 1;
	}
?>