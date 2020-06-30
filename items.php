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
                    <li class="active">Items</li>
            </ol>
        
        <div class="panel panel-primary">
                    <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> &nbsp  Add Items </div>
                        <div class="panel-body">
        
    
    
    
    
    <form name="frmItems" class="form-horizontal" action="php_action/itemshandle.php" method="post">


                                                                <?php
                                                                require_once('php_action/connection.php'); 
                                                                
                                                                    $dbobj=new dbconnect();
                                                                $con=$dbobj->getcon();
                                                                
                                                                $sql = "select MAX(id) from tbl_items ";
                                                                            $q = mysqli_query($con,$sql);
                                                                            $row = mysqli_fetch_array($q);
                                                                        
                                                                
                                                                            $maxid = $row[0]+1;
                                                                        //  echo $row['uid']  ; 
                                                                    
                                                                        $dbobj->close();
                                                                ?>
        
        
        <div class="form-group">
                                        <label for="txtuid" class="col-sm-3 control-label"> Item ID:</label>
                                        <div class="col-sm-6">
                                          <input type="number" class="form-control" id="txtitemid" name="txtitemid" value="<?php echo $maxid; ?>" readonly >
                                        </div>
                                      </div>
        <div class="form-group">
                                        <label for="txtuname" class="col-sm-3 control-label"> Item Name:</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" id="txtitemname" name="txtitemname" placeholder="Input Item name" required>
                                        </div>
        </div>

        <div class="form-group">
                                        <label for="txtuname" class="col-sm-3 control-label"> Item Description:</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" id="txtitemdes" name="txtitemdes" placeholder="Input Item Description" required>
                                        </div>
        </div>

        <div class="form-group">
                                        <label for="txtuname" class="col-sm-3 control-label"> Cost Price:</label>
                                        <div class="col-sm-6">
                                          <input type="number" class="form-control" id="txtitemcost" name="txtitemcost" placeholder="Input Item Cost Price" required>
                                        </div>
        </div> 

        <div class="form-group">
                                        <label for="txtuname" class="col-sm-3 control-label"> Sales Price:</label>
                                        <div class="col-sm-6">
                                          <input type="number" class="form-control" id="txtitemsales" name="txtitemsales" placeholder="Input Item Sales Price" required>
                                        </div>
        </div> 
        
                            
                <div class="div-action pull pull-right ">
                    
                                                            <button type="submit" class="btn btn-default"  id="btnadditems" name="btnadditems" value="additems"><i class="glyphicon glyphicon-plus"></i> Add a New Item</button>
                                                             <button type="submit" class="btn btn-default"   id="btnedititems" name="btnedititems" value="edititems"  ><i class="glyphicon glyphicon-pencil"></i>  Edit a Item</button>
                                                             <button type="submit" class="btn btn-default"   id="btndeleteitems" name="btndeleteitems" value="deleteitems" ><i class="glyphicon glyphicon-trash"></i>  Delete a Item</button>
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
                    <div class="panel-heading"><i class="glyphicon glyphicon-list"></i> &nbsp  View All Items </div>
                        <div class="panel-body">
    
    
                                <?php
                                 
                                 require_once("php_action/viewallitems.php");
                            
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
document.querySelectorAll('#tableItems tr').forEach(e=>e.addEventListener("click",function(){
    // console.log("clicked");
    if(this.rowIndex > 0){
        var id=this.cells[0].innerHTML;
        var name=this.cells[1].innerHTML;
        var des=this.cells[2].innerHTML;
        var cost=this.cells[3].innerHTML;
        var sales=this.cells[4].innerHTML;
        document.forms['frmItems']['txtitemid'].value = id;
        document.forms['frmItems']['txtitemname'].value = name;
        document.forms['frmItems']['txtitemdes'].value = des;
        document.forms['frmItems']['txtitemcost'].value = cost;
        document.forms['frmItems']['txtitemsales'].value = sales;
    }
   
}));
</script>