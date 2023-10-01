let user=document.querySelector("#user");
let sub_menu_wrap= document.querySelector(".sub-menu-wrap");
let searchBtn=document.querySelector("#searchBtn");
let search_form =document.querySelector(".search-form");
user.onclick= function(){
subMenu.classList.toggle("active");
search_form.classList.remove('active');
}
searchBtn.onclick =() =>{
search_form.classList.toggle('active');
subMenu.classList.remove('active');
}

window.onscroll = () =>{
search_form.classList.remove('active');
subMenu.classList.remove('active');
}

var log =document.getElementById("Login");
var regist =document.getElementById("Register");
var btn= document.getElementById("btn"); 
var logRed = document.getElementsByClassName("option-btn")[0];
var CloseBtn =document.getElementById("closeBt");
var btnConnecter =document.querySelector(".btnConnecter");
var btnInscrire=document.querySelector(".btnInscrire");
var cart_Btn =document.querySelector(".cart i");
var cart_menu =document.querySelector(".cart-menu");
var close_cart=document.querySelector("#close-cart");
logRed.onclick =function(){
   subMenu.classList.remove('active');
}
cart_Btn.onclick=function(){
   cart_menu.style.transform ="scale(1)";
   subMenu.classList.remove('active');
   search_form.classList.remove('active');
}
close_cart.onclick=function(){
   cart_menu.style.transform ="scale(0)";
}
CloseBtn.onclick =function(){
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

 /********** Start add to cart ****/
 if(document.readyState == "loading"){
    document.addEventListener('DOMContentLoaded',start);
 }else{
    start();
 }

 /************ * start ************/
  function start(){
     addEvents();
  }
  /************ update *************/
  function update(){
    addEvents();
    updateTotal();
  }
 /* ajouter le produit dans la cart  */
 function addEvents(){
       //REmove items
       let cartRemove_btns =document.querySelector(".fa-trash");
       console.log(cartRemove_btns);
       cartRemove_btns.forEach((btn) => {
        btn.addEventListener("click",handle_removeCartItem);
      });
      //change item quantity
      let cartQuantity_inputs =document.querySelectorAll('.cart-quantity');
      cartQuantity_inputs.forEach(input =>{
        input.addEventListener("change",handle_changeItemQuantity);
      })
 }


 
 function handle_removeCartItem(){
  this.parentElement.remove();
  update();
 }

 function handle_changeItemQuantity(){
  /**!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
 }
 function updateTotal(){
  let cartBoxes =document.querySelector(".cart-box");
  const totalElement =cart_menu.querySelector(".total-price");
  let total=0;
  cartBoxes.forEach(cartBox =>{
    let priceElement = cartBox.querySelector("cart-price");
    let price =parseFloat(priceElement.innerHtml.replace("","Dh"));
    let quantity =cartBox.querySelector(".cart-quantity").value;
    total += price * quantity;
  });
  totalElement.innerHTML= total + "Dhs";
 }

