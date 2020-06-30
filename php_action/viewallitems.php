<?php
            require_once("session.php");
            require_once('connection.php');  
            $dbobj=new dbconnect();
	       $con=$dbobj->getcon();
	   
			//Select Query to fetch all the records in a table
			$query = "SELECT * FROM tbl_items;";
		
			$exec = mysqli_query($con,$query);

			if($exec){
				$nor =  mysqli_num_rows($exec);//Get the number of matching records.
				if($nor>0)
				{	
					echo "<table id='tableItems' border=1 width=100%  >
						<tr>
							<th height=50px  >Item ID</th>
							<th>Item Name</th>
							<th>Item Description</th>
							<th>Cost Price</th>
							<th>Sales Price</th>
							
           
						</tr>";
					while($record = mysqli_fetch_array($exec))
					{

						echo "<tr>
							<td>".$record["id"]."</td>
							<td>".$record["name"]."</td>
							<td>".$record["des"]."</td>
							<td>".$record["costPrice"]."</td>
							<td>".$record["salesPrice"]."</td>
							
                            
							
							
						</tr>";
					}
					echo "</table>";
				}
				else
				{
					echo "Item  DB could not be Found! ".mysqli_error($con);
				}
			}
			else{
				echo "Items  DB could not be Found! ".mysqli_error($con);
			}
			
		?>