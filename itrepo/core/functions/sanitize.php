<?php
	/*PASS EVERY DATA THROUGH THIS FUNCTION TO PREVENT SQL INJECTION*/
	function sanitize ($data)
	{
		return mysql_real_esape_string ($data);
	}
?>
