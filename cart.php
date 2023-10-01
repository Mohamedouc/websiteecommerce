<?php

    include 'config.php';

     
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
     }
     if(isset($_POST['update_cart'])){
        $cart_id = $_POST['cart_id'];
        $cart_quantit = $_POST['cart-quantit'];
        mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantit' WHERE id = '$cart_id'") or die('query failed');
     }

?>

<!-- Start cart -->
    <div class="cart-menu">
       <h2 class="cart-title">Panier</h2>
           <div class="cart-content">
           <?php
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id ='$user_id'") or die('query failed');
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
               <div class="cart-box">
                   <img src="uploaded_img/<?php echo $fetch_cart['image_pr']; ?>" alt="" class="cart-img">
                   <div class="detail-box">
                       <div class="cart-product-title"><?php echo $fetch_cart['name_pr']; ?></div>
                       <div class="cart-price"><?php echo $fetch_cart['price']; ?>Dh</div>
                       <form action="" method="post">
                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                        <div>    
                            <input type="number" value="<?php echo $fetch_cart['quantity']; ?>" name="cart-quantit" class="cart-quantity">
                            <input type="submit" name="update_cart" value="modifier" class="up_quantity">
                        </div>
                         <!-- Remove cart -->
                       </form>
                       <a href="?delete=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('delete this from cart?');"><i class="fa-solid fa-trash" id="cart-remove" ></i></a>
                       <div class="sub-total"> total : <span><?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>Dhs</span> </div>
                   </div>
                  
               </div>
               <?php
                    $grand_total += $sub_total;
                   }
               }
               ?>
           </div>
           <!-- Total -->
           <div class="total">
               <div class="total-title">Total</div>
               <div class="total-price"><?php echo $grand_total; ?> Dh</div>
           </div>
           <!-- Button Acheter-->
           <button type="button" class="btn-buy"  <?php echo ($grand_total > 1)?'':'disabled'; ?>><a href="payment.php">Acheter</a></button>
           
        <!-- Cart close -->
        <i class="fa-solid fa-xmark" id="close-cart"></i>
  </div>