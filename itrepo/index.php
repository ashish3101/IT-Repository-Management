<!DOCTYPE html>
<html>
<head>
	<title>
		IT Repository Management
	</title>
	<link href="images/icon_32.jpg" rel="icon" type="image/jpg" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	$hostname = 'localhost';
	$dbname   = 'itpero1';
	$username = 'root';
	$password = 'anshul';

//CONNECT TO SQL SERVER
	$conn_id = mysql_connect($hostname, $username, $password);
	if (!$conn_id)
		die('Unable to Connect to the Mysql Server. Please try again later!!'.mysql_error());
//SELECT THE DATABASE
	if (!mysql_select_db($dbname, $conn_id))
		die('Database Unavailable. Please try again later!!');
?>
<!-- Header Starts -->
<!-- Header Ends -->
<!--Content Starts -->
	<div id="container">
		<div id="heading">Login</div>
		<div id="about">
			<div>
				<form method="POST" class="login">
					<table>
						<tr>
							<td>
								<label for="login">Login Name:</label>
							</td>
							<td>
								<input type="text" name="login" id="login" placeholder="username" required />
							</td>
						</tr>
						<tr>
							<td>
								<label for="password">Password:</label>
							</td>
							<td>
								<input type="password" name="password" id="password" placeholder="password" required />
							</td>
						</tr>
						<tr style='align: center;'>
							<td colspan='2'>
								<input type='submit' value='Enter!' />
							</td>
						</tr>
<?php
	if (isset ($_POST['password']))
	{
		if ($_POST['password'] == 'admin')
		{
			session_start();
			$_SESSION['user'] = "admin";
			header ("Location: panel.php");
		}
		else
			echo "<tr><td style='font-size: 14px; color: #FF0000;'>Invalid Password!</td></tr>";
	}
?>
					</table>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
