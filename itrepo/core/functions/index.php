<?php session_start(); ?>
<?php if($_SESSION['sitedown'] == 1) header('Location: http://'.$_SERVER['HTTP_HOST'].'/maintenance.php'); ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>403 Forbidden</title>
</head><body>
<h1>Forbidden</h1>
<p>You don't have permission to access <?php echo $_SERVER['REQUEST_URI']; ?> 
on this server.</p>
</body></html>
