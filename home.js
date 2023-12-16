$('#menu-btn').click(function(){
        $('nav .navigation ul').addClass('active')
    })

    $('#menu-close').click(function(){
        $('nav .navigation ul').removeClass('active')
    })



    
      // // auto type

      // var typed = new Typed('.auto-type', {
      //   strings: ['<i>WEB</i> with SHIVAM' , 'E-Learning WEBSITE'],
      //   typeSpeed: 70,
      //   backSpeed:70,
      //   backDelay:1000,
      //   loop:true
      // });



      // toggel key  dark mode and light mode switch

      const toggle_btn = document.querySelector('#checkbox');
      console.log(toggle_btn)

      toggle_btn.addEventListener('change',()=>{
  
      if(toggle_btn.checked){
        // console.log("toggle_btn checked");
      document.body.classList.add('dark-mode');
      }

      else{
        document.body.classList.remove('dark-mode')
      }

      })
      
     
  