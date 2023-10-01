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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>
</head>
<body>
    <div class="header-1">
        <p id="ferst">De 9h00 à 21h00 </p>
        <div class="s1"></div>
        <p id="second">7 jours sur 7</p>
    </div>
    <?php include 'header_user.php'; ?>
<div class="home">
        <div class="pub">
            <section class="left">
               
                    <div class="parametre">
                       <div class="img_cat">
                           <img src="images/masonry-trowel-bricklayer-brick-f7a45849d878a77cda61111cf30ac0f8.png" id="pichome" alt="">
                        </div>
                        <div class="box_cat">
                            <a href="#" class="c1">Matériaux</a>
                            <a href="Materiaux.php">Afficher</a>
                        </div>
                     </div>
                     <div class="parametre">
                        <div class="img_cat">
                            <img src="images/ac-power-plugs-and-sockets-battery-charger-electricity-electric-current-energy-outlet-130ce40054e2a1238d2fc19c866d544c.png" id="pichome" alt="">
                        </div>
                        <div class="box_cat">
                        <a href="#" class="c1">Electricity</a>
                        <a href="Electricity.php">Afficher</a>
                        </div>

                     </div>
                     <div class="parametre">
                        <div class="img_cat">
                            <img src="images/paint-rollers-clip-art-paint-5d62e7e260815cd19d8a5c57cfb4e9ef.png" id="pichome" alt="">
                        </div>
                        <div class="box_cat">
                            <a href="#" class="c1">Peinture murale</a>
                            <a href="Peinture.php">Afficher</a>
                        </div>

                     </div>
                    <div class="parametre">
                        <div class="img_cat">
                            <img src="images/zellige-interior-design-services-mosaic-kitchen-pattern-kitchen-172d18d7fdfb4eacad91d0e3aeae6920.png" alt="" id="pichome">

                        </div>
                        <div class="box_cat">
                            <a href="#" class="c1">Zellige</a>
                            <a href="Zellige.php">Afficher</a>
                        </div>

                    </div>
                    <div class="parametre">
                         <div class="img_cat">
                            <img src="images/wall-furniture-stone-marble-polishing-stone-bce59ab682a64b485a84c5bb75d451a9.png" id="pichome" alt="">
                         </div>
                        <div class="box_cat">
                           <a href="#" class="c1">Marbre</a>
                           <a href="Marbre.php">Afficher</a>
                        </div>

                    </div>
                

            </section>
            <section class="swiper ">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/pic3.webp" alt="">
                    </div>
                </div>
            </section>
        </div>
<div class="All">
    <div class="top-vente">
            <div class="title_TopVe">
                 <h1>Top ventes</h1>
            </div>
            <div class="shop-content">
    <?php  
         $select_product_Top = mysqli_query($conn, "SELECT *,SUM(quantity) as total_quantity FROM `detaille` GROUP BY name_pr  ORDER BY total_quantity DESC LIMIT 4") or die('query failed');
         if(mysqli_num_rows($select_product_Top) > 0){
            while($fetch_products_Top = mysqli_fetch_assoc($select_product_Top)){
    ?>
        <div class="product-box">

            <form action="" method="post">
                <img src="uploaded_img/<?php echo $fetch_products_Top['image_pr']; ?>" alt="" class="product-img">
                <h2 class="product-title"><?php echo $fetch_products_Top['name_pr']; ?></h2>
                <p class="descreption"><?php echo $fetch_products_Top['pr_description']; ?> </p>
                <span class="product-price"><?php echo $fetch_products_Top['price']; ?>Dh</span>
                <input type="hidden" name="product_name" value="<?php echo $fetch_products_Top['name_pr']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products_Top['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products_Top['image_pr']; ?>">
                <input type="hidden" name="product_idd" value="<?php echo $fetch_products_Top['product_id']; ?>">
                <input type="hidden" name="product_description" value="<?php echo $fetch_products_Top['pr_description']; ?>">
                <button type="submit" name="add_to_cart"><i class="fa-solid fa-cart-shopping add-cart" ></i></button>
            </form>

        </div>
        <?php
              }
                }
        ?>
    </div>
    </div>
     <!--*********************-->
     <div class="top-vente">
            <div class="title_TopVe">
                 <h1>Les produits du mois</h1>
            </div>
<div class="shop-content">
    <?php  
         $select_product_PM = mysqli_query($conn, "SELECT * FROM `products` where  p_type = 'Les_produits_de_mois'") or die('query failed');
         if(mysqli_num_rows($select_product_PM) > 0){
            while($fetch_products_PM = mysqli_fetch_assoc($select_product_PM)){
    ?>
        <div class="product-box">

            <form action="" method="post">
                <img src="uploaded_img/<?php echo $fetch_products_PM['product_image']; ?>" alt="" class="product-img">
                <h2 class="product-title"><?php echo $fetch_products_PM['product_title']; ?></h2>
                <p class="descreption"><?php echo $fetch_products_PM['pr_description']; ?> </p>
                <span class="product-price"><?php echo $fetch_products_PM['product_price']; ?>Dh</span>
                <input type="hidden" name="product_name" value="<?php echo $fetch_products_PM['product_title']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products_PM['product_price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products_PM['product_image']; ?>">
                <input type="hidden" name="product_idd" value="<?php echo $fetch_products_PM['product_id']; ?>">
                <input type="hidden" name="product_description" value="<?php echo $fetch_products_PM['pr_description']; ?>">
                <button type="submit" name="add_to_cart"><i class="fa-solid fa-cart-shopping add-cart" ></i></button>
            </form>

        </div>
        <?php
              }
                }
        ?>
    </div>
    </div>
    <!-- **********   -->
    <div class="top-vente">
            <div class="title_TopVe">
                 <h1>Vous aimerez aussi</h1>
            </div>
    <div class="shop-content">
    <?php  
         $select_product_pub= mysqli_query($conn, "SELECT * FROM `products` where p_type = 'Vous_aimerez_aussi'") or die('query failed');
         if(mysqli_num_rows($select_product_pub) > 0){
            while($fetch_products_pub = mysqli_fetch_assoc($select_product_pub)){
    ?>
        <div class="product-box">

            <form action="" method="post">
                <img src="uploaded_img/<?php echo $fetch_products_pub['product_image']; ?>" alt="" class="product-img">
                <h2 class="product-title"><?php echo $fetch_products_pub['product_title']; ?></h2>
                <p class="descreption"><?php echo $fetch_products_pub['pr_description']; ?> </p>
                <span class="product-price"><?php echo $fetch_products_pub['product_price']; ?>Dh</span>
                <input type="hidden" name="product_name" value="<?php echo $fetch_products_pub['product_title']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products_pub['product_price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products_pub['product_image']; ?>">
                <input type="hidden" name="product_description" value="<?php echo $fetch_products_pub['pr_description']; ?>">
                <input type="hidden" name="product_idd" value="<?php echo $fetch_products_pub['product_id']; ?>">
                <button type="submit" name="add_to_cart"><i class="fa-solid fa-cart-shopping add-cart" ></i></button>
            </form>

        </div>
        <?php
              }
                }
        ?>
    </div>
    </div>
       
   </div>
</div>

 <?php include 'footer.php'; ?>
<script src="js/user.js"></script>
<script src="https://kit.fontawesome.com/d32c9e560c.js" crossorigin="anonymous"></script>
</body>
</html>