<?php
include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:user_login.php');
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Dashboard </title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

    <!-- Navbar -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li >
                <?php        
                $select_admin = mysqli_query($conn, "SELECT * FROM `user_table` WHERE user_id = '$admin_id'") or die('query failed'); 
                 if(mysqli_num_rows($select_admin) > 0){
                 $row = mysqli_fetch_assoc($select_admin);  
                ?>
                    <div class="user">
                        <img src="uploaded_img/<?php echo $row['user_image']; ?>" alt="">
                        <h2>Bonjour, <span><?php echo $row['username']; ?></span></h2>
                    </div>
                    <?php
                           }
                    ?>
                </li>
                <li onclick="dash()">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li onclick="order()">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="clipboard-outline"></ion-icon>
                        </span>
                        <span class="title">Commandes</span>
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
                    <a href="user_logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Déconnexion</span>
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


           
            <?php include 'dashboard.php'; ?>
            <?php include 'orders.php'; ?>
            <?php include 'add_product.php'; ?>
            <?php include 'add_admin.php'; ?>
            </div>
            </div><!--End-->
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="js/admin_j.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>