<?php 
include 'config.php';

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };

/* pour admins */
if(isset($_POST['submit'])){

   $name_reg = mysqli_real_escape_string($conn, $_POST['name']);
   $email_reg = mysqli_real_escape_string($conn, $_POST['email']);
   $pass_reg = mysqli_real_escape_string($conn, $_POST['password']);
   $cpass_reg = mysqli_real_escape_string($conn, $_POST['cpassword']);
   $image_admin_reg =  $_FILES['image']['name'];
   $admin_image_tmp_name_reg =$_FILES['image']['tmp_name'];
   $admin_image_folder_reg = 'uploaded_img/'.$image_admin;

   $select_users_reg = mysqli_query($conn, "SELECT * FROM `user_table` WHERE user_email = '$email_reg' AND user_password = '$pass_reg'") or die('query failed');

   if(mysqli_num_rows($select_users_reg) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass_reg != $cpass_reg){
         $message[] = 'confirm password not matched!';
      }else{
        $upload_reg =mysqli_query($conn, "INSERT INTO `user_table`(username, user_email, user_password,user_image, user_type) VALUES('$name_reg', '$email_reg', '$cpass_reg','$image_admin_reg', 'user')") or die('query failed');
        if($upload_reg){
            move_uploaded_file($admin_image_tmp_name_reg, $admin_image_folder_reg);
            $message[] = 'registered successfully!';
            $select_users = mysqli_query($conn, "SELECT * FROM `user_table` WHERE user_email = '$email_reg' AND user_password = '$pass_reg'") or die('query failed'); 
            $row = mysqli_fetch_assoc($select_users);
            if(mysqli_num_rows($select_users) > 0){
                $_SESSION['user_id'] = $row['user_id'];
                header('location:home_user.php');
            }


        }else{
            $message[] = 'Erreur';
        }

        
      }
   };

}
 ?> 
<div id="Register">
    <form action="" method="post">
    <div class="input-group">
                <div class="user-img">
                    <img src="" class="personBtn" id="photo">
                    <input type="file" id="file" name="image">
                    <label for="file" id="uploadImg"><i class="fas fa-camera"></i></label>
                </div>
                <input type="text"  placeholder="Entrez votre nom" required class="input-box" name="name">
                <input type="email" name="email" placeholder="adresse mail" required class="input-box">
                <input type="password" name="password" placeholder="mot de passe" required class="input-box">
                <input type="password" name="cpassword" placeholder="confirmez le mot de passe" required class="input-box">
    </div>
            <input type="submit" name="submit" value="Connexionn" class="btn">
    </form>

</div>