            <?php 
                 include 'config.php';
             ?> 
            <!-- ======================= Cards ================== -->
            
        <div id="dashboard">
        <?php include 'header_admin.php';?>

            <div class="top">
            <div class="cardBox">
                    <div class="card">
                    <?php 
                        $select_product= mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                        $number_of_product = mysqli_num_rows($select_product);
                   ?>
                        <div>
                            <div class="numbers"><?php echo $number_of_product; ?></div>
                            <div class="cardName">Les produits</div>
                        </div>
    
                        <div class="iconBx">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </div>
                    </div>
    
                    <div class="card">
                    <?php 
                        $select_panier= mysqli_query($conn, "SELECT * FROM `commande` WHERE payment_statu='Livré'") or die('query failed');
                        $number_of_panier = mysqli_num_rows($select_panier);
                   ?>
                        <div>
                            <div class="numbers"><?php echo $number_of_panier; ?></div>
                            <div class="cardName">Ventes</div>
                        </div>
    
                        <div class="iconBx">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                    </div>
    
                    <div class="card">
                    <?php
                       $total_pendings = 0;
                       $select_pending = mysqli_query($conn, "SELECT total_price FROM `commande` WHERE payment_statu = 'En attente'") or die('query failed');
                       if(mysqli_num_rows($select_pending) > 0){
                       while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                       $total_price = $fetch_pendings['total_price'];
                       $total_pendings += $total_price;
                            };
                        };
                    ?>
                        <div>
                            <div class="numbers"><?php echo $total_pendings; ?>Dh</div>
                            <div class="cardName">En attente</div>
                        </div>
    
                        <div class="iconBx">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                    </div>
    
                    <div class="card">
                    <?php
                      $total_completed = 0;
                      $select_completed = mysqli_query($conn, "SELECT total_price FROM `commande` WHERE payment_statu = 'Livré'") or die('query failed');
                      if(mysqli_num_rows($select_completed) > 0){
                     while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                     $total_price = $fetch_completed['total_price'];
                     $total_completed += $total_price;
                     };
                     };
                    ?>
                        <div>
                            <div class="numbers"><?php echo $total_completed; ?>Dh</div>
                            <div class="cardName">Revenus</div>
                        </div>
    
                        <div class="iconBx">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="card">
                    <?php 
                        $select_admins = mysqli_query($conn, "SELECT * FROM `user_table` WHERE user_type = 'admin'") or die('query failed');
                        $number_of_admin = mysqli_num_rows($select_admins);
                   ?>
                        <div>
                            <div class="numbers"><?php echo $number_of_admin; ?></div>
                            <div class="cardName">admins</div>
                        </div>
    
                        <div class="iconBx">
                            <ion-icon name="people-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="card">
                    <?php 
                        $select_users = mysqli_query($conn, "SELECT * FROM `user_table` WHERE user_type = 'user'") or die('query failed');
                        $number_of_users = mysqli_num_rows($select_users);
                   ?>
                        <div>
                            <div class="numbers"><?php echo $number_of_users; ?></div>
                            <div class="cardName">users</div>
                        </div>
    
                        <div class="iconBx">
                            <ion-icon name="people-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
<div class="graf">
<div class="jour_div">
    <div class="charts-card">
        <p class="chart-title">Top produits</p>
    </div>
<div>
  <canvas id="myChart"></canvas>
</div>
<?php 
        $select_top_product= mysqli_query($conn, "SELECT name_pr,SUM(quantity) as total_quantity FROM `detaille` GROUP BY name_pr  ORDER BY total_quantity DESC") or die('query failed');
        foreach($select_top_product as $data){
             $produit[]=$data['name_pr'];
             $quantity[]=$data['total_quantity'];
        }

?>
<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($produit)?>,
      datasets: [{
        label: '# of Votes',
        data: <?php echo json_encode($quantity)?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</div>
<!-- -->
<div class="jour_div" >
    <div class="charts-card">
        <p class="chart-title">Top produits aujourd'hui</p>
    </div>
<div>
  <canvas id="myChartt"></canvas>
</div>
<?php 
        $placed_on = date('d-M-Y');
        $select_top_productt= mysqli_query($conn, "SELECT name_pr,SUM(quantity) as total_quantity FROM `detaille`  WHERE time_order ='$placed_on' GROUP BY name_pr  ORDER BY total_quantity DESC") or die('query failed');
        foreach($select_top_productt as $dataa){
             $produitt[]=$dataa['name_pr'];
             $quantit[]=$dataa['total_quantity'];
        }

?>
<script>
  const ct = document.getElementById('myChartt');
  new Chart(ct, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($produitt)?>,
      datasets: [{
        label: '# of Votes',
        data: <?php echo json_encode($quantit)?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</div>
<!-- -->
<!-- mois -->
<div class="jour_div">
    <div class="charts-card">
        <p class="chart-title">Top produits </p>
    </div>
<div>
  <canvas id="myCharttt"></canvas>
</div>
<?php 
        $select_top_produc= mysqli_query($conn, "SELECT name_pr,SUM(quantity) as total_quantity FROM `detaille` WHERE time_order >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) GROUP BY name_pr  ORDER BY total_quantity DESC") or die('query failed');
        foreach($select_top_produc as $dataaa){
             $produi[]=$dataaa['name_pr'];
             $quanti[]=$dataaa['total_quantity'];
        }

?>
<script>
  const ctxx = document.getElementById('myCharttt');
  new Chart(ctxx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($produi)?>,
      datasets: [{
        label: '# of Votes',
        data: <?php echo json_encode($quanti)?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</div>
<!-- -->
</div>
 </div>