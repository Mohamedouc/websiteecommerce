<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:user_login.php');
}
/* */
if(isset($_POST['test'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn,$_POST['adresse'].', '. $_POST['city']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;

    $produit ='';
    $price ='';
    $quantity ='';
    $image ='';
    $id_det='';
    $description ='';
    /* */ $product_id[]='';
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
       while($cart_item = mysqli_fetch_assoc($cart_query)){
          $sub_total = ($cart_item['price'] * $cart_item['quantity']);
          $cart_total += $sub_total;

    
          $product_id[]=$cart_item['product_id'];
       }
    }
   

    $order_query = mysqli_query($conn, "SELECT * FROM `commande` WHERE name_cl = '$name' AND number_cl = '$number' AND email = '$email' AND address_cl= '$address' AND total_price = '$cart_total'") or die('query failed');
  

            

    if($cart_total == 0){
       $message[] = 'your cart is empty';
    }else{
       if(mysqli_num_rows($order_query) > 0){
          $message[] = 'order already placed!'; 
       }else{
        mysqli_query($conn, "INSERT INTO `commande`(user_id, name_cl, email, address_cl, total_price, time_order, number_cl,payment_statu) VALUES('$user_id', '$name', '$email', '$address', '$cart_total', '$placed_on ', '$number','pending')") or die('query failed');
        $select_id_cmd =mysqli_query($conn, "SELECT MAX(id_cmd) AS id_cmd FROM `commande`") or die('query failed');
         $id_cmd ='';
       while($cart_item_cmd = mysqli_fetch_assoc($select_id_cmd)) {
        $id_cmd =$cart_item_cmd['id_cmd'];
       }
      /* */ foreach($product_id as $pr_id){
        $cart_query_pr = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_id = '$pr_id'") or die('query failed');
        if(mysqli_num_rows($cart_query_pr) > 0){
           while($cart_item_pr = mysqli_fetch_assoc($cart_query_pr)){
            $produit =$cart_item_pr['name_pr'];
            $price =$cart_item_pr['price'];
            $quantity =$cart_item_pr['quantity'];
            $image =$cart_item_pr['image_pr'];
            $description =$cart_item_pr['pr_description'];
           mysqli_query($conn, "INSERT INTO `detaille`(id_commande,user_id,product_id, name_pr,pr_description, price, quantity, image_pr,time_order) VALUES('$id_cmd','$user_id','$pr_id','$produit','$description', '$price', '$quantity', '$image','$placed_on')") or die('query failed');
           header('location:home_user.php');

           }
        }
      }
      /* */

          $message[] = 'order placed successfully!';
          mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

       }

    }

 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="css/user_pag.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
<?php include 'header_user.php'; ?>

                 <!-- start payment -->
<div class="payment">
        <h2>Commander ici</h2>
        <form action="" method="post">
            <!--Account Information Start-->
         
            <div class="input_group">
                <div class="input_box">
                    <input type="text" placeholder="Nom" required class="name" name="name">
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="email" placeholder="Email" name="email" required class="name">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" placeholder="Addresse" name="adresse" required class="name">
                    <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" placeholder="Ville" name="city" required class="name">
                    <i class="fa fa-institution icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="number" name="number" placeholder="Téléphone" required class="name">
                    <i class="fas fa-phone icon" aria-hidden="true"></i>
                </div>
            </div>
            <!--Account Information End-->


            <div class="input_group">
                <div class="input_box">
                    <button type="submit" name="test">Commander</button>
                </div>
            </div>
            

        </form>
    </div>
             <!-- End payment -->
</body>
</html>