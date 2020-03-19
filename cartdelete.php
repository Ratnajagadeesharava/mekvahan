<?php
include_once("includes/db.inc.php");
    $id = $_POST['itemc'];

    $sql ="DELETE FROM `cart` WHERE `item_id`='$id'";
    $query = mysqli_query($conn,$sql);
    
    // header("Location:./cart.php"); 
 ?>
 <script>
    alert("deleted succesfully");
    location.reload();
 </script>