<?php 
include 'config.php';
$id_cmd =$_GET['det'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="css/admin.css">

    <title>deteille</title>
</head>
<body>

   <div class="product-display">
 <table class="product-display-table">
    <thead>
    <tr>
       <th>product image</th>
       <th>product name</th>
       <th>product price</th>
       <th>quantity</th>
       <th>total</th>
 
    </tr>
    </thead>

    <?php
    $selec = mysqli_query($conn, "SELECT * FROM `detaille` WHERE id_commande='$id_cmd'");
    while($row = mysqli_fetch_assoc($selec)){   
      ?>
    <tr>
       <td><img src="uploaded_img/<?php echo $row['image_pr']; ?>" height="100" alt=""></td>
       <td><?php echo $row['name_pr']; ?></td>
       <td><?php echo $row['price']; ?>Dh</td>
       <td><?php echo $row['quantity']; ?></td>
       <td><?php echo $row['quantity']*$row['price']; ?> DH</td>

    </tr>
    
    <?php  }?>
 </table>

</div>
 

</body>
</html>