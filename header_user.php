<?php 
include 'config.php';


?>
<header>
        <a href="home_user.php" class="logo"><img src="images/pngegg (30).png" alt=""></a>
        <form action="search_user.php" method="post" class="search-form">
            <input type="text" name="search_box" placeholder="Cherche ici..." required maxlength="100">
            <button type="submit" name="search_btn" class="searchBtn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <div class="icons">
            <div><a href="home_user.php"><i class="fa-solid fa-house"></i></a></div>
            <div><i class="fa-solid fa-magnifying-glass" id="searchBtn"></i></div>
            <div><i class="fa-solid fa-user" id="user"></i></div>
            <div class="cart"><i class="fa-solid fa-cart-shopping"></i></div>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
        <?php        
           $select_users = mysqli_query($conn, "SELECT * FROM `user_table` WHERE user_id = '$user_id'") or die('query failed'); 
            if(mysqli_num_rows($select_users) > 0){
           $row = mysqli_fetch_assoc($select_users);  
         ?>
            <div class="sub-menu">
                 <img src="uploaded_img/<?php echo $row['user_image']; ?>" class="personBtn">
                 <h3><?php echo $row['username']; ?></h3>
                 <p>client</p>
                 <div class="flex-btn">
                 <a href="user_logout.php" class="option-btn" onclick="return confirm('logout from the website?');">Déconnexion</a>
        
                 </div>
            </div>
            <?php
            }else{
         ?>
            <div class="sub-menu">
                 <img src="" class="personBtn">
                 <h3></h3>
                 <p></p>
                 <div class="flex-btn">
                 <a href="user_login.php" class="option-btn">Connexion</a>
        
                   </div>
            </div>
         <?php
            }
         ?> 
         </div>
         <!--  start Login -->
<div class="form-container">
    <div class="form">
    <div class="login-btn">
            <div id="btn"></div>
             <button type="button" onclick="login()" class="btnConnecter">Connecter</button>
             <button type="button" onclick="register()" class="btnInscrire">S'inscrire</button>
    </div>
        <div class="social-icons">
           
            </div>
            <?php include 'login.php'; ?>
            <?php include 'register.php'; ?>
    </div>


 </div>
               <!-- End Login -->
          
          <?php include 'cart.php'; ?>
            
    </header>
