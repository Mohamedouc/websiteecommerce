<?php
include 'config.php';
$id_pr =$_GET['edite'];
$sql_pr= "SELECT * FROM `products` WHERE product_id = '$id_pr'";
$result_pr= mysqli_query($conn,$sql_pr);
$row_pr =mysqli_fetch_assoc($result_pr);
$product_description =$row_pr['pr_description'];
$product_name =$row_pr['product_title'];
$product_price =  $row_pr['product_price'];
$product_quantity =  $row_pr['quantity'];
$categories = $row_pr['category_type'];
$type = $row_pr['p_type'];
$product_image =  $row_pr['product_image'];
/* pour products */

if(isset($_POST['submit'])){
    $product_name =$_POST['product_name'];
    $product_price =  $_POST['product_price'];
    $categories = $_POST['categories'];
    $quantity = $product_quantity+$_POST['quantity'];
    $type = $_POST['type'];
    $product_image =  $_FILES['product_image']['name'];
    $product_description = $_POST['description'];
    $sql= "UPDATE `products` SET product_title='$product_name',pr_description='$product_description',category_type='$categories',p_type='$type',product_image='$product_image',product_price='$product_price', quantity='$quantity' WHERE product_id='$id_pr'";
    $result=mysqli_query($conn,$sql);
    if($result){
      header('location:admin_page.php');
  }else{
   die(mysqli_error($conn));
  }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Modéfier le produit</title>
   <link rel="stylesheet" href="css/admin.css">

</head>
<body>
<div class="update_admin_page">
<div class="admin-product-form-container">
<form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
   <h3>Modéfier un produit</h3>
   <input type="text" placeholder="nom de produit" name="product_name" class="box" required  value="<?php echo $product_name;?>">
   <input type="text" placeholder="..." name="description" class="box" required  value="<?php echo $product_description;?>">
   <input type="number" placeholder="prix de produit" name="product_price" class="box" required  value="<?php echo $product_price;?>">
   <input type="number" placeholder="quantity" name="quantity" class="box" >

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
   <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" required  value="<?php echo $product_image;?>">
   <input type="submit" class="btn_pr" name="submit" value="Modéfier produit">
 </form>
</div>
</div>
</body>
</html>