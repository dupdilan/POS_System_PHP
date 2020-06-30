<?php
    
     require_once("connection.php");

     function selectItems(){                                                           
        $dbobj=new dbconnect();
        $con=$dbobj->getcon();
        $sql="SELECT name FROM tbl_items";
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


?>