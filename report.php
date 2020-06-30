<?php 
   require_once("php_action/session.php");
   require_once("php_action/function.php");
    require_once("includes/header.php");
?>

<div class="container">

<div class="row">
    
    <div class="col-md-12">
             <ol class="breadcrumb">
                    <li><a href="dashbord.php">Dash board</a></li>
                    <li class="active">Report</li>
            </ol>
        
        <div class="panel panel-primary">
                    <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> &nbsp  Report in Sales Invoice </div>
                        <div class="panel-body">
        
    
    
    
    
    <form class="form-horizontal" action="php_action/salesInvoice.php" method="post">
        
        
            <div class="form-group">
                                        <label for="txtlid" class="col-sm-3 control-label">  Invoice ID:</label>
                                        <div class="col-sm-6">
                                          <input type="number" class="form-control" id="txtid" name="txtid" placeholder="Input Invoice ID" required>
                                           
            </div>

               
                            
                <div class="div-action pull pull-right ">
                    
                                                            <button type="submit" class="btn btn-default"  id="" name="" value=""><i class="glyphicon glyphicon-search"></i> Search </button>
                                                             
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
    <!-- Purchase Invoice Start-->
    <div class="panel panel-primary">
                    <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> &nbsp  Report in Purchase Invoice </div>
                        <div class="panel-body">
        
    
    
    
    
    <form class="form-horizontal" action="php_action/purchaseInvoice.php" method="post">
        
        
            <div class="form-group">
                                        <label for="txtlid" class="col-sm-3 control-label">  Invoice ID:</label>
                                        <div class="col-sm-6">
                                          <input type="number" class="form-control" id="txtid" name="txtid" placeholder="Input Invoice ID" required>
                                           
            </div>

               
                            
                <div class="div-action pull pull-right ">
                    
                                                            <button type="submit" class="btn btn-default"  id="" name="" value=""><i class="glyphicon glyphicon-search"></i> Search </button>
                                                             
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
    <!--purchase Invoice End-->
    <!-- Stock Start-->
    <div class="panel panel-primary">
                    <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> &nbsp  Report in Stock  </div>
                        <div class="panel-body">
        
    
    
    
    
    <form class="form-horizontal" action="php_action/stock.php" method="post">
                            
                <div class="div-action text-center ">
                    
                                                            <button type="submit" class="btn btn-default "  id="" name="" value=""><i class="glyphicon glyphicon-search"></i> Check </button>
                                                             
                                                            <!-- <button type="reset" class="btn btn-default"  id="btnclear" name="btnclear" value="clear"><i class="glyphicon glyphicon-remove"></i> Clear</button> -->
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
    <!--Stock End-->
    





</div>


                                    </div>

                                    </div>

<?php 
    require_once("includes/footer.php");
?>