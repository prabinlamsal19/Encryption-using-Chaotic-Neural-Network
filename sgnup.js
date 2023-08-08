const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav');
    const navLinks = document.querySelectorAll('.nav li');
    


    burger.addEventListener('click', () => {
            //toggle nav
        nav.classList.toggle('nav-active');

            //Animate links
    navLinks.forEach((link, index)=>{
        if(link.style.animation){
            link.style.animation = '';
        } else {
            link.style.animation = `navFade 0.5s easy forwards ${index / 7 + 1.5}s`;
        }
        });
        //Burger animation
        burger.classList.toggle('toggle');

    });

}

navSlide();


function myFunction() {
    var x = document.getElementById("msg");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    } 