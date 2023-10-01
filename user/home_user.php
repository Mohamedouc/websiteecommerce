<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>user_Home</title>
</head>
<body>
    <div class="header-1">
        <p id="ferst">De 9h00 à 21h00 </p>
        <div class="s1"></div>
        <p id="second">7 jours sur 7</p>
       </div>
    <header>
        <a href="#" class="logo">Service</a>
        <form action="" method="post" class="search-form">
            <input type="text" name="search-box" placeholder="Search here..." required maxlength="100">
            <button type="submit" name="search_box" class="searchBtn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <div class="icons">
            <div><i class="fa-solid fa-magnifying-glass" id="searchBtn"></i></div>
            <div><i class="fa-solid fa-user" id="user"></i></div>
            <div class="cart"><i class="fa-solid fa-cart-shopping"></i></div>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                 <img src="images/ph.jpg" class="personBtn">
                 <h3>Issile Abdelellah</h3>
                 <p>client</p>
                 <div class="flex-btn">
                    <a href="#" class="option-btn">login</a>
                 </div>
            </div>
         </div>
         <!--  start Login -->
<div class="form-container">
    <i class="fa-solid fa-xmark" id="closeBt"></i>
    <form action="" method="post">
        <div class="login-btn">
            <div id="btn"></div>
             <button type="button" onclick="login()" class="btnConnecter">Connecter</button>
             <button type="button" onclick="register()" class="btnInscrire">S'inscrire</button>
        </div>
        <div class="social-icons">
             <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_3s913D.json"  background="transparent"  speed="1" loop  autoplay></lottie-player>
             <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_Joz0FE.json"  background="transparent"  speed="1" loop  autoplay></lottie-player>
             <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_OFBfKg.json"  background="transparent"  speed="1" loop  autoplay></lottie-player>
             <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_0Cm1Y2.json"  background="transparent"  speed="1" loop  autoplay></lottie-player>
            </div>
        <div id="Login">
            <div class="input-group">
                <input type="email" name="email" placeholder="adresse mail" required class="input-box">
                <input type="password" name="password" placeholder="mot de passe" required class="input-box">
            </div>
            <p><a href="#">Mot de pass oublié ?</a></p>
            <input type="submit" name="submit" value="Connexion" class="btn">
        </div>
        <div id="Register">
            <div class="input-group">
                <div class="user-img">
                    <img src="../images/user.png" class="personBtn" id="photo">
                    <input type="file" id="file">
                    <label for="file" id="uploadImg"><i class="fas fa-camera"></i></label>
                </div>
                <input type="text"  placeholder="Entrez votre nom" required class="input-box">
                <input type="email" name="email" placeholder="adresse mail" required class="input-box">
                <input type="password" name="password" placeholder="mot de passe" required class="input-box">
                <input type="password" name="password" placeholder="confirmez le mot de passe" required class="input-box">
            </div>
            <input type="submit" name="submit" value="Connexion" class="btn">
        </div>
    </form>
 </div>
               <!-- End Login -->
            
               <!-- Start cart -->
  <div class="cart-menu">
       <h2 class="cart-title">Your cart</h2>
           <div class="cart-content">
               <div class="cart-box">
                   <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="" class="cart-img">
                   <div class="detail-box">
                       <div class="cart-product-title">Ciment</div>
                       <div class="cart-price">25 Dhs</div>
                       <input type="number" value="1" class="cart-quantity">
                   </div>
                   <!-- Remove cart -->
                   <i class="fa-solid fa-trash" id="cart-remove"></i>
               </div>
           </div>
           <!-- Total -->
           <div class="total">
               <div class="total-title">Total</div>
               <div class="total-price">25 Dhs</div>
           </div>
           <!-- Button Acheter-->
           <button type="button" class="btn-buy">Acheter</button>
           
        <!-- Cart close -->
        <i class="fa-solid fa-xmark" id="close-cart"></i>
  </div>
             <!-- start payment -->
<div class="payment">
        <h2>Payment Form</h2>
        <form action="" method="post">
            <!--Account Information Start-->
            <h4>Account</h4>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" placeholder="Nom" required class="name">
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="email" placeholder="Email" required class="name">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" placeholder="Addresse" required class="name">
                    <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" placeholder="Ville" required class="name">
                    <i class="fa fa-institution icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="number" name="number" placeholder="Téléphone" required class="name">
                    <i class="fas fa-phone icon" aria-hidden="true"></i>
                </div>
            </div>
            <!--Account Information End-->


            <!--DOB & Gender Start-->
            <div class="input_group">
                <div class="input_box">
                    <h4>Gender</h4>
                    <input type="radio" name="gender" class="radio" id="b1" checked>
                    <label for="b1">Homme</label>
                    <input type="radio" name="gender" class="radio" id="b2">
                    <label for="b2">Femme</label>
                </div>
            </div>
            <!--DOB & Gender End-->


       

            <div class="input_group">
                <div class="input_box">
                    <button type="submit">Acheter</button>
                </div>
            </div>

        </form>
        <i class="fa-solid fa-xmark" id="close-payment"></i>
    </div>
             <!-- End payment -->
    </header>
    
    <div class="home">
        <div class="pub">
            <section class="left">
                <div class="title-home">
                    <h2>Catégories</h2>
                </div>
                <div class="l1">
                    <div class="parametre">
                        <img src="../images/brickwall.png" id="pichome" alt="">
                        <a href="#" class="c1">Matériaux,gros oeuvre</a>
                     </div>
                     <div class="parametre">
                        <img src="../images/ac-power-plugs-and-sockets-electrical-engineering-computer-icons-electricity-architectural-engineering-others-b3abc48bef119cbb3e0a82cb499d4fe1.png" id="pichome" alt="">
                        <a href="#">Electricity</a>
                     </div>
                     <div class="parametre">
                        <img src="../images/computer-icons-painting-painter-business-roll-5ac3a2bc34c333b844b05fceb9f5736c.png" id="pichome" alt="">
                        <a href="#" class="c1">Peinture murale</a>
                     </div>
                    <div class="parametre">
                        <img src="../images/zellige-interior-design-services-mosaic-kitchen-pattern-kitchen-172d18d7fdfb4eacad91d0e3aeae6920.png" alt="" id="pichome">
                        <a href="#">Zellige</a>
                    </div>
                    <div class="parametre">
                        <img src="../images/wall-furniture-stone-marble-polishing-stone-bce59ab682a64b485a84c5bb75d451a9.png" id="pichome" alt="">
                        <a href="#">Marbre</a>
                    </div>
                </div>

            </section>
            <section class="swiper ">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="../images/pic3.webp" alt="">
                    </div>
                </div>
            </section>
            <section class="info">
                <div class="info-2">
                    <img src="../images/ph.jpg" class="personBtn">
                    <h3><section>Bonjour, </section> Abdelellah</h3>
                </div>
                <div class="flex-btn">
                    <a href="#" class="option-btn">login</a>
                 </div>
            </section>
        </div>
    <div class="All">
        <div class="top-vente">
            <div class="title_TopVe">
                 <h1>Top ventes</h1>
            </div>
          <div class="all_Boxs" >
              <div class="box">
                  <div class="picture">
                      <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
                  </div>
                  <div class="discription">
                      <h2 class="name">CIMENT</h2>
                      <p> un ciment Portland composé...</p>
                      <p class="price">40 Dhs</p>
                  </div>
              </div>
              <div class="box">
                  <div class="picture">
                      <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
                  </div>
                  <div class="discription">
                      <h2 class="name">CIMENT</h2>
                      <p> un ciment Portland composé...</p>
                      <p class="price">40 Dhs</p>
                  </div>
              </div>
              <div class="box">
                  <div class="picture">
                      <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
                  </div>
                  <div class="discription">
                      <h2 class="name">CIMENT</h2>
                      <p> un ciment Portland composé...</p>
                      <p class="price">40 Dhs</p>
                  </div>
              </div>
              <div class="box">
                  <div class="picture">
                      <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
                  </div>
                  <div class="discription">
                      <h2 class="name">CIMENT</h2>
                      <p> un ciment Portland composé...</p>
                      <p class="price">40 Dhs</p>
                  </div>
              </div>
          </div>
      </div>

     <!--*********************-->
      <div class="top-vente">
          <div class="title_TopVe">
               <h1>Les produits du mois</h1>
          </div>
        <div class="all_Boxs">
            <div class="box">
                <div class="picture">
                    <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
                </div>
                <div class="discription">
                    <h2 class="name">CIMENT</h2>
                    <p> un ciment Portland composé...</p>
                    <p class="price">40 Dhs</p>
                </div>
            </div>
            <div class="box">
                <div class="picture">
                    <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
                </div>
                <div class="discription">
                    <h2 class="name">CIMENT</h2>
                    <p> un ciment Portland composé...</p>
                    <p class="price">40 Dhs</p>
                </div>
            </div>
            <div class="box">
                <div class="picture">
                    <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
                </div>
                <div class="discription">
                    <h2 class="name">CIMENT</h2>
                    <p> un ciment Portland composé...</p>
                    <p class="price">40 Dhs</p>
                </div>
            </div>
            <div class="box">
                <div class="picture">
                    <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
                </div>
                <div class="discription">
                    <h2 class="name">CIMENT</h2>
                    <p> un ciment Portland composé...</p>
                    <p class="price">40 Dhs</p>
                </div>
            </div>
        </div>
    </div>
    <!-- **********   -->
    <div class="top-vente">
      <div class="title_TopVe">
           <h1>Vous aimerez aussi</h1>
      </div>
    <div class="all_Boxs">
        <div class="box">
            <div class="picture">
                <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
            </div>
            <div class="discription">
                <h2 class="name">CIMENT</h2>
                <p> un ciment Portland composé...</p>
                <p class="price">40 Dhs</p>
            </div>
        </div>
        <div class="box">
            <div class="picture">
                <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
            </div>
            <div class="discription">
                <h2 class="name">CIMENT</h2>
                <p> un ciment Portland composé...</p>
                <p class="price">40 Dhs</p>
            </div>
        </div>
        <div class="box">
            <div class="picture">
                <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
            </div>
            <div class="discription">
                <h2 class="name">CIMENT</h2>
                <p> un ciment Portland composé...</p>
                <p class="price">40 Dhs</p>
            </div>
        </div>
        <div class="box">
            <div class="picture">
                <img src="../images/cimarpro_v_octobre_2019.jpeg" alt="">
            </div>
            <div class="discription">
                <h2 class="name">CIMENT</h2>
                <p> un ciment Portland composé...</p>
                <p class="price">40 Dhs</p>
            </div>
        </div>
    </div>
    </div>
       
  </div>
 </div>

 <?php include 'footer.php'; ?>




<script>
    let user=document.querySelector("#user");
    let sub_menu_wrap= document.querySelector(".sub-menu-wrap");
    let searchBtn=document.querySelector("#searchBtn");
    let search_form =document.querySelector(".search-form");
   user.onclick= function(){
    subMenu.classList.toggle("active");
    search_form.classList.remove('active');
    form_container.style.transform ="scale(0)";
}
searchBtn.onclick =() =>{
    search_form.classList.toggle('active');
   subMenu.classList.remove('active');
   form_container.style.transform ="scale(0)";
}

window.onscroll = () =>{
   search_form.classList.remove('active');
   subMenu.classList.remove('active');
}


</script>


 <script>
     var log =document.getElementById("Login");
     var regist =document.getElementById("Register");
     var btn= document.getElementById("btn"); 
     var logRed = document.getElementsByClassName("option-btn")[0];
     var form_container =document.getElementsByClassName("form-container")[0];
     var CloseBtn =document.getElementById("closeBt");
     var btnConnecter =document.querySelector(".btnConnecter");
     var btnInscrire=document.querySelector(".btnInscrire");
     var cart_Btn =document.querySelector(".cart i");
     var cart_menu =document.querySelector(".cart-menu");
     var close_cart=document.querySelector("#close-cart");
     logRed.onclick =function(){
        subMenu.classList.remove('active');
        form_container.style.transform ="scale(1)";
     }
     cart_Btn.onclick=function(){
        cart_menu.style.transform ="scale(1)";
        form_container.style.transform ="scale(0)";
        subMenu.classList.remove('active');
        search_form.classList.remove('active');
     }
     close_cart.onclick=function(){
        cart_menu.style.transform ="scale(0)";
     }
     CloseBtn.onclick =function(){
        form_container.style.transform ="scale(0)";
     }
     function register(){
         log.style.left="-450px";
         regist.style.left="0px";
         btn.style.left="110px";
         log.style.transform ="scale(0)";
         regist.style.transform ="scale(1)";
         btnConnecter.style.color="black";
         btnInscrire.style.color="#fff";
     }
    
     function login(){
         log.style.left="0px";
         regist.style.left="450px";
         btn.style.left="0px";
         log.style.transform ="scale(1)";
         regist.style.transform ="scale(0)";
         btnConnecter.style.color="#fff";
         btnInscrire.style.color="black";
     }

      /* pour image*/
      const imgDiv=document.querySelector('.user-img');
      const img=document.querySelector('#photo');
      const file= document.querySelector('#file');
      const uploadImg= document.querySelector('#uploadImg');

      file.addEventListener('change',function(){
        const chosedfile =this.files[0];
        if(chosedfile){
            const reader = new FileReader();
            reader.addEventListener('load',function(){
                img.setAttribute('src',reader.result);
            })
            reader.readAsDataURL(chosedfile);

        };
      })

      /*** payment **/
      let acheter=document.querySelector(".btn-buy");
      let payment=document.querySelector(".payment");
      let close_payment=document.querySelector("#close-payment");

      acheter.onclick =function(){
        payment.style.transform="scale(1)";
        cart_menu.style.transform ="scale(0)";
      }
      close_payment.onclick=function(){
        payment.style.transform="scale(0)";
        cart_menu.style.transform ="scale(1)";
      }

 </script>
     
 <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
 <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
 <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
 <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
 
</body>
</html>