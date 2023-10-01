<?php

include 'config.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include 'header_admin.php'; ?>
<div class="product-display">
<table class="product-display-table">
   <thead>
   <tr>
      <th>product image</th>
      <th>product name</th>
      <th>product price</th>
      <th>categories</th>
      <th>type</th>
      <th>quantity</th>
      <th>action</th>

   </tr>

   </thead>
   <?php
     
     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE product_title LIKE '%{$search_box}%'") or die('query failed');
     if(mysqli_num_rows($select_product) > 0){
        while($fetch_products = mysqli_fetch_assoc($select_product)){
   ?>
   <tr>
      <td><img src="uploaded_img/<?php echo $fetch_products['product_image']; ?>" height="100" alt=""></td>
      <td><?php echo $fetch_products['product_title']; ?></td>
      <td><?php echo $fetch_products['product_price']; ?>Dhs</td>
      <td><?php echo $fetch_products['category_type']; ?></td>
      <td><?php echo $fetch_products['p_type']; ?></td>
      <td><?php echo $fetch_products['quantity'] ?></td>
      <td>
         <a  class="btn_pr" href="update_product.php?edite=<?php echo $fetch_products['product_id']; ?>"> edit </a>
         <a href="admin_page.php?delete=<?php echo $fetch_products['product_id']; ?>" class="btn_pr" onclick="return confirm('delete this product?');">delete </a>
      </td>
   </tr>
   
   <?php
                       }
                    }else{
                       echo '<p id="empty">no products found!</p>';
                    }
                 }
        ?>
</table>

</div>

<script src="js/admin_j.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>