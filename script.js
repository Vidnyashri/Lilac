let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

let slides = document.querySelectorAll('.home .slide');
let index = 0;

function next() {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev() {
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

//validition code for login
function switchForm(className,e){
    e.preventDefault();
    const allForm=document.querySelectorAll('form');
    const form=document.querySelector(`form.${className}`);

    allForm.forEach(item=> {
        item.classList.remove('active');

    })
    form.classList.add('active');

}

const registerPassword=document.querySelector('form.register #password');
const registerConfrimPassword=document.querySelector('form.register #confrim-pass');

registerPassword.addEventListener('input', function(){
    registerConfrimPassword.pattern=`${this.value}`;
})


document.querySelector('#close-update').onclick = () =>{
   document.querySelector('.edit-product-form').style.display = 'none';
   window.location.href = 'adminproducts.php';
}