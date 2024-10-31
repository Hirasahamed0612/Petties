let navbar = document.querySelector('.header .navbar');
let accountBox = document.querySelector('.header .account-box');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   accountBox.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   accountBox.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   accountBox.classList.remove('active');
}

document.querySelector('input[name="update_price"]').addEventListener('input', function (e) {
   var x = e.target.value.replace(/[^0-9]/g, '');
   e.target.value = x;
});

document.querySelector('input[name="update_price"]').addEventListener('input', function (e) {
   var x = e.target.value.replace(/[^0-9]/g, '');
    if (x.startsWith('-')) {
      x = x.substring(1);
   }
   e.target.value = x;
});

document.querySelector('input[name="phone"]').addEventListener('input', function (e) {
   var x = e.target.value.replace(/[^0-9-]/g, ''); 
   e.target.value = x;
});

document.querySelector('input[name="phone"]').addEventListener('blur', function (e) {
   var x = e.target.value.replace(/[^0-9-]/g, ''); 
   if (x.startsWith('-')) {
      x = x.substring(1);
   }
   e.target.value = x;
});

