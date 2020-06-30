
<?php

	include("connection.php");
    

	$userid=$_POST["txtuserid"];
	$username=$_POST["txtusername"];
    $userpassword=$_POST["txtpassword"];
    
    
    

//add location
    if($_POST["btnadduser"]=='adduser') {   
        
        
	$dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="INSERT INTO tbl_user(uid,uname,upassword)VALUES('$userid','$username','$userpassword')";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("This User ID is Already added please try another".mysqli_error());
	
	if($result==true)
	{
        
        echo'alert("SUCCESS!!!!")';
		header("Location:../users.php?success=1");
        
	}else{
        echo'alert("Fail!!!!")';
		header("Location:../users.php?error=1");
        
    }
//edit location
    }
    else if($_POST["btnedituser"]=='edituser') {   
	
       
        
	$dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="UPDATE tbl_user SET uname='$username',upassword='$userpassword' WHERE uid='$userid'";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("check User id correctly".mysqli_error());
	
	if($result==true)
	{
        echo'alert("SUCCESS!!!!")';
		header("Location:../users.php?success=1");
        
	}else{
        echo'alert("Fail!!!!")';
		header("Location:../users.php?error=1");
        
    }

//delete location
    }
    else if($_POST["btndeleteuser"]=='deleteuser') {   
	
    $dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="DELETE FROM tbl_user WHERE uid='$userid'";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("This User ID is not detected please try another".mysqli_error());
	
	if($result==true)
	{
        echo"SUCCESS!!!!";
		header("Location:../users.php?success=1");
        
	}else{
        echo"Fail!!!!";
		header("Location:../users.php?error=1");
        
    }
    

    }



?>