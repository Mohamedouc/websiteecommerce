<?php 
include 'config.php';


/* pour admins */
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $cpass = mysqli_real_escape_string($conn,$_POST['cpassword']);
   $user_type =$_POST['user_type'];
   $image_admin =  $_FILES['image']['name'];
   $admin_image_tmp_name =$_FILES['image']['tmp_name'];
   $admin_image_folder = 'uploaded_img/'.$image_admin;

   $select_users = mysqli_query($conn, "SELECT * FROM `user_table` WHERE user_email = '$email' AND user_password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
        $upload =mysqli_query($conn, "INSERT INTO `user_table`(username, user_email, user_password,user_image, user_type) VALUES('$name', '$email', '$cpass','$image_admin', '$user_type')") or die('query failed');
        if($upload){
            move_uploaded_file($admin_image_tmp_name, $admin_image_folder);
            $message[] = 'registered successfully!';
        }else{
            $message[] = 'could not add the admin';
        }

        
      }
   }
   /*****/
}
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT user_image FROM `user_table` WHERE user_id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    mysqli_query($conn, "DELETE FROM `user_table` WHERE user_id = '$delete_id'") or die('query failed');
 }

 ?>             
              
              <!--========= add admin ======-->

<div class="container" id="ajadmin">
<?php include 'header_admin.php';?>

<div class="top">
    <div class="admin-product-form-container">

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <h3>Ajout admin</h3>
  <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" required class="box">
    <input type="text" name="name" placeholder="entrer le nom" required class="box">
    <input type="email" name="email" placeholder="entrer l'email" required class="box">
    <input type="password" name="password" placeholder="entrer mot de pass" required class="box">
    <input type="password" name="cpassword" placeholder="confirmer entrer mot de pass" required class="box">
    <select name="user_type" class="box">
        <option value="admin">admin</option>
        <option value="user">user</option>
    </select>
    <input type="submit" name="submit" value="ajouter" class="btn_pr">
</form>
</div>
<?php

$select = mysqli_query($conn, "SELECT * FROM `user_table`");

?>
<div class="product-display">
<table class="product-display-table">
    <thead>
        <tr>
            <th>admin_pic</th>
            <th>admin_name</th>
            <th>admin_email</th>
            <th>admin_password</th>  
            <th>action</th>

        </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
        <tr>
            <td><img src= "uploaded_img/<?php echo $row['user_image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['user_password']; ?></td>
            <td>
                <a href="update_admin.php?update=<?php echo $row['user_id']; ?>" class="btn_pr"> edit </a>
                <a href="admin_page.php?delete=<?php echo $row['user_id']; ?>" class="btn_pr">delete </a>
            </td>
        </tr>
        <?php } ?>
</table>
</div>
            </div>

</div>