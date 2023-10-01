<?php

include 'config.php';
if(isset($_POST['update_payment'])){
    $order_id = $_POST['order_id'];

    $payment_status = $_POST['payment_status'];
    
    mysqli_query($conn, "UPDATE `commande` SET payment_statu='$payment_status' WHERE id_cmd ='$order_id'") or die('query failed');
 }


?>

<div class="product-display" id="orders">
<?php include 'header_admin.php';?>

    <div class="top">
            <table class="product-display-table">
                        <thead>
                            <tr>
                                <th>nom</th>
                                <th>email</th>
                                <th>adresse</th>  
                                <th>numéro</th>
                                <th> prix total</th>
                                <th>temp de commande</th>
                                <th>statu</th>
                                <th>action</th>
                            </tr>
                          </thead>
                          <?php
      $select_orders = mysqli_query($conn, "SELECT * FROM `commande`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
                            <tr>
                                <td><?php echo $fetch_orders['name_cl']; ?></td>
                                <td><?php echo $fetch_orders['email']; ?></td>
                                <td><?php echo $fetch_orders['address_cl']; ?></td>
                                <td><?php echo $fetch_orders['number_cl']; ?></td>
                                <td><?php echo $fetch_orders['total_price']; ?></td>
                                <td><?php echo $fetch_orders['time_order']; ?></td>
                                <td>
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id_cmd']; ?>">
                               <select name="payment_status" class="select">
                                     <option selected ><?php echo $fetch_orders['payment_statu']; ?></option>
                                     <option value="Livré">Livré</option>
                                     <option value="En attente">En attente</option>
                                     <option value="Annuler">Annuler</option>
                                     <input type="submit" value="update" class="option-btn" name="update_payment">       
                                        
                                </select>  
                                </form>  
                                </td>
                                <td>                                  
                                        <a class="btn_pr" href="deteille.php?det=<?php echo $fetch_orders['id_cmd']; ?>">detaille</a>
                                </td>
                                                 
                          
 
                            </tr>
                            <?php
         }
      }else{
         echo '<p id="empty" >no orders placed yet!</p>';
      }
      ?>
                    </table>

            </div>
                   
    </div>