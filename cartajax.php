<?php
 

    session_start();
    if($_SESSION['user'] == null){
        ?>
        <script>
            alert("login to add items into cart");

        </script>
        <?php

    }
    else{
        // alert("<?php ")
        $username=$_SESSION['user'];
    
    include_once("includes/db.inc.php");
    $item_id = $_POST['itemc'];
    $sql = "SELECT `id`, `item_name`, `item_id`, `description`, `cost`, `image` FROM `items` WHERE `item_id`='$item_id'";
    $query1 = mysqli_query($conn,$sql);
    $item_name ='';
    $quantity =1;
    $cost =0;
    while($row=mysqli_fetch_array($query1)){
        $item_name = $item_name.$row['item_name'];
        // $quantity = 1;
        $cost = $row['cost'];

    }
    ?>
  
    <?php
    $date = date("Y-m-d");
    $sql = "SELECT * FROM `cart` WHERE `user`='$username' AND `item_id`='$item_id'";
    $query = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($query);
    if ($num >0){
        while($row = mysqli_fetch_array($query)){
            $cost = $row['cost'];
            $quantity =intval($row['quantity'])+1;
            // echo $quantity;
        }
        $cost = $cost*$quantity;
        $sql3 = "UPDATE `cart` SET `quantity`='$quantity',`cost`='$cost',`date`='$date' WHERE `user`='$username' AND `item_id`='$item_id'";
        // var_dump($sql3);
        $query = mysqli_query($conn,$sql3);
    }
    else{
        $sql2 = "INSERT INTO `cart`( `item_id`, `item_name`, `quantity`, `user`, `cost`,`date`) VALUES ('$item_id','$item_name','$quantity','$username','$cost','$date')";
        $query2 = mysqli_query($conn,$sql2);
    }
    ?>
    <script>
        alert("item is added succesfully");
    </script>
    <?php 

    }
?>
