function toggleMenu() {
   const navLinks = document.querySelector('.nav-links');
   navLinks.classList.toggle('active');
}

document.querySelector('#user-btn').onclick = () =>{
   accountBox.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   accountBox.classList.remove('active');
}

document.getElementById('phone').addEventListener('input', function (e) {
   this.value = this.value.replace(/[^0-9]/g, '');
});