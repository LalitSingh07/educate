<?php

$pageTitle="home| educate"
?>
<?php require_once 'shared/header.php'; ?>
   <nav>
    <div id="header">
        <div class="container">
            <nav>
                    <img src="./assets/logo.png" alt="notify" class="logo" width="50px" height="50px">
                <ul id="sidemenu">
                    <li><a href="#header">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact us</a></li>
                    <li><a href="#about-us">About us</a></li>
                    <li><a href="login.php"><i class="fa-solid fa-user"></i>Login</a></li>
                    <a href="register.php"><button>Get Started</button></a>
                    <i class="fas fa-times" onclick="closemenu()"></i>
                </ul>
                <i class="fas fa-bars" onclick="openmenu()"></i>

            </nav>
            <div class="header-text" id="header-text">
                <h1>Communicate <span>Upload</span><br>Retrieve</h1> <br>
                <p>We provides an effective and powerful way to manage <br> your notes and previous year question paper</p>
                <a href="register.php"><button>Get Started</button></a>
            </div>
        </div>
    </div>
   </nav> 

   <!-- --------------------service------------------------ -->

   <div id="services">
    <div class="cont">
        <div class="subcont">
            <h1 class="sub-title" id="service-head">What We <br>Offers</h1>
        </div>

        <div class="service-list">
            <div class="item-1">
                <img src="./assets/backpack.png" alt="" id="item1bag">
                <img src="./assets/bags-phone.png" alt="" id="item1-2bag">
                <h1 id="item-1-head">N<span>o</span>tes</h1>
                <p id="item-1-para">
                    With Notes Section, you can take notes on any topic you are studying, format them with rich text and images, and share them with your classmates. Notes Section helps you study better, collaborate with others, and access your notes anytime and anywhere
                </p>
            </div>
<div class="gap">
    <div class="img1" id="img-1"></div>
    <div class="img1" id="img-2"></div>
    <div class="img1" id="img-3"></div>
    
</div>
            <div class="item-2">
                <img src="./assets/background-layer.png" alt="" class="item-2-img">
               
                <h1 id="item-2-head">previous <span> year Questions</span>Paper</h1>
                
                
            </div>
            <div class="item-3" >
                <h1>Discussion <span>forum</span></h1>
                <div class="card" id="item3card">
                    <div class="front" id="front"></div>
                         <div class="back">
                             <h1>discuss!</h1>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque praesentium ipsa tempora incidunt quia dolore nobis, eum voluptatum quibusdam ea quod, temporibus totam atque.</p>
                         </div>
                
             </div>
        </div>          
    </div>
</div>
</div>

<!-- -----------------------contact----------------------- -->
<div id="contact">
    <div class="container">
        <div class="row">
            <div class="contact-left">
                <h1 class="sub-titl">Contact Us</h1>
                <p><a href="mailto:lalitsingh99275910@gmail.com"><i class="fa-solid fa-paper-plane"></i> lalitsingh99275910@gmail.com</a></p>
                <p><a href="tel:+917900944181"><i class="fa-solid fa-phone"></i>7900944181</a></p>
            </div>
            <div class="contact-right">

                <form name="submit-to-google-sheet">
                    <input type="text" name="Name" placeholder="Your name" class="home-contact" required>
                    <input type="email" name="email" placeholder="Your email" class="home-contact" required>
                    <textarea name="Message" rows="6" placeholder="your meassage"></textarea>
                    <button type="submit" class="btn btn2">Submit</button>
                </form>
                <span id="msg"></span>
            </div>
        </div>
    </div>
 
</div>


<!-- -----------------about us------------------- -->
<div id="about-us">
<div class="container">
    <h1>About-Us</h1>
<p class="about-us-intro">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos illo corporis animi ullam sit in alias ipsam, corrupti eveniet, aperiam labore asperiores, vel optio.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos illo corporis animi ullam sit in alias ipsam, corrupti eveniet, aperiam labore asperiores, vel optio.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos illo corporis animi ullam sit in alias ipsam, corrupti eveniet, aperiam labore asperiores, vel optio.
</p>

    <div class="devs-img">
        <span class="dev" >
                <img src="./assets/meme1.webp" alt="">
                <div class="layer">
                    <h3>Lalit Singh</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab corporis suscipit assumenda pariatur quasi, a corrupti eius ut officiis voluptatem tempora accusantium dolores facere?
                    </p>
                    <a href="https://lalitsingh07.github.io/portfolio/" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
        </span> 

        <span class="dev">
            <img src="./assets/meme1.png" alt="">
            <div class="layer">
                <h3>Sandeep singh</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab corporis suscipit assumenda pariatur quasi, a corrupti eius ut officiis voluptatem tempora accusantium dolores facere?
                </p>
                <a href="https://www.linkedin.com/in/sandeep-singh-rawat-082333217" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>  
        </span>

        <span class="dev">
            <img src="./assets/meme3.jpg" alt="">
            <div class="layer">
                <h3>Nimisha Pandey</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab corporis suscipit assumenda pariatur quasi, a corrupti eius ut officiis voluptatem tempora accusantium dolores facere?
                </p>
                <a href="https://www.linkedin.com/in/nimisha-pandey-629b17216" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
        </span>

        <span class="dev">
            <img src="./assets/meme4.jpg" alt="">
            <div class="layer">
                <h3>Taniya Gariya</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab corporis suscipit assumenda pariatur quasi, a corrupti eius ut officiis voluptatem tempora accusantium dolores facere?
                </p>
                <a href="https://www.linkedin.com/in/taniyagariya" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
        </span>   
    </div>


</div>

<div class="copyright">
    <p>Copyright ©️ LALIT </p>
</div>  
</div>




<!-- -----------------------------scrolling animation ------------------------------------------ -->
<script>
    const intro = document.getElementById('header');
    const servhead = document.getElementById('service-head');
   
  
    window.addEventListener('scroll',function(){
        let query = window.matchMedia("(max-width: 600px)");
        if(query.matches){
            servhead.style.fontSize=10+ +window.pageYOffset/3+'%';
        }
        else{
            intro.style.backgroundSize=100- +window.pageYOffset/30+ '%';
       intro.style.opacity=1- +window.pageYOffset/500+'';
       servhead.style.fontSize=0+ +window.pageYOffset/90+'em';
       servhead.style.opacity=550- +window.pageYOffset/2+'';
        }
    });
</script>
<!-- ------------------------------feed back script google sheet-------------------------------- -->
<script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbzgOzFUqcQk5PtR3zguBajsi7hp4um4TRD3TdDcfjDiItGPfcEw8jJQrxv8DfQD3xGEDw/exec'
    const form = document.forms['submit-to-google-sheet']
    const msg = document.getElementById("msg")
    form.addEventListener('submit', e => {
      e.preventDefault()
      fetch(scriptURL, { method: 'POST', body: new FormData(form)})
        .then(response =>  {
            msg.innerHTML="message sent successfully"
            setTimeout(function(){
                msg.innerHTML=""
            },5000 )
            form.reset()
        })
        .catch(error => console.error('Error!', error.message))
    })
  </script>
<!-- -------------------------scrolling trigger------------------------- -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>

<script>
    gsap.from("#item1bag",{
        scrollTrigger:{
            scrub: true
        },
        x:-200, })
    gsap.from("#item-1-head",{
        scrollTrigger:{
            scrub: true
        },
        x:30, })
    gsap.from("#item-1-para",{
        scrollTrigger:{
            scrub: true
        },
        x:-205, })
    gsap.from("#item-2-head",{
        scrollTrigger:{
            scrub: true
        },
       x:  -500, duration:0.8, })
    gsap.from("#img-1",{
        scrollTrigger:{
            scrub: true
        },
       x:  -500, duration:0.8, })
    gsap.from("#img-2",{
        scrollTrigger:{
            scrub: true
        },
       x:  500, duration:0.8, })
    gsap.from("#img-3",{
        scrollTrigger:{
            scrub: true
        },
       opacity:5.55, duration:3, })
   
</script>
<!-- ----------------------------------closing tab script--------------- -->
<script>
    var sidemenu = document.getElementById("sidemenu");
            
            function openmenu(){
                sidemenu.style.right="0";
            }
            function closemenu(){
                sidemenu.style.right="-150px";
            }
</script>

<script src="./javascript/card.js"></script>
</body>
</html>