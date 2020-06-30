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
                    <li class="active">Users</li>
            </ol>
        
        <div class="panel panel-primary">
                    <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> &nbsp  Add Users </div>
                        <div class="panel-body">
        
    
    
    
    
    <form name="frmUsers" class="form-horizontal" action="php_action/usershandle.php" method="post">


                                                                <?php
                                                                require_once('php_action/connection.php'); 
                                                                
                                                                    $dbobj=new dbconnect();
                                                                $con=$dbobj->getcon();
                                                                
                                                                $sql = "select MAX(uid) from tbl_user ";
                                                                            $q = mysqli_query($con,$sql);
                                                                            $row = mysqli_fetch_array($q);
                                                                        
                                                                
                                                                            $maxid = $row[0]+1;
                                                                        //  echo $row['uid']  ; 
                                                                    
                                                                        $dbobj->close();
                                                                ?>
        
        
        <div class="form-group">
                                        <label for="txtuid" class="col-sm-3 control-label"> User ID:</label>
                                        <div class="col-sm-6">
                                          <input type="number" class="form-control" id="txtuserid" name="txtuserid" value="<?php echo $maxid; ?>" readonly >
                                        </div>
                                      </div>
        <div class="form-group">
                                        <label for="txtuname" class="col-sm-3 control-label"> User Name:</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" id="txtusername" name="txtusername" placeholder="Input User name" required>
                                        </div>
                                      </div>
               
        <div class="form-group">
                                        <label for="txtlname" class="col-sm-3 control-label"> Password :</label>
                                        <div class="col-sm-6">
                                          <input type="password" class="form-control" id="txtpassword" name="txtpassword" placeholder="Input Password " required>
                                        </div>
                                      </div>
                            
                <div class="div-action pull pull-right ">
                    
                                                            <button type="submit" class="btn btn-default"  id="btnadduser" name="btnadduser" value="adduser"><i class="glyphicon glyphicon-plus"></i> Add a New User</button>
                                                             <button type="submit" class="btn btn-default "   id="btnedituser" name="btnedituser" value="edituser" disabled ><i class="glyphicon glyphicon-pencil"></i>  Edit a User</button>
                                                             <button type="submit" class="btn btn-default"   id="btndeleteuser" name="btndeleteuser" value="deleteuser" disabled><i class="glyphicon glyphicon-trash"></i>  Delete a User</button>
                                                            <button type="reset" class="btn btn-default"  id="btnclear" name="btnclear" value="clear"><i class="glyphicon glyphicon-remove"></i> Clear</button>
                                                        </div>
             <script>
        
                $('button').addClass('btn-disabled');
        
        
            </script>
                            
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
                    <div class="panel-heading"><i class="glyphicon glyphicon-list"></i> &nbsp  View All Users </div>
                        <div class="panel-body">
    
    
                                <?php
                                 
                                 require_once("php_action/viewallusers.php");
                            
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
document.querySelectorAll('#tableUser tr').forEach(e=>e.addEventListener("click",function(){
    // console.log("clicked");
    if(this.rowIndex > 0){
        var uid=this.cells[0].innerHTML;
        var userName=this.cells[1].innerHTML;
        document.forms['frmUsers']['txtuserid'].value = uid;
        document.forms['frmUsers']['txtusername'].value = userName;
    }
   
}));
</script>