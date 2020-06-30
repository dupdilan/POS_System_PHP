<?php 

        require_once('connection.php');  
        
            $q = $_GET["q"];
            $id = $_GET["id"];
            $qty = $_GET["qty"];
            // echo $q;
            // echo $id;
            



    $dbobj=new dbconnect();
	$con=$dbobj->getcon();
	
	$sql="DELETE FROM tbl_purchaseitems WHERE invoiceId='$id' && itemName='$q' ";
	
	//executting the sql message
	$result=mysqli_query($con,$sql)or die("This Item ID is not detected please try another".mysqli_error());
	
	if($result==true)
	{
        $sql1 = "UPDATE tbl_items SET qty = qty -'$qty' WHERE name='$q' ";
        $result1 = mysqli_query($con,$sql1);
        if($result1 == true){
            echo"SUCCESS!!!!";
            header("Location:../purchase.php?success=1");
        }
       
        
	}else{
        echo"Fail!!!!";
		header("Location:../purchase.php?error=1");
        
    }


?>