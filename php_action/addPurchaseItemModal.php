<?php
                                                                require_once('php_action/connection.php'); 
                                                                
                                                                    $dbobj=new dbconnect();
                                                                $con=$dbobj->getcon();
                                                                
                                                                $sql = "select MAX(id) from  tbl_purchase ";
                                                                            $q = mysqli_query($con,$sql);
                                                                            $row = mysqli_fetch_array($q);
                                                                            $maxid = $row[0]+1;
                                                                        //  echo $row['uid']  ; 
                                                                    
                                                                        $dbobj->close();
                                                                ?>
               <script src="assets/jquery/jquery-3.2.1.min.js"></script>
                <script src="assets/jquery-ui/jquery-ui.min.css"></script>
                <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
                <div class="row">
                    <div class="col-sm-6">
                       test
                    </div>   
                    <div class="col-sm-6" style="margin-bottom:20px;">
                                    <!-- Button trigger modal -->
                            <button type="button" id="#" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                            Add Items To Invoice
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Items To Invoice</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!--Form Body-->
                                            <!--Form Body-->
                                    <form  class="form-horizontal" id="frmPurchase" action="php_action/addItemsToPurchaseInvoice.php" method="POST">
                                        <div class="form-group">
                                            <label for="#" class="col-sm-3 control-label"> Invoice ID:</label>
                                            <div class="col-sm-6">
                                            <input type="number" class="form-control" id="txtInvoiceId" readonly name="txtInvoiceId" value="<?php echo $maxid; ?>" required>
                                            </div>
                                        </div>
                                        <?php 
                                            require("function.php");
                                        ?>
                                        <div class="form-group">
                                            <label for="#" class="col-sm-3 control-label"> Item :</label>
                                            <div class="col-sm-3">
                                            <select class="form-control" id="itemName" name="itemName" onchange="setTextFieldPackage(this);showPrice(this.options[this.selectedIndex].text);"  >        
                                                <option>Select</option>
                                                        <?php
                                                        //    selectPackage();
                                                                selectItems();
				                                        ?>
                                            </select>
                                            </div>
                                            <input id="txtItemName" type ="hidden" name ="txtItemName"  />
                                                    <script  type="text/javascript">
                                                            
                                                            function setTextFieldPackage(ddl) {

                                                            document.getElementById('txtItemName').value = ddl.options[ddl.selectedIndex].text;
                                                                                    }
                        
                                                    </script>
                                                    
                                                    <!-- price set -->
                                                    <script>
                                                        
                                                    function showPrice(str) {
                                                        // alert("works");
                                                        if (str.length == 0) { 
                                                            document.getElementById("txtItemQty").innerHTML = "";
                                                            document.getElementById("txtItemPrice").innerHTML = "";
                                                            return;
                                                        } else {
                                                            // alert(str);
                                                            var xmlhttp = new XMLHttpRequest();
                                                            xmlhttp.onreadystatechange = function() {
                                                                if (this.readyState == 4 && this.status == 200) {
                                                                    
        
                                                                    var json = JSON.parse(this.responseText);
                                                                    // alert(JSON.parse(this.responseText).qty[0]);
                                                                    // alert(json.salesPrice);
                                                                    document.getElementById("txtItemQty").value = json.qty;
                                                                    document.getElementById("txtItemPrice").value = json.salesPrice;
                                                                }
                                                            };
                                                            xmlhttp.open("GET", "php_action/getPrice.php?q="+str, true);
                                                            xmlhttp.send();
                                                        }
                                                    }
                                                    </script>

                                    

                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"  id="txtItemQty" name="txtItemQty" readonly required />
                                                
                                               <!-- <span id="txtHint"></span> -->

                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"  id="txtItemPrice" name="txtItemPrice"  required />
                                                
                                               <!-- <span id="txtHint"></span> -->

                                            </div>
                                        </div>
                                       
                                       

                                        <div class="form-group">
                                            <label for="#" class="col-sm-3 control-label"> Qty:</label>
                                            <div class="col-sm-6">
                                            <input type="number" class="form-control" id="txtqty" onchange="TotalVal();" name="txtqty" required/>
                                            </div>
                                        </div>
                                            <script type="text/javascript">
                                                        function TotalVal()
                                                        {  
                                                        var number1 = document.getElementById('txtqty').value;
                                                        var number2 = document.getElementById('txtItemPrice').value;
                                                        var x=number1*number2;
                                                        document.getElementById('txttot').value = x;
                                                        }         
                                            </script>
                                         <div class="form-group">
                                            <label for="#" class="col-sm-3 control-label"> Total:</label>
                                            <div class="col-sm-6">
                                            <input type="number" class="form-control"  id="txttot"  name="txttot" readonly required>
                                            </div>
                                        </div>
                                </form>
                                    <!--end Body-->
                                </div>
                                <div class="modal-footer"> 
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" ><i class="glyphicon glyphicon-remove"></i>&nbspClose</button>
                                    <button type="button" class="btn btn-primary" id="btnAddItemsPurchase" name="btnAddItemsPurchase" value="AddItemsPurchase"><i class="glyphicon glyphicon-plus"></i>&nbsp Add To Purchase</button>
                                </div>
                                
                                </div>

                            </div>
                            </div>
                    </div>            
                </div>

<!--submit the modal -->
<script>
                                $("#btnAddItemsPurchase").on('click', function() {
                                 $("#frmPurchase").submit();
                                });
                </script>