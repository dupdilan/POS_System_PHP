<?php
            require_once("session.php");
            require_once('connection.php');  
            $dbobj=new dbconnect();
           $con=$dbobj->getcon();
           

           $q = $_GET["maxid"];

			//Select Query to fetch all the records in a table
			$query = "SELECT * FROM  tbl_invoiceitems where invoiceId = $q ;";
		
			$exec = mysqli_query($con,$query);

			if($exec){
				$nor =  mysqli_num_rows($exec);//Get the number of matching records.
				if($nor>0)
				{	
					echo "<table id='tableInvoiceItems' border=1 width=100%  >
						<tr>
							<th height=50px  >itemName</th>
							<th>price</th>
							<th>qty</th>
							<th>total</th>
							<th>Action</th>
           
						</tr>";
					while($record = mysqli_fetch_array($exec))
					{

						echo "<tr>
							<td>".$record["itemName"]."</td>
							<td>".$record["price"]."</td>
							<td>".$record["qty"]."</td>
							<td>".$record["total"]."</td>
							<td><button id=".$record["itemName"]." >Delete</button></td>
						</tr>";
					}
					echo "</table>";

					$sql = "select sum(total) from tbl_invoiceitems WHERE invoiceId=$q";
                    $q = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($q);

                    echo '<h3 style="text-align: right;" >Total Amount RS: ' . $row[0];echo'.00</h3>';
                    
				}
				else
				{
					echo "Invoice Items  DB could not be Found! ".mysqli_error($con);
				}
			}
			else{
				echo "Invoice Items Type DB could not be Found! ".mysqli_error($con);
            }
			
		?>

        <!-- <script>
            function DeleteItems(){
                alret("delete!!!");
            }
        </script> -->