<?php
	$query = "SELECT * FROM forum".$_GET['q']." ORDER BY post_id DESC LIMIT $start, $limit";
	$fetched_forum = mysql_query ($query, $conn_id);
	$i = 1;
	while ($fetched_forum_array = mysql_fetch_row ($fetched_forum))
	{
		if ($fetched_forum_array[8] == 1)
		{
			$_SESSION["post".$fetched_forum_array[0]] = $fetched_forum_array[1];
			echo "\t\t\t\t\t<tr class=\"";
			if ($i % 2 == 0)
				echo "even_post";
			else
				echo "odd_post";
			echo "\">\n";
			echo "\t\t\t\t\t\t<td>\n";
			if ($fb_user_id == 100000544038460)			/* ADMIN */
				echo "\t\t\t\t\t\t\t<span class=\"forum_post_delete\"><a href=\"delete_post.php?post_id=".$fetched_forum_array[0]."\"><img src=\"images/delete.png\" /></a></span>\n";
			if ($fb_user_id == $fetched_forum_array[1])		/* USER */
				echo "\t\t\t\t\t\t\t<span class=\"forum_post_delete\"><a href=\"delete_post.php?post_id=".$fetched_forum_array[0]."\"><img src=\"images/delete.png\" /></a></span>\n";
			echo "\t\t\t\t\t\t\t<span class=\"user_picture\"><img src=\"https://graph.facebook.com/".$fetched_forum_array[1]."/picture\" height=\"40\" width=\"40\" /></span>\n";
			if ($fetched_forum_array[4])
				echo "\t\t\t\t\t\t\t<span class=\"user_name\">".$fetched_forum_array[4]."</span><br />\n";
			else
				echo "\t\t\t\t\t\t\t<span class=\"user_name\">".$fetched_forum_array[2]." ".$fetched_forum_array[3]."</span><br />\n";
			echo "\t\t\t\t\t\t\t<span class=\"college_name\">".$fetched_forum_array[5]."</span><br /><br />\n";
			echo "\t\t\t\t\t\t\t<hr size=\"0\" />\n";
			echo "\t\t\t\t\t\t\t<span class=\"user_post\">".$fetched_forum_array[6]."</span>\n";
			echo "\t\t\t\t\t\t\t</td>\n";
			echo "\t\t\t\t\t</tr>\n";
			$i++;
		}
	}
?>
