 <!DOCTYPE html>
<html>
<head>
	<title>
		IT Repository Management
	</title>
	<link href="images/icon_32.jpg" rel="icon" type="image/jpg" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="js/show_hide.js"></script>
</head>
<body>
<?php
	$hostname = 'localhost';
	$dbname   = 'itpero1';
	$username = 'root';
	$password = 'anshul';

	$conn_id = mysql_connect($hostname, $username, $password);
	if (!$conn_id)
		die('Unable to Connect to the Mysql Server. Please try again later!!'.mysql_error());
	if (!mysql_select_db($dbname, $conn_id))
		die('Database Unavailable. Please try again later!!');
?>
<?php
	session_start ();
	if ($_SESSION['user']!="admin")
	{
		header ("Location: index.php");
	}
?>
	<div id="container">
		<div id="heading"><a href='panel.php'>Control Panel</a></div>
		<div style='float: right;'><a href='logout.php'>Logout</a></div>
		<br /><br />
		<header>
			<nav style='align: center;'>
				<ul id="menu">
					<li style='padding: 6px;'><a href="add.php">Add</a></li>
					<li style='padding: 6px;'><a href="delete.php">Delete</a></li>
					<li style='padding: 6px;'><a href="modify.php">Modify</a></li>
					<li style='padding: 6px;'><a href="view.php">View</a></li>
					<li style='padding: 6px;'><a href="search.php">Search</a></li>
					<li style='padding: 6px;'><a href="complaints.php">Complaints</a></li>
				</ul>
			</nav>
		</header>
		<br /><br /><br />
		<div id="about">
			<form method="POST" action='delete1.php'>
				<fieldset id='itemdetails' >
					<legend>Item Details</legend>
					<table class='add_item'>
						<tr id='delete_item'>
							<td>Item ID</td>
							<td>
								<select name='item_id' >
									<option></option>
<?php
	$query='SELECT item.item_id,item.item_name FROM item WHERE replaced!=1';
	$sql=mysql_query($query, $conn_id);
	if ($sql)
	{
		while ($row=mysql_fetch_array ($sql))
		{
			echo "\t\t\t\t\t\t\t\t\t<option name=\"".$row['item_id']."\" value=\"".$row['item_id']."\">".$row['item_name']."</option>\n";
		}
		
	}
?>
								</select>
							</td>
						</tr>
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>
			</form>
		</div>
	</div>
	<footer style='position: fixed; bottom: 0px; padding: 10px; font-align: center; color: #920131;'>
<?php
	if (isset($_SESSION['d_item']))
	{
		if ($_SESSION['d_item'])
			echo "Item deleted successfully";
		$_SESSION['d_item']=0;
	}
?>
		</footer>
</body>
</html>
