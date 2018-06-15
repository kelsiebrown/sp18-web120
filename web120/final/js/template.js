// js for mobile nav bar toggle
var mainNav = document.getElementById('nav_main');
var navBarToggle = document.getElementById('navbar_toggle');

navBarToggle.addEventListener('click',function(){

    if(this.classList.contains('active')){
        mainNav.style.display='none';
        this.classList.remove('active');
    } else {
        mainNav.style.display='flex';
        this.classList.add('active');
    }
});
