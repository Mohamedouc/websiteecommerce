<?php
include 'config.php';


/* pour products */

if(isset($_POST['add_product'])){
    $product_name =mysqli_real_escape_string($conn, $_POST['product_name']);;
    $product_price =  $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $categories = $_POST['categories'];

    $select_product_name = mysqli_query($conn, "SELECT product_title FROM `products` WHERE product_title = '$product_name'") or die('query failed');
    
    $product_image =  $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;

   if(mysqli_num_rows($select_product_name) > 0){
    $message[] = 'product name already added';
 }else{
   $add_product_query =mysqli_query($conn, "INSERT INTO `products`(product_title, product_description, category_type,product_image, product_price) VALUES('$product_name', '$product_description', '$categories','$product_image', '$product_price')") or die('query failed');

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
    unlink('uploaded_img/'.$fetch_delete_image['product_image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
    header('location:admin_page.php');
 }
 /* update product */

?>

<div class="container" id="ajpr">

<div class="admin-product-form-container">

   <form  action="" method="post" enctype="multipart/form-data">
      <h3>Ajouter un produit</h3>
      <input type="text" placeholder="nom de produit" name="product_name" class="box" required>
      <input type="text" placeholder="description" name="product_description" class="box" required>
      <input type="number" placeholder="prix de produit" name="product_price" class="box" required>
      <select name="categories" class="box" >
        <option value="Marbre">Marbre</option>
        <option value="Zellige">Zellige</option>
        <option value="Peinture murale">Peinture murale</option>
        <option value="Electricity">Electricity</option>
        <option value="Matériaux,gros oeuvre">Matériaux,gros oeuvre</option>

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
          <th>product image</th>
          <th>product name</th>
          <th>product description</th>
          <th>product price</th>
          <th>categories</th>
          <th>action</th>
    
       </tr>
       </thead>
       <?php while($row = mysqli_fetch_assoc($selec)){ ?>
       <tr>
          <td><img src="uploaded_img/<?php echo $row['product_image']; ?>" height="100" alt=""></td>
          <td><?php echo $row['product_title']; ?></td>
          <td><?php echo $row['product_description']; ?></td>
          <td><?php echo $row['product_price']; ?>Dhs</td>
          <td><?php echo $row['category_type']; ?></td>
          <td>
             <a href="update_product.php?edit =<?php echo $row['product_id']; ?>" class="btn_pr"> edit </a>
             <a href="add_product.php?delete=<?php echo $row['product_id']; ?>" class="btn_pr" onclick="return confirm('delete this product?');">delete </a>
          </td>
       </tr>
       <?php } ?>
    </table>
 </div>

</div>