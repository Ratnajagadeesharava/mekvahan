<?php
    include_once("includes/header.php");
   
?>

<div class="container-fluid">
    <div class="row">
        <?php 
            $sql = "SELECT * FROM `items` WHERE 1";
            $query = mysqli_query($conn,$sql);
            while($row =mysqli_fetch_array($query)){
                
                ?>
                <div class="col-lg-4" style="padding-bottom:50px">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/<?php echo $row['image']; ?>.jfif" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['item_name']; ?></h5>
                  <p class="card-text"><?php echo $row['description']; ?></p>
                  <h4 class="card-title">cost:rs<?php echo $row['cost']; ?></h4>
                  <!-- <a id="cart" href="#" class="btn btn-danger">Add to Cart</a> -->
                  <button class="btn btn-danger cart" id="cart<?php echo $row['item_id']; ?>">Add to Cart</button>
                </div>
              </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#cart<?php echo $row['item_id']; ?>").click(function(){
                        var adv =<?php echo $row['item_id'];?>;
                    $(".loadcart").load("cartajax.php",{
                       itemc:adv
                    });
                });
            });
            
         
        </script>
                <?php
            }
        ?>
      
    </div>
    
</div>
<div class="loadcart"></div>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="includes/login.php" method="post">
              <input type="email" class="form-control" name="email" id="" placeholder="email"><br>
              <input type="password"class="form-control" name="password" placeholder="Password" id="">
              <br>
              <input type="submit" class="btn btn-primary" value="Login" >          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Login</button> -->
        </div>
      </div>
    </div>
  </div>
<style>
    .container-fluid{
        padding-top:50px;
        padding-left: 100px;
       
    }
    .row{
        padding-bottom: 40px;
    }
    .navbar-light .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;..");
}
</style>
<?php 
include_once("includes/footer.php");
?>