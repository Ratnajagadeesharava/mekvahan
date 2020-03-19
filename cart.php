<?php include_once("includes/db.inc.php");
    include_once("includes/header.php");
    $username = $_SESSION['user'];
    $cost =0;
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">item id</th>
      <th scope="col">item name</th>
      <th scope="col">quantity</th>
      <th scope="col">cost</th>
      <th scope="col">date</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      <?php 
        $sql = "SELECT `id`, `item_id`, `item_name`, `quantity`, `user`, `cost`, `date` FROM `cart` WHERE `user` ='$username'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($query)){
      ?>
    <tr>
     
      <td><?php echo $row['item_id']; ?></td>
      <td><?php echo $row['item_name']; ?></td>
      <td><?php echo $row['quantity']; ?></td>
      <td><?php echo $row['cost']; $cost = $cost+$row['cost']; ?></td>
      <td><?php echo $row['date']; ?></td>
        <td><button class="btn btn-danger" id="cart<?php echo $row['item_id']; ?>">delete</button></td>
        <script>
            $(document).ready(function(){
                $("#cart<?php echo $row['item_id']; ?>").click(function(){
                        var adv =<?php echo $row['item_id'];?>;
                    $(".loadcart").load("cartdelete.php",{
                       itemc:adv
                    });
                });
            });
            
         
        </script>
    </tr>

        <?php }?>
  </tbody>
</table>
<h3>Total cost :<?php echo $cost; ?></h3>

<?php 
    include_once("includes/footer.php");
 ?>
<div class="loadcart">

</div>