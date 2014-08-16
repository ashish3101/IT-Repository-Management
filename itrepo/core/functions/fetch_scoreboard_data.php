<?php
//	$query = "SELECT * FROM users WHERE level > 0 ORDER BY level DESC, user_id ASC";
	$query = "SELECT * FROM users ORDER BY level DESC, timestamp ASC";
	$fetched_scoreboard = mysql_query ($query, $conn_id);
	$i = 1;
	while ($fetched_scoreboard_array = mysql_fetch_row ($fetched_scoreboard))
	{
		echo "\t\t\t\t<tr class=\"";
		if ($i % 2 == 0)
			echo "even_row";
		else
			echo "odd_row";
		echo "\">\n";
		echo "\t\t\t\t\t<td>".$i."</td>\n";
		if ($fetched_scoreboard_array[4])
			echo "\t\t\t\t\t<td>".$fetched_scoreboard_array[4]."</a></td>\n";
		else
			echo "\t\t\t\t\t<td>".$fetched_scoreboard_array[1]." ".$fetched_scoreboard_array[2]."</a></td>\n";
		echo "\t\t\t\t\t<td>".$fetched_scoreboard_array[8]."</td>\n";
		echo "\t\t\t\t\t<td>".$fetched_scoreboard_array[9]."</td>\n";
		echo "\t\t\t\t</tr>\n";

		$i++;
	}
?>
