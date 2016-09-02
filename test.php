<?php
	ini_set("display_errors", "On");
	error_reporting(E_ALL | E_STRICT);

	//echo("tt");	

	session_start();
	
	$conn=mysql_connect("127.0.0.1:3306","root","cailun781");
	mysql_select_db("sampledb");
	mysql_query("set names utf8");
	
	//echo("test");
	//phpinfo();

	//$con = mysql_connect("127.0.0.1:3306","root","cailun781");
	//if (!$con)
  	//{
  //		die('Could not connect: ' . mysql_error());
  //	}

	// some code

	mysql_close($conn);
?>
