let customerBox = document.querySelector('.header .account-box');
let navBar = document.querySelector('.header .flex .navbar');

document.querySelector('#customer-btn').onclick = () =>{
    customerBox.classList.toggle('active');
    navBar.classList.remove('active');
}

document.querySelector('#menu-btn').onclick = () =>{
    navBar.classList.toggle('active');
    customerBox.classList.remove('active');
}

window.onscroll = () =>{
    navBar.classList.remove('active');
    customerBox.classList.remove('active');
}


