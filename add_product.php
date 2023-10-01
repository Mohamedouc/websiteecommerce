<?php
include 'config.php';


/* pour products */

if(isset($_POST['add_product'])){
    $product_name =mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price =  $_POST['product_price'];
    $categories = $_POST['categories'];
    $type = $_POST['type'];
    $select_product_name = mysqli_query($conn, "SELECT product_title FROM `products` WHERE product_title = '$product_name'") or die('query failed');
    $product_image =  $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;
    $quantity = $_POST['quantity'];
    $description =$_POST['description'];
   if(mysqli_num_rows($select_product_name) > 0){
    $message[] = 'product name already added';
 }else{
   $add_product_query =mysqli_query($conn, "INSERT INTO `products`(product_title,pr_description, category_type,p_type,product_image, product_price,quantity) VALUES('$product_name','$description', '$categories','$type','$product_image', '$product_price','$quantity')") or die('query failed');

    if($add_product_query){

          move_uploaded_file($product_image_tmp_name, $product_image_folder);
          $message[] = 'product added successfully!';
       
    }else{
       $message[] = 'product could not be added!';
    }
 }
 }

 /* delete product */
 if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT product_image FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    mysqli_query($conn, "DELETE FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
 }



?>

<div class="container" id="ajpr">
<?php include 'header_admin.php';?>

<div class="top">
            <div class="admin-product-form-container">

<form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
   <h3>Ajouter un produit</h3>
   <input type="text" placeholder="nom de produit" name="product_name" class="box" required>
   <input type="text" placeholder="..." name="description" class="box" required>
   <input type="number" placeholder="prix de produit" name="product_price" class="box" required>
   <input type="number" placeholder="quantity" name="quantity" class="box" required>
   <select name="categories" class="box" >
     <option value="Marbre">Marbre</option>
     <option value="Zellige">Zellige</option>
     <option value="Peinture">Peinture murale</option>
     <option value="Electricity">Electricity</option>
     <option value="Materiaux,gros oeuvre">Matériaux,gros oeuvre</option>
   </select>
   <select name="type" class="box" >
     <option value="Top_ventes">Top ventes</option>
     <option value="Les_produits_de_mois">Les produits de mois</option>
     <option value="Vous_aimerez_aussi">Vous aimerez aussi</option>
     <option value="Aucun">Aucun</option>
   </select>
   <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" required>
   <input type="submit" class="btn_pr" name="add_product" value="Ajouter produit">
 </form>
</div>
<?php

 $selec = mysqli_query($conn, "SELECT * FROM `products`");

?>
<div class="product-display">
 <table class="product-display-table">
    <thead>
    <tr>
       <th>image</th>
       <th>nom</th>
       <th>prix</th>
       <th>description</th>
       <th>categories</th>
       <th>type</th>
       <th>quantity</th>
       <th>action</th>
 
    </tr>
    </thead>

    <?php 
    while($row = mysqli_fetch_assoc($selec)){   
      $pr_title = $row['product_title'];
      $total_qt =0;
       $selec_pr = mysqli_query($conn, "SELECT quantity FROM `detaille` WHERE name_pr ='$pr_title'");
       while($row_qt = mysqli_fetch_assoc($selec_pr)){
         $total_qt+= $row_qt['quantity'];
       }
      ?>
    <tr>
       <td><img src="uploaded_img/<?php echo $row['product_image']; ?>" height="100" alt=""></td>
       <td><?php echo $row['product_title']; ?></td>
       <td><?php echo $row['product_price']; ?>Dhs</td>
       <td><?php echo $row['pr_description']; ?></td>
       <td><?php echo $row['category_type']; ?></td>
       <td><?php echo $row['p_type']; ?></td>
       <td><?php echo $row['quantity']-$total_qt?></td>
       <td>
          <a  class="btn_pr" href="update_product.php?edite= $row['id']; "> edit </a>
          <a href="admin_page.php?delete=['id']; " class="btn_pr" onclick="return confirm('delete this product?');">delete </a>
       </td>
    </tr>
    
    <?php  }?>
 </table>

</div>
            </div>

</div>