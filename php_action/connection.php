<?php
class dbconnect
{
	public static $con;
	function getcon()
	{
		$con=mysqli_connect("localhost","root","")or die
		("Server Error".mysqli_error());
		$db=mysqli_select_db($con,"Company_Name")or 
		die("Unable to connect with the database".mysqli_error());

		return $con;
	}
	function close()
	{
		if(isset($con))
		mysqli_close($con);
	}

}
?>
