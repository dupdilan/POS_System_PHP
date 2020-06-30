
<?php

	include("connection.php");
    

	$id=$_POST["txtitemid"];
	$name=$_POST["txtitemname"];
    $dec=$_POST["txtitemdes"];
    $cost=$_POST["txtitemcost"];
    $sales=$_POST["txtitemsales"];
    
    
    

//add location
    if($_POST["btnadditems"]=='additems') {   
        
        
	$dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="INSERT INTO tbl_items(id,name,des,costPrice,salesPrice) VALUES('$id','$name','$dec','$cost','$sales')";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("This Items ID is Already added please try another".mysqli_error());
	
	if($result==true)
	{
        
        echo'alert("SUCCESS!!!!")';
		header("Location:../items.php?success=1");
        
	}else{
        echo'alert("Fail!!!!")';
		header("Location:../items.php?error=1");
        
    }
//edit location
    }
    else if($_POST["btnedititems"]=='edititems') {   
	
       
        
	$dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="UPDATE tbl_items SET name='$name',des='$dec',costPrice='$cost',salesPrice='$sales' WHERE id='$id'";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("check item id correctly".mysqli_error());
	
	if($result==true)
	{
        echo'alert("SUCCESS!!!!")';
		header("Location:../items.php?success=1");
        
	}else{
        echo'alert("Fail!!!!")';
		header("Location:../items.php?error=1");
        
    }

//delete location
    }
    else if($_POST["btndeleteitems"]=='deleteitems') {   
	
    $dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="DELETE FROM tbl_items WHERE id='$id'";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("This item ID is not detected please try another".mysqli_error());
	
	if($result==true)
	{
        echo"SUCCESS!!!!";
		header("Location:../items.php?success=1");
        
	}else{
        echo"Fail!!!!";
		header("Location:../items.php?error=1");
        
    }
    

    }



?>