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

            <div class="row">
                <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="dashbordCashier.php">Dash board</a></li>
                    <li class="active">Create Invoice</li>
                 </ol>
                        <?php
                            require("php_action/addItemModal.php");
                        ?>
                </div>

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
                                                                                    echo("<font color='red'>Successfully</font> ");
                                                                                    }
                                                                                }
			                                                            ?>


            
            <div class="row">
                <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="glyphicon glyphicon-list"></i> &nbsp  View the Invoice Items </div>
                        <div class="panel-body">
                                <?php
                                require_once('php_action/connection.php'); 
                                                                
                                $dbobj=new dbconnect();
                            $con=$dbobj->getcon();
                            
                            $sql = "select MAX(id) from tbl_invoice ";
                                        $q = mysqli_query($con,$sql);
                                        $row = mysqli_fetch_array($q);
                                        $maxid = $row[0]+1;
                                    //  echo $row['uid']  ; 
                                
                                    $dbobj->close();
                                    $_GET['maxid'] = $maxid;
                                //  echo $maxid;
                                 require_once("php_action/viewInvoiceItems.php");
                            
                                 ?>
                               
                        </div>
                            
                    </div>
                </div>

            </div>
    <!-- start-->
    <div class="row">
                <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="glyphicon glyphicon-list"></i> &nbsp  View the Invoice Basic Details </div>
                        <div class="panel-body">

                        <form name="frmItems" class="form-horizontal" action="php_action/addInvoice.php" method="post">

                        <div class="form-group">
                                        <label for="txtuid" class="col-sm-3 control-label"> Invoice ID:</label>
                                        <div class="col-sm-3">
                                          <input type="number" class="form-control" id="txtInvoiceId" name="txtInvoiceId" value="<?php echo $maxid; ?>" readonly >
                                        </div>

                                        <label for="txtuname" class="col-sm-2 control-label"> Customer Name:</label>
                                        <div class="col-sm-3">
                                            <!-- <input type="text" class="form-control" id="txtitemname" name="txtitemname" placeholder="Input Item name" required> -->
                                            <select class="form-control" id="customerName" name="customerName" onchange="setTextFieldPackage(this);showPrice(this.options[this.selectedIndex].text);" required >        
                                                <option value=""    >Select</option>
                                                        <?php
                                                            require_once("php_action/connection.php");

                                                            function selectCutomer(){
                                                                                                                            
                                                                $dbobj=new dbconnect();
                                                                $con=$dbobj->getcon();
                                                                $sql="SELECT name FROM tbl_customers";
                                                                $result=mysqli_query($con,$sql)or die("Cannot execute query");
                                                                $nor=mysqli_num_rows($result);
                                                                if($nor>0)
                                                                {
                                                                    while($rec=mysqli_fetch_array($result))
                                                                    {
                                                                        echo '<option value="'.$rec["name"].'">'.$rec["name"].'</option>';
                                                                    }
                                                                }else{
                                                                        echo 'No data Avalable!!';
                                                                }
                                                                $dbobj->close();
                                                            }
                                                       
                                                            selectCutomer();
				                                        ?>
                                            </select>
                                            <input id="txtcustomerName" type ="hidden" name ="txtcustomerName"  />
                                                    <script  type="text/javascript">
                                                            
                                                            function setTextFieldPackage(ddl) {

                                                            document.getElementById('txtcustomerName').value = ddl.options[ddl.selectedIndex].text;
                                                                                    }
                        
                                                    </script>
                                        </div>                                        
                        </div>

                        <div class="form-group">
                                        <label for="txtuname" class="col-sm-3 control-label"> Note :</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="txtnote" name="txtnote" placeholder="Input Note " >
                                        </div>
                        </div>
                        <hr>
                        <?php
                        $sqlTot = "select sum(total) from tbl_invoiceitems WHERE invoiceId=$maxid";
                        // echo $maxid;
                        $qTot = mysqli_query($con,$sqlTot);
                        $rowTot = mysqli_fetch_array($qTot);
                        $TotalVal= $rowTot[0];
                        // echo $TotalVal;
                        ?>
                        <!-- <h3 style="text-align: right;" >Total Amount RS:<?php //echo $TotalVal ?>.00</h3> -->

                        
                        <div class="form-group pull-right" >
                                        <label  for="txtuname" class="col-sm-5 control-label"> Total Amount RS :</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="txttoalVal" name="txttoalVal" value="<?php echo $TotalVal ?>"  readonly >
                                        </div>
                                        <br><br>
                                        <label  for="txtuname" class="col-sm-5 control-label"> Cash RS :</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="txtCash" onchange="CalBalance()"  name="txtCash" placeholder="Input Cash " >
                                        </div>
                                        <script type="text/javascript">
                                                        function CalBalance()
                                                        {  
                                                        var number1 = document.getElementById('txttoalVal').value;
                                                        var number2 = document.getElementById('txtCash').value;
                                                        var x=number2 - number1;
                                                        document.getElementById('txtBalance').value = x;
                                                        }         
                                            </script>
                                        <br><br>
                                        <label  for="txtuname" class="col-sm-5 control-label"> Balance RS :</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="txtBalance" name="txtBalance" readonly >
                                        </div>
                                        <br><br><br><br>
                                        <label  for="txtuname" class="col-sm-5 control-label">  </label>
                                        <div class="col-sm-4">
                                         <button type="submit" class="btn btn-default"  id="btncreateInvoice" name="btncreateInvoice" value="createInvoice"><i class="glyphicon glyphicon-plus"></i> Create Invoice</button>
                                         </div>
                                        
                        </div>
                        
                        <br>
                   
                        <div class="div-action pull pull-right ">
                    <!-- <div id="outputData">
                    </div> -->
                    <!-- <button type="submit" class="btn btn-default"  id="btncreateInvoice" name="btncreateInvoice" value="createInvoice"><i class="glyphicon glyphicon-plus"></i> Create Invoice</button> -->
                     <!-- <button type="reset" class="btn btn-default"  id="btnclear" name="btnclear" value="clear"><i class="glyphicon glyphicon-remove"></i> Clear</button> -->
                </div>                                                       

                        </form>
                               
                        </div>
                            
                    </div>
                </div>

            </div>                                                              

    <!--end-->
        </div>
    </div>

    </div>
    <!-- <div id="outputData">

</div> -->
    
 <!--event listner-->
 <script>
document.querySelectorAll('#tableInvoiceItems tr').forEach(e=>e.addEventListener("click",function(){

    var itemName=this.cells[0].innerHTML;
    var qty = this.cells[2].innerHTML;
    var id = <?=$maxid?>;
    // alert(myServerData);
    if(confirm("Are you sure to delete the Item!")){

                                                        var xmlhttp = new XMLHttpRequest();
                                                            xmlhttp.onreadystatechange = function() {
                                                                if (this.readyState == 4 && this.status == 200) {
                                                                    // document.getElementById("outputData").innerHTML = this.responseText;
                                                                    location.reload();
                                                                }
                                                            };
                                                            xmlhttp.open("GET", "php_action/deleteItem.php?q="+itemName+"&id="+id+"&qty="+qty, true);
                                                            xmlhttp.send();

                                                            // alert("check");

    }
    
                                                        


}));




</script>
 
<?php 
   require_once("includes/footer.php");
?>
    
