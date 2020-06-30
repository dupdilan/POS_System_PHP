<?php
            require_once("session.php");
            require_once('connection.php');  
            $dbobj=new dbconnect();
	       $con=$dbobj->getcon();
	   
			//Select Query to fetch all the records in a table
			$query = "SELECT * FROM tbl_user;";
		
			$exec = mysqli_query($con,$query);

			if($exec){
				$nor =  mysqli_num_rows($exec);//Get the number of matching records.
				if($nor>0)
				{	
					echo "<table id='tableUser' border=1 width=100%  >
						<tr>
							<th height=50px  >User ID</th>
							<th>User Name</th>
           
						</tr>";
					while($record = mysqli_fetch_array($exec))
					{

						echo "<tr>
							<td>".$record["uid"]."</td>
							<td>".$record["uname"]."</td>
                            
							
							
						</tr>";
					}
					echo "</table>";
				}
				else
				{
					echo "User  DB could not be Found! ".mysqli_error($con);
				}
			}
			else{
				echo "User Type DB could not be Found! ".mysqli_error($con);
			}
			
		?>