<?php 
   require_once("php_action/session.php");
   
    require_once("includes/header.php");
?>


<!--
table Style
-->
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


<div class="container">
<div class="row">
    
    <div class="col-md-12">
             <ol class="breadcrumb">
                    <li><a href="dashbord.php">Dash board</a></li>
                    <li class="active">Customers</li>
            </ol>
        
        <div class="panel panel-primary">
                    <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> &nbsp  Add Customers </div>
                        <div class="panel-body">
        
    
    
    
    
    <form name="frmCustomers" class="form-horizontal" action="php_action/customershandle.php" method="post">


                                                                <?php
                                                                require_once('php_action/connection.php'); 
                                                                
                                                                    $dbobj=new dbconnect();
                                                                $con=$dbobj->getcon();
                                                                
                                                                $sql = "select MAX(id) from tbl_customers ";
                                                                            $q = mysqli_query($con,$sql);
                                                                            $row = mysqli_fetch_array($q);
                                                                        
                                                                
                                                                            $maxid = $row[0]+1;
                                                                        //  echo $row['uid']  ; 
                                                                    
                                                                        $dbobj->close();
                                                                ?>
        
        
        <div class="form-group">
                                        <label for="txtuid" class="col-sm-3 control-label"> Customer ID:</label>
                                        <div class="col-sm-6">
                                          <input type="number" class="form-control" id="txtcustomerid" name="txtcustomerid" value="<?php echo $maxid; ?>" readonly >
                                        </div>
                                      </div>
        <div class="form-group">
                                        <label for="txtuname" class="col-sm-3 control-label"> Customer Name:</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" id="txtcustomername" name="txtcustomername" placeholder="Input Customer name" required>
                                        </div>
        </div>

        <div class="form-group">
                                        <label for="txtuname" class="col-sm-3 control-label"> Customer Contact Number:</label>
                                        <div class="col-sm-6">
                                          <input type="number" class="form-control" id="txttp" name="txttp" minlength="10" placeholder="Input Customer Contact Number" required>
                                        </div>
        </div>

        <div class="form-group">
                                        <label for="txtuname" class="col-sm-3 control-label"> Lorry Number:</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" id="txtlorryNb" name="txtlorryNb" placeholder="Input Lorry Number" required>
                                        </div>
        </div> 
        
                            
                <div class="div-action pull pull-right ">
                    
                                                            <button type="submit" class="btn btn-default"  id="btnaddcus" name="btnaddcus" value="addcustomers"><i class="glyphicon glyphicon-plus"></i> Add a New Customer</button>
                                                             <button type="submit" class="btn btn-default "   id="btneditcus" name="btneditcus" value="editcustomers" disabled ><i class="glyphicon glyphicon-pencil"></i>  Edit a Customer</button>
                                                             <button type="submit" class="btn btn-default"   id="btndeletecus" name="btndeletecus" value="deletecustomers" disabled><i class="glyphicon glyphicon-trash"></i>  Delete a Customer</button>
                                                            <button type="reset" class="btn btn-default"  id="btnclear" name="btnclear" value="clear"><i class="glyphicon glyphicon-remove"></i> Clear</button>
                                                        </div>
                            
                <?php
				                    if(isset($_GET["error"]))
				                        {
					                       $error=$_GET["error"];
					                       if($error==1)
					                           {
						                      echo("<font color='red'>Error</font>");
					                           }
				                        }
			                    ?>
                <?php
				                    if(isset($_GET["success"]))
				                        {
					                       $error=$_GET["success"];
					                       if($error==1)
					                           {
						                      echo("<font color='red'>successfully</font> ");
					                           }
				                        }
			                    ?>
        
   </form>
                            
                            
            </div>          
            </div>    
    </div>
    
    
    
</div>


<div class="row">
    <div class="col-md-12">
           <div class="panel panel-primary">
                    <div class="panel-heading"><i class="glyphicon glyphicon-list"></i> &nbsp  View All Customers </div>
                        <div class="panel-body">
    
    
                                <?php
                                 
                                 require_once("php_action/viewallcustomers.php");
                            
                                 ?>

               </div>
    </div>
    </div>
</div>


</div>






<?php 
    require_once("includes/footer.php");
?>

<!--listeners -->
<script>
document.querySelectorAll('#tableCustomers tr').forEach(e=>e.addEventListener("click",function(){
    // console.log("clicked");
    if(this.rowIndex > 0){
        var id=this.cells[0].innerHTML;
        var name=this.cells[1].innerHTML;
        var tp=this.cells[2].innerHTML;
        var lorry=this.cells[3].innerHTML;
        document.forms['frmCustomers']['txtcustomerid'].value = id;
        document.forms['frmCustomers']['txtcustomername'].value = name;
        document.forms['frmCustomers']['txttp'].value = tp;
        document.forms['frmCustomers']['txtlorryNb'].value = lorry;
    }
   
}));
</script>