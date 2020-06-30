<?php
            require_once('connection.php');  
           
           // get the q parameter from URL
        //     $q = $_REQUEST["q"];
            $q = $_GET["q"];
            
            $salesPrice = "";
            $qty = "";
                $dbobj=new dbconnect();
	       $con=$dbobj->getcon();
	   
			//Select Query to fetch all the records in a table
            $query = "SELECT * FROM  tbl_items WHERE name='$q' ";
            

            $res=mysqli_query($con,$query)or die("Can not connect with the table ".mysqli_error());
    
	        $nor=mysqli_num_rows($res);
    
	if($nor>0)
	{
		$rec=mysqli_fetch_Array($res);	
                // $salesPrice=$rec["salesPrice"];
                // $qty = $rec["qty"];
                
                $data = array(
                        "salesPrice" => $rec["salesPrice"],
                        "qty"         => $rec["qty"]
                      );
                echo json_encode($data);
                // echo json_encode($qty);
			
	}
	else
	{
      
        echo "DB Empty! ".mysqli_error($con);
	}
    
         $dbobj->close();

		?>