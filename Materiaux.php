<?php

include 'config.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
if(isset($_POST['add_to_cart'])){
    if($user_id == ''){
        header('location:user_login.php');
     }else{
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $descr =$_POST['product_description'];
    $product_id=$_POST['product_idd'];

    $check_cart_numbers = mysqli_query($conn, "SELECT name_pr FROM `cart` WHERE name_pr ='$product_name' AND user_id ='$user_id'") or die('query failed');
 
    if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart!';
    }else{
       mysqli_query($conn, "INSERT INTO `cart`(product_id,user_id,name_pr,pr_description, price,quantity, image_pr) VALUES('$product_id','$user_id','$product_name','$descr','$product_price',1, '$product_image')") or die('query failed');
       $message[] = 'product added to cart!';
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
    <link rel="stylesheet" href="css/user_pag.css">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php include 'header_user.php'; ?>
<section class="shop container">
    <h2 class="section-title">MATÉRIAUX,GROS OEUVRE</h2>
    <div class="shop-content">
    <?php  
         $select_product_Materiaux = mysqli_query($conn, "SELECT * FROM `products` where category_type = 'Materiaux,gros oeuvre'") or die('query failed');
         if(mysqli_num_rows($select_product_Materiaux) > 0){
            while($fetch_products_Materiaux = mysqli_fetch_assoc($select_product_Materiaux)){
    ?>
        <div class="product-box">

            <form action="" method="post">
                <img src="uploaded_img/<?php echo $fetch_products_Materiaux['product_image']; ?>" alt="" class="product-img">
                <h2 class="product-title"><?php echo $fetch_products_Materiaux['product_title']; ?></h2>
                <p class="descreption"><?php echo $fetch_products_Materiaux['pr_description']; ?> </p>
                <span class="product-price"><?php echo $fetch_products_Materiaux['product_price']; ?>Dhs</span>
                <input type="hidden" name="product_name" value="<?php echo $fetch_products_Materiaux['product_title']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products_Materiaux['product_price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products_Materiaux['product_image']; ?>">
                <input type="hidden" name="product_idd" value="<?php echo $fetch_products_Top['product_id']; ?>">
                <input type="hidden" name="product_description" value="<?php echo $fetch_products_pub['pr_description']; ?>">
                <button type="submit" name="add_to_cart"><i class="fa-solid fa-cart-shopping add-cart" ></i></button>

            </form>

        </div>
        <?php
              }
                }
        ?>
    </div>
</section>
<?php include 'footer.php'; ?>
<script src="js/user.js"></script>

</body>
</html>