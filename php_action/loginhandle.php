<?php
session_start();

require("connection.php");
if(isset($_POST["btnsubmit"]))
{
	$username=$_POST["txtusername"];
	$password=$_POST["txtpassword"];
	
	
	
	$dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="SELECT uname,upassword FROM tbl_user WHERE uname='$username'";
	$res=mysqli_query($con,$sql)or die
	("Can not connect with the table ".mysqli_error());
    
	$nor=mysqli_num_rows($res);
    
	if($nor>0)
	{
		$rec=mysqli_fetch_Array($res);
		
		$pssword=$rec["upassword"];
		if($password==$pssword)
		{
			//Creating sessions and storing values
			$_SESSION["login"]["uname"]=$username;
            
                
			header("Location:../dashbord.php");
		}else{
            
            header("Location:../index.php?error=1");
        }
	}
	else
	{
		header("Location:../index.php?error=1");
	}
	
}
?>