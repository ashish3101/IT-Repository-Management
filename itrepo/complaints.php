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
<?php
	$query='SELECT TIMESTAMPDIFF (SECOND, complaint.complaint_date , NOW()) AS time, complaint.item_id, item.item_name, item.complaint, item.replaced, item.replaced_item_id FROM complaint JOIN item ON complaint.item_id=item.item_id WHERE item.replaced!=1';
	$sql=mysql_query($query, $conn_id);
	$i=0;
	
	while ($row=mysql_fetch_array ($sql))
	{
		$logs[$i]="<a href='modify_item.php?item_id=".$row['item_id']."'>ID -> ".$row['item_id'].", Name -> ".$row['item_name']." has been replaced. Enter its details.</a>";
		$i++;
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
		<br />
	</div>
		<div id="about">
			<form method="POST" action='complaint_submit.php'>
				<fieldset id='complaints' style='width: 44%; float: left;'>
					<legend>Complaints</legend>
					<table>
						<tr>
							<td>Item</td>
							<td>
								<select name='complaint_item'>
									<option></option>
<?php
	$query='SELECT item.item_id, item.item_name FROM item WHERE replaced = 0';
	$sql=mysql_query($query, $conn_id);
	if ($sql)
	{
		while ($row=mysql_fetch_array ($sql))
		{
			echo "\t\t\t\t\t\t\t\t\t<option value=\"".$row['item_id']."\">".$row['item_name']."</option>\n";
		}
		
	}
?>
								</select>
							</td>
							<td style='width: 10%;'></td>
							<td>Complaint Date</td>
							<td><input type='text' name='complaint_date' /></td>
						</tr>
						<tr>
							<td>Complaint</td>
							<td><textarea name='complaint'></textarea></td>
						</tr>
						<tr>
							
						</tr>
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>
			</form>
			<fieldset style='float: right; width: 30%;'>
				<legend>Review Items</legend>
	<?php			if (isset($_SESSION['complaint']))
	
		if ($_SESSION['complaint'])
		{
			$_SESSION['log'] ="Complaint details entered successfully";
			echo $_SESSION['log'];
		}
		$_SESSION['complaint']=0;
	?>
<?php
	while ($i != -1)
	{
		echo $logs[$i];
		echo "<br />";
		$i--;
	}
?>
</pre>
			</fieldset>
			<div style='clear: both;'>
			</div>
		</div>
		
	<footer style='position: fixed; bottom: 0px; padding: 10px; font-align: center; color: #920131;'>
<?php
	
?>
		</footer>
</body>
</html>
