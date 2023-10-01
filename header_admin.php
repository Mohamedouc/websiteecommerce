<?php 
include 'config.php';?>
<div class="topbar">
                <div class="logo">
                    <a href="admin_page.php" class="logo_pic"><img src="images/pngegg (30).png" alt=""></a>
                </div>
                <div class="search">
                    <form action="search_admin.php" method="post" class="search-form">
                        <input type="text" name="search_box" placeholder="Cherche ici..." required maxlength="100">
                        <button type="submit" name="search_btn" class="searchBtn">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </form>
                </div>
                <div class="search_icon"><ion-icon name="search-outline" id="searchBtn"></ion-icon></div>
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

</div>