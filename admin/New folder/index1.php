<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:..\index.php');
}


echo $_SESSION['username'];
echo "<br><a href='logout.php'>logout</a>"

?>