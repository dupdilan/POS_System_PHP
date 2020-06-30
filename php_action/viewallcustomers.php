<?php
            require_once("session.php");
            require_once('connection.php');  
            $dbobj=new dbconnect();
	       $con=$dbobj->getcon();
	   
			//Select Query to fetch all the records in a table
			$query = "SELECT * FROM tbl_customers;";
		
			$exec = mysqli_query($con,$query);

			if($exec){
				$nor =  mysqli_num_rows($exec);//Get the number of matching records.
				if($nor>0)
				{	
					echo "<table id='tableCustomers' border=1 width=100%  >
						<tr>
							<th height=50px  >Customer ID</th>
							<th>Customer Name</th>
							<th>Contact Number</th>
							<th>Lorry Number</th>
							
           
						</tr>";
					while($record = mysqli_fetch_array($exec))
					{

						echo "<tr>
							<td>".$record["id"]."</td>
							<td>".$record["name"]."</td>
							<td>".$record["telephone"]."</td>
							<td>".$record["lorrynumber"]."</td>				
							
						</tr>";
					}
					echo "</table>";
				}
				else
				{
					echo "Customer  DB could not be Found! ".mysqli_error($con);
				}
			}
			else{
				echo "Customers  DB could not be Found! ".mysqli_error($con);
			}
			
		?>