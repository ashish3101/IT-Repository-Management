<?php
	$last_update_day = mysql_fetch_array (mysql_query ("SELECT DATEDIFF (NOW(), '".$last_update_stamp[D-M-Y]."') as date_diff", $conn_id));
	$last_update_time = mysql_fetch_array (mysql_query ("SELECT TIMEDIFF (NOW(), '".$last_update_stamp[D-M-Y]."') as time_diff", $conn_id));

	if ($last_update_day['date_diff'] != 0)
	{
		if ($last_update_day['date_diff'] == 1)
			$last_update_message = '1 Day Ago';
		else
			$last_update_message = $last_update_day['date_diff'].' Days Ago';
	}
	else
	{
		list($hour, $min, $sec) = explode(":", $last_update_time['time_diff']);
		$hour = (int)$hour;
		$min = (int)$min;
		$sec = (int)$sec;
		if ($hour != 0)
		{
			if ($hour === 1)
				$last_update_message = '1 Hour Ago';
			else
				$last_update_message = $hour.' Hours Ago';
		}
		else if ($min != 0)
		{
			if ($min === 1)
				$last_update_message = '1 Minute Ago';
			else
				$last_update_message = $min.' Minutes Ago';
		}
		else
			$last_update_message = 'Few Seconds Ago';
	}
?>