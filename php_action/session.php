<?php
session_start();
if(!isset($_SESSION["login"]["uname"]))
{
    
	header("Location:index.php");
}
?>
       