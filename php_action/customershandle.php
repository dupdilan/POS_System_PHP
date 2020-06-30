
<?php

	include("connection.php");
    

	$id=$_POST["txtcustomerid"];
	$name=$_POST["txtcustomername"];
    $tp=$_POST["txttp"];
    $lorry=$_POST["txtlorryNb"];
    

//add location
    if($_POST["btnaddcus"]=='addcustomers') {   
        
        
	$dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="INSERT INTO tbl_customers(id,name,telephone,lorrynumber) VALUES('$id','$name','$tp','$lorry')";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("This Customer ID is Already added please try another".mysqli_error());
	
	if($result==true)
	{
        
        echo'alert("SUCCESS!!!!")';
		header("Location:../customers.php?success=1");
        
	}else{
        echo'alert("Fail!!!!")';
		header("Location:../customers.php?error=1");
        
    }
//edit location
    }
    else if($_POST["btneditcus"]=='editcustomers') {   
	
       
        
	$dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="UPDATE tbl_customers SET name='$name',telephone='$tp',lorrynumber='$lorry' WHERE id='$id'";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("check customer id correctly".mysqli_error());
	
	if($result==true)
	{
        echo'alert("SUCCESS!!!!")';
		header("Location:../customers.php?success=1");
        
	}else{
        echo'alert("Fail!!!!")';
		header("Location:../customers.php?error=1");
        
    }

//delete location
    }
    else if($_POST["btndeletecus"]=='deletecustomers') {   
	
    $dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="DELETE FROM tbl_customers WHERE id='$id'";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("This customer ID is not detected please try another".mysqli_error());
	
	if($result==true)
	{
        echo"SUCCESS!!!!";
		header("Location:../customers.php?success=1");
        
	}else{
        echo"Fail!!!!";
		header("Location:../customers.php?error=1");
        
    }
    

    }



?>