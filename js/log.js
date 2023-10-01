var form_container =document.getElementsByClassName("form-container")[0];
form_container.style.transform ="scale(1)";
var log =document.getElementById("Login");
var regist =document.getElementById("Register");
var btn= document.getElementById("btn"); 
var btnConnecter =document.querySelector(".btnConnecter");
var btnInscrire=document.querySelector(".btnInscrire");
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
