<?php
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Dashboard </title>
    
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

    <!-- Navbar -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li >
                    <div class="user">
                        <img src="../images/ph.jpg" alt="">
                        <h2>Hello, <span>ABDELELLAH</span></h2>
                    </div>
                </li>
                <li onclick="dash()">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="clipboard-outline"></ion-icon>
                        </span>
                        <span class="title">Orders</span>
                    </a>
                </li>

                <li onclick="ajout_admin()">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Ajouter admin</span>
                    </a>
                </li>

                <li onclick="ajout_pr()">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </span>
                        <span class="title">Ajouter produit</span>
                    </a>
                </li>

                <li>
                    <a href="../user/home_user.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
        <?php

             if(isset($message)){
             foreach($message as $message){
                 echo '<span class="message">'.$message.'</span>';
   }
}

?>
            <div class="topbar">
                <div class="logo">
                    <a href="#">Service</a>
                </div>
                <div class="search">
                    <form action="" method="post" class="search-form">
                        <input type="text" name="search-box" placeholder="Search here..." required maxlength="100">
                        <button type="submit" name="search_box" class="searchBtn">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </form>
                </div>
                <div class="search_icon"><ion-icon name="search-outline" id="searchBtn"></ion-icon></div>
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

            </div>

           
            <?php include 'dashboard.php'; ?>
            <?php include 'update_product.php'; ?>
            <?php include 'add_product.php'; ?>
            <?php include 'add_admin.php'; ?>
            </div>
            </div><!--End-->
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="js/admin.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>