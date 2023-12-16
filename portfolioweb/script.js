// toggle icon navbar
let menuIcon =document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
  menuIcon.classList.toggle('bx-x');
  navbar.classList.toggle('active')
}



// scroll section
let sections = document.querySelectorAll('section')
let navLinks = document.querySelectorAll('header nav a')

window.onscroll = () =>{
  sections.forEach(sec =>{
    let top = window.scrollY;
    let offset = sec.offsetTop - 100;
    let height = sec.offsetHeight;
    let id = sec.getAttribute('id')
    
    if(top >= offset && top < offset + height){
        //  active navbar links
      navLinks.forEach(links =>{
        links.classList.remove('active')
        document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
            });

            // active sections for Animation on scrol
            sec.classList.add('show-animate');
           
    } 
    //  if wants to use animation that repeats on scroll use this
    else{
      sec.classList.remove('show-animate')
    }

  });



  //sticky header(navbar)
let header = document.querySelector('header');

header.classList.toggle('sticky', window.scrollY > 100);


// remove toggle icon and navbar when click navbar links(scroll)

menuIcon.classList.remove('bx-x');
navbar.classList.remove('active')

};





/*     swiper script   */

      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 50,
        loop: true,
        grabCursor:true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });


      // auto type

    var typed = new Typed('.auto-type', {
      strings: ['<i>WEB</i> developer' , 'Software Engineer'],
      typeSpeed: 70,
      backSpeed:70,
      backDelay:1000,
      loop:true
    });

