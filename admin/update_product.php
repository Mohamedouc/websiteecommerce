<?php
/*
@include 'config.php';
$id = $_GET['edit'];

if(isset($_POST['update_product'])){
    $update_name =mysqli_real_escape_string($conn, $_POST['product_name']);;
    $update_price =  $_POST['product_price'];
    $update_description = $_POST['product_description'];
    $categories_update = $_POST['categories'];
    $update_image =  $_FILES['product_image']['name'];
    $update_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/'.$update_image;
    
    if(empty($update_name) || empty($update_price) || empty($update_image) || empty($update_description) || empty($categories_update)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE `products` SET product_title = '$update_name',product_description= '$update_description',category_type='$categories_update',product_image='$update_image',product_price= '$update_price' WHERE product_id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($update_image_tmp_name, $update_image_folder);
         header('location:update_product.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }


}

?>

<div class="update_pr_Page" >
<div class="admin-product-form-container" >
<?php
      
      $selected = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = '$id'");
      while($row = mysqli_fetch_assoc($selected)){

   ?>
<form  action="" method="post" enctype="multipart/form-data">
   <h3>Edité le produit</h3>
   <input type="text" placeholder="nom de produit" name="product_name" class="box" value="<?php echo $row['product_title']; ?>" required>
   <input type="text" placeholder="description" name="product_description" class="box" <?php echo $row['product_description']; ?> required>
   <input type="number" placeholder="prix de produit" name="product_price" class="box" <?php echo $row['product_price']; ?> required>
   <select name="categories" class="box" >
     <option value="Marbre">Marbre</option>
     <option value="Zellige">Zellige</option>
     <option value="Peinture murale">Peinture murale</option>
     <option value="Electricity">Electricity</option>
     <option value="Matériaux,gros oeuvre">Matériaux,gros oeuvre</option>

   </select>
   <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" required>
   <div class="RE">
   <input type="submit" class="btn_pr" name="update_product" value="Edité">
   <input type="submit" class="btn_pr" name="exit" value="Returné">
   </div>
 </form>
 <?php }; ?>
</div>
</div>
*/