
<?php
	include("connection.php");

		$invoiceId=$_POST["txtInvoiceId"];
		$itemName=$_POST["itemName"];
		$qty=$_POST["txtqty"];
		$price=$_POST["txtItemPrice"];
		$total=$_POST["txttot"];
    
    
    
	// echo $itemName;
//add Order
        
        
	$dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="INSERT INTO  tbl_invoiceitems(invoiceId,itemName,price,qty,total) VALUES('$invoiceId','$itemName','$price','$qty','$total')";
	
	//executting the sql message
	$result=mysqli_query($con,$sql) or die("This Invoice ID is Already added please try another".mysqli_error());
	
	if($result==true)
	{
        $sql1 = "UPDATE tbl_items SET qty = qty +'$qty' WHERE name='$itemName' ";
		$result1 = mysqli_query($con,$sql1);
        if($result1 == true){ 
			echo'alert("SUCCESS!!!!")';
			header("Location:../sales.php?success=1");
		}
       
		
        
	}else{
        echo'alert("Fail!!!!")';
		header("Location:../sales.php?error=1");
        
    }

	$dbobj->close();

	
?>