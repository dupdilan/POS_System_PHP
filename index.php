<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <title>Company Name</title>
    <link type="text/css" rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
    <link type="text/css"  rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link type="text/css"  rel="stylesheet" href="custom/css/custom.css">
    <link type="text/css"  rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link  type="text/css" rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
    
    
  </head>
    <body>
                <div class="container">
                    <div class="row vertical" id="">
  
                       <div class="col-md-5 col-md-offset-4">
                            
                            <div class="panel panel-info">
                                     <div class="panel-heading ">
                                         <h3 class="panel-title text-center">Please Sign In </h3> 
                                    </div>
                            <div class="panel-body">
                            
                            
                            <form class="form-horizontal" action="php_action/loginhandle.php" method="POST" id="loginForm">
                            <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">User Name</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" id="txtusername" name="txtusername" placeholder="input username" required>
                                    </div>
                               </div>
                            <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="txtpassword" name="txtpassword" placeholder="input password" required>
                                </div>
                            </div>
                               <div class="form-group">
                                   <div class="col-sm-offset-2 col-sm-10 ">
                                       <button type="submit" name="btnsubmit" class="btn btn-info" id="btnsubmit" ><i class="glyphicon glyphicon-log-in"></i>  Sign in</button>
                                       <button type="reset" class="btn btn-info" id="btncancel" name="btncancel"><i class="glyphicon glyphicon-remove"></i>  Clear</button>
                                       
                                   </div>
                                   
                                   
                               </div>
                                <?php
				                    if(isset($_GET["error"]))
				                        {
					                       $error=$_GET["error"];
					                       if($error==1)
					                           {
						                      echo("<font color='red'>Please insert a correct username or password");
					                           }
				                        }
			                    ?>
                     
                            </form>
                                
                                </div>
                            <div class="panel-footer text-center" style="color:red;"><p>&copy; 2020 | Company Name| All rights reserved</p></div>
                            </div>
                                
                                
                        </div>    
                    
                       
                    </div>
                   
        </div>
            
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/jquery-ui/jquery-ui.min.js"></script>
        
        
    </body>
</html>