
<?php
	include("connection.php");
    
    if($_POST["btncreatePurchaseInvoice"]=='createPurchaseInvoice') {   

        $invoiceId=$_POST["txtInvoiceId"];
        // $customerName=$_POST["txtcustomerName"];
        $note=$_POST["txtnote"];
        $cash = $_POST["txtCash"];
        $balance = $_POST["txtBalance"];
                        $dbobj=new dbconnect();
	                    $con=$dbobj->getcon();
                        $sql = "select sum(total),COUNT(itemName) from  tbl_purchaseitems WHERE invoiceId=$invoiceId";
                        $q = mysqli_query($con,$sql);
                        $row = mysqli_fetch_array($q);
                        $total = $row[0];
                        $count = $row[1];
        
        // echo $invoiceId;
        // echo "<br>";
        // echo $customerName;
        // echo "<br>";
        // echo $note;
        // echo "<br>";
        // echo $total;
        // echo "<br>";
        // echo $count;

        $sql="INSERT INTO  tbl_purchase(id ,dateandTime,total,cash,balance,noofitems,note) VALUES('$invoiceId',NOW(),'$total','$cash','$balance','$count','$note')";
	
	//executting the sql message
	$result=mysqli_query($con,$sql) or die("This Invoice ID is Already added please try another".mysqli_error());
	
	if($result==true)
	{
        
        echo'alert("SUCCESS!!!!")';
		header("Location:../purchase.php?success=1");
		
        
	}else{
        echo'alert("Fail!!!!")';
		header("Location:../purchase.php?error=1");
        
    }

	$dbobj->close();



    }
	
//add Order
        
        
	// $dbobj=new dbconnect();
	// $con=$dbobj->getcon();
	
	

?>