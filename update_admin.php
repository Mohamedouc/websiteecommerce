
<?php 
include 'config.php';
$id =$_GET['update'];
$sql= "SELECT * FROM `user_table` WHERE user_id = '$id'";
$result=mysqli_query($conn,$sql);
$row =mysqli_fetch_assoc($result);

$name =$row['username'];
$email = $row['user_email'];
$pass =$row['user_password'];
$user_type =$row['user_type'];
$image_admin =  $row['user_image'];
/* pour admins */
if(isset($_POST['submit'])){

   $name =$_POST['name'];
   $email = $_POST['email'];
   $pass =$_POST['password'];
   $user_type =$_POST['user_type'];
   $image_admin =  $_FILES['image']['name'];
       
   $sql= "UPDATE `user_table` SET username='$name',user_email='$email',user_password='$pass',user_image='$image_admin',user_type='$user_type'WHERE user_id='$id '";
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
    <title>Modefier admin</title>
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>
<div class="update_admin_page">
<div class="admin-product-form-container">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <h3>Modéfier admin</h3>
  <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" required class="box" value="<?php echo $image_admin;?>">
    <input type="text" name="name" placeholder="entrer le nom" required class="box" value="<?php echo $name;?>">
    <input type="email" name="email" placeholder="entrer l'email" required class="box" value="<?php echo $email;?>">
    <input type="password" name="password" placeholder="entrer mot de pass" required class="box" value="<?php echo $pass;?>">
    <select name="user_type" class="box" >
        <option value="admin">admin</option>
        <option value="user">user</option>
    </select>
    <input type="submit" name="submit" value="Modéfier" class="btn_pr">
</form>
</div>
</div>

</body>
</html>