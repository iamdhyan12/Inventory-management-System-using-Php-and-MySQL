<?php
    if (isset($_POST['sub-edit'])){
    
    $con = mysqli_connect("localhost","root","","inventory");

    if(!$con){
        echo"Connection Error : ".mysqli_connect_error()."<br>";
    }
    else{
        echo"Connected to Db";
    }

     $sno=$_GET['editid'];

     $sold=$_POST['sold'];
     $comments=$_POST['comments'];

 
     
        // Update the item in the cart table
        $sno = $_GET['editid'];
        $sold = $_POST['sold'];
        $comments=$_POST['comments'];
        $query = "UPDATE cart SET Left_items=Left_items-$sold,sold=sold + $sold , Comments='$comments'where SrNo=$sno";
        $result = mysqli_query($con, $query);
    
        // Delete the last row from the table
        // $query = "DELETE FROM cart ORDER BY SrNo DESC LIMIT 1";
        // mysqli_query($con, $query);
    
        // Check if the update was successful
        if ($result) {
            echo "Item updated successfully.";
            echo "<script>window.location.href ='display.php'</script>";
        } 
        else {
            echo "Error updating item: " . mysqli_error($con);
        }
    
   


    }
?>
