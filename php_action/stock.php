<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Company_Name Dashboard</title>
    <link type="text/css" rel="stylesheet" href="../assets/bootstrap/css/bootstrap-theme.min.css">
    <link type="text/css"  rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link type="text/css"  rel="stylesheet" href="../custom/css/customdash.css">
    <link type="text/css"  rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link  type="text/css" rel="stylesheet" href="../assets/jquery-ui/jquery-ui.min.css">
    <link  type="text/css" rel="stylesheet" href="../custom/css/date.css">
  </head>
    <body >
        
    <!--Nav Bar-->    
        <nav class="navbar navbar-inverse " id="my-navbar">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Company_Name</a>
                </div>
                
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../dashbord.php"><i class="glyphicon glyphicon-th-large" ></i>  Dashbord</a></li>
                    
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
        <li class="navaddcat"><a href="../users.php"><i class="glyphicon glyphicon-user" ></i>  Users</a></li>            
        <li class="navadddoc"><a href="../items.php"><i class="glyphicon glyphicon-map-marker" ></i>  Items</a></li>
        <li class="navaddcat"><a href="../customers.php"><i class="glyphicon glyphicon-tint" ></i>  Customer</a></li>
        <li class="navaddcat"><a href="../sales.php"><i class="glyphicon glyphicon-pencil" ></i>  Sales</a></li>
        <li class="navaddcat"><a href="../purchase.php"><i class="glyphicon glyphicon-pencil" ></i>  Purchase</a></li>
        <li class="navaddcat"><a href="../report.php"><i class="glyphicon glyphicon-list-alt" ></i>  Reports</a></li>
        
        <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i>  Logout</a></li>
               
                </ul>
            </div>
        </nav>
         
        <br>
        <br>
<!--end Header-->
<!--body-->
<div class="container">
<div class="row">
    
    <div class="col-md-12">
             <ol class="breadcrumb">
                    <li><a href="../dashbord.php">Dash board</a></li>
                    <li><a href="../report.php">Report</a></li>
                    <li class="active">Report in Stock</li>
            </ol>
        
        <div class="panel panel-primary">
                    <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> &nbsp  Report in Stock </div>
                        <div class="panel-body">
         
    <style>
    table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
    overflow-x:auto;
}

th, td {
    border: none;
    text-align: center;
    padding: 8px;
}
th {
    background-color: #4CAF50;
    color: white;
}
tr:nth-child(even){background-color: #f2f2f2}

</style>
        

<?php
            require_once("session.php");
            require_once('connection.php');  
            


            

            $dbobj=new dbconnect();
	       $con=$dbobj->getcon();
	       
            
			//Select Query to fetch all the records in a table
			$query = "SELECT * FROM tbl_items ";
		
			$exec = mysqli_query($con,$query);

			if($exec){
				$nor =  mysqli_num_rows($exec);//Get the number of matching records.
				if($nor>0)
				{	
					echo "<table id='table' border=1 width=100% >
						<tr>
							<th>id </th>
							<th>name</th>
                            <th>des</th>
                            <th>costPrice</th>
                            <th>salesPrice</th>
                            <th>qty</th>
                            
           
						</tr>";
					while($record = mysqli_fetch_array($exec))
					{

						echo "<tr>
							<td>".$record["id"]."</td>
							<td>".$record["name"]."</td>
                            <td>".$record["des"]."</td>
                            <td>".$record["costPrice"]."</td>
                            <td>".$record["salesPrice"]."</td>
                            <td>".$record["qty"]."</td>
                            
                            
							
							
						</tr>";
                        
					}
					echo "</table>";
                    
                    
				}
				else
				{
					echo "Item DB could not be Found! ".mysqli_error($con);
				}
			}
			else{
				echo "Item DB could not be Found! ".mysqli_error($con);
			}
			
		?>

                            
                                </div>          
            </div>    
    </div>
    
    
    
</div>        
                            
        </div>                        
    



<!-- start footer-->

    
    <!--footer-->
       
    <div id="footser-end">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="social-icons text-center">
							<a href="#"><i class="fa fa-facebook-official" style="font-size:40px" ></i></a>
							<a href="#"><i class="fa fa-google-plus-official" style="font-size:40px"></i></a>
							<a href="#"><i class="fa fa-linkedin-square" style="font-size:40px"></i></a>
							<a href="#"><i class="fa fa-twitter-square" style="font-size:40px"></i></a>
						</div>
                    <div class="text-center">
                 &copy; 2020  | Company_Name | All Rights Reserved .
                    </div>
                </div>
            </div>

        </div>
    </div>





    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="../assets/jquery-ui/jquery-ui.min.css"></script>
    <script src="../custom/js/date.js"></script>

    </body>
</html>