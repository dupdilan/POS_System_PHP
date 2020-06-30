<?php 
     require_once('connection.php'); 

     $id=$_POST["txtid"];
 
     $dbobj=new dbconnect();
     $con=$dbobj->getcon();

     // echo $nic;   
     //Select Query to fetch all the records in a table
     $query = "SELECT * FROM  tbl_invoice WHERE id=$id";
             $q = mysqli_query($con,$query);
             $row = mysqli_fetch_array($q);

             if (!$q) {
               printf("Error: %s\n", mysqli_error($con));
               exit();
           }

             $id = $row[0];
             $dateandTime = $row[1];
             $customer = $row[2];
             $total = $row[3];
             $cash = $row[4];
             $balance = $row[5];
             $noofItems = $row[6];
             $note = $row[7];
        //   echo $id  ; 
        //   echo "<br>";
        //   echo $dateandTime;
        //   echo "<br>"; 
        //   echo $customer; 
        //   echo "<br>";
        //   echo $total;
        //   echo "<br>"; 
        //   echo $note; 
            


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Company Name Invoice</title>
    <link type="text/css" rel="stylesheet" href="../assets/bootstrap/css/bootstrap-theme.min.css">
    <link type="text/css"  rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link type="text/css"  rel="stylesheet" href="../custom/css/invoice.css">
    <link type="text/css"  rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link  type="text/css" rel="stylesheet" href="../assets/jquery-ui/jquery-ui.min.css">
    
  </head>
    <body >

    <div id="page-wrap">

<textarea id="header">INVOICE</textarea>

<div id="identity">

    <textarea id="address">Company_Name,
        City.
        081-0000000
    </textarea>

     <!-- <div id="logo"> -->

      <!-- <div id="logoctr"> -->
        <!-- <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
        <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
        |
        <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
        <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a> -->
      <!-- </div> -->

      <!-- <div id="logohelp">
        <input id="imageloc" type="text" size="50" value="" /><br />
        
      </div>
      <img id="image" src="images/logo.png" alt="logo" />
    </div>  -->

</div>

<div style="clear:both"></div>

<div id="customer">

    <textarea id="customer-title"><?php echo $customer ?></textarea>

    <table id="meta">
        <tr>
            <td class="meta-head">Invoice #</td>
            <td><textarea><?php echo $id ?></textarea></td>
        </tr>
        <tr>

            <td class="meta-head">Date & Time</td>
            <td><textarea id="date"><?php echo $dateandTime ?></textarea></td>
        </tr>
        <tr>
            <td class="meta-head">Note</td>
            <td><div class="due"><?php echo $note ?></div></td>
        </tr>

    </table>

</div>

<table id="items">

  <tr>
      <th>No</th>
      <th>Item</th>
      <th>Unit Cost</th>
      <th>Quantity</th>
      <th>Price</th>
  </tr>


 <!-- foreach($row1 as $item){
     echo $item;
   echo "<br>";
  } -->
  <?php 
              $query1 = "SELECT * FROM tbl_invoiceitems WHERE invoiceId=$id";
              $q1 = mysqli_query($con,$query1);

              if (!$q1) {
                printf("Error: %s\n", mysqli_error($con));
                exit();
              }
              $i=0;
              while($row1 = mysqli_fetch_array($q1)){
              $itemName = $row1["itemName"];
              $itemprice = $row1["price"];
              $itemqty = $row1["qty"];
              $itemtotal = $row1["total"];
              $i++;
              echo "<tr class='item-row'>
              <td class='item-name'><textarea>$i</textarea></td>
              <td class='description'><textarea>$itemName</textarea></td>
              <td><textarea class='cost'>$itemprice</textarea></td>
              <td ><textarea class='qty'>$itemqty</textarea></td>
              <td ><span class='price'>$itemtotal</span></td>
              </tr>";


              
              }


              $dbobj->close();



?>
     
  
  <!-- <tr class="item-row">
      <td class="item-name"><div class="delete-wpr"><textarea>SSL Renewals</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>

      <td class="description"><textarea>Yearly renewals of SSL certificates on main domain and several subdomains</textarea></td>
      <td><textarea class="cost">$75.00</textarea></td>
      <td><textarea class="qty">3</textarea></td>
      <td><span class="price">$225.00</span></td>
  </tr> -->
  
  <!-- <tr id="hiderow">
    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
  </tr>
   -->
  <tr>

      <td colspan="2" class="blank"> </td>
      <td colspan="2" class="total-line">Total</td>
      <td class="total-value"><div id="total">Rs.<?php echo $total ?>.00</div></td>
  </tr>
  <tr>
      <td colspan="2" class="blank"> </td>
      <td colspan="2" class="total-line">Amount Paid</td>

      <td class="total-value"><textarea id="paid">Rs.<?php echo $cash ?>.00</textarea></td>
  </tr>
  <tr>
      <td colspan="2" class="blank"> No of Items : <?php echo " " .$noofItems ?></td>
      <td colspan="2" class="total-line balance">Balance Due</td>
      <td class="total-value balance"><div class="due">Rs.<?php echo $balance ?>.00</div></td>
  </tr>

</table>

<div id="terms">
  <h5>Terms</h5>
  <textarea>Valid Until only 30 Days.</textarea>
  <textarea>All Right Reserved | Company_Name | 2020.</textarea>
</div>

</div>

</body>
</html>