// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

let searchBtn=document.querySelector("#searchBtn");
let search_form=document.querySelector(".search-form");
let cardBox=document.querySelector(".cardBox");

searchBtn.addEventListener("click",function(){
  search_form.classList.toggle('active');
  cardBox.setAttribute("style","margin-top: 50px");
});
  // pour dashboard ,add product,add admin ....
  let ajpr=document.querySelector("#ajpr");
  let dashboard=document.querySelector("#dashboard");
  let ajadmin=document.querySelector("#ajadmin");
  let orders_pg=document.querySelector("#orders");
  function dash(){
    dashboard.style.display ="block";
    ajpr.style.display ="none";
    ajadmin.style.display ="none";
    orders_pg.style.display ="none";
  }
  function order(){
    dashboard.style.display ="none";
    ajpr.style.display ="none";
    ajadmin.style.display ="none";
    orders_pg.style.display ="block";
  }
  function ajout_pr(){
    dashboard.style.display ="none";
    ajpr.style.display ="block";
    ajadmin.style.display ="none";
    orders_pg.style.display ="none";


  }
  function ajout_admin(){
    ajadmin.style.display ="block";
    dashboard.style.display ="none";
    ajpr.style.display ="none";
    orders_pg.style.display ="none";
    
  }
