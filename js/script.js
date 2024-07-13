document.addEventListener("DOMContentLoaded", function() {
    let customerBox = document.querySelector('.header .account-box');
    let navBar = document.querySelector('.header .flex-top .navbar');

    let customerBtn = document.querySelector('#customer-btn');
    let menuBtn = document.querySelector('#menu-btn');

    if (customerBtn) {
        customerBtn.onclick = () => {
            customerBox.classList.toggle('active');
            navBar.classList.remove('active');
        }
    }

    if (menuBtn) {
        menuBtn.onclick = () => {
            navBar.classList.toggle('active');
            customerBox.classList.remove('active');
        }
    }

    window.onscroll = () => {
        navBar.classList.remove('active');
        customerBox.classList.remove('active');
    }

});

function validateForm() {
    let name = document.forms["order"]["name"].value;
    if (name == "") {
      alert("Name must be filled out");
      return false;
    }
}
