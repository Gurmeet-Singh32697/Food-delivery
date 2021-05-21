<?php
session_start();
include("connection.php");
$_SESSION['ordermsg'] = '';
?>



<html>
<head>
  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   


        <script src="jquery.waypoints.min.js"></script>
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/page.css">
	<link rel="stylesheet" type="text/css" href="./public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="./public/css/animate.css">
    <link rel="stylesheet" type="text/css" href="./public/css/my-quries.css">
    <link rel="stylesheet" type="text/css" href="./public/css/032%20grid.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>
        FoodShala</title>
    <body>
    <header>
        <nav>
            
            <ul class="main-nav js--main-nav">
				<li><a href="home.php">Browse Restaurants </a> </li>
            <li><a href="#features">Food delivery </a> </li>
                <li><a href="#how">How it works  </a> </li>
                <li><a href="#cities">Our cities </a> </li>
				<?php
			if(empty($_SESSION['loggedIn']) || $_SESSION['loggedIn']='')
			{
			?> 
				
				<li ><a href='login.php'>Sign In </a> </li>
				<?php
			}
			else
			{
			?>
				 <li ><a href='logout.php'>Log Out</a> </li>
				<?php } ?>
				
            </ul>
            <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
        </nav>
        <div class="main-heading">
       <h1> Good Food is<br> Good Mood.</h1>  
        <a class="btn btn-hungry" href="login.php">I’m hungry </a>
        <a class="btn btn-show" href="#features">Show me more  </a>
        </div></header>
        <section class="section-features js--section-features" id="features">
            <div class="row">
            <h2>Get food fast&mdash;not fast food.
                </h2>
                <p class="long-copy">Hello, we’re Omnifood, your new premium food delivery service. We know you’re always busy. No time for cooking. So let us take care of that, we’re really good at it, we promise! 
                 </p>
            </div>
            <div class="row js--wp-1">
                <div class="col span-1-of-4 boxs">
                    <i class="ion-ios-infinite-outline icon-big"></i>
                <h3> Up to 365 days/year</h3>
                    <p> Never cook again! We really mean that. Our subscription plans include up to 365 days/year coverage. You can also choose to order more flexibly if that's your style.</p>
                </div>
                <div class="col span-1-of-4 boxs">
                  <i class="ion-ios-stopwatch-outline icon-big"></i>

                <h3> Ready in 20 minutes</h3>
                    <p> You're only twenty minutes away from your delicious and super healthy meals delivered right to your home. We work with the best chefs in each town to ensure that you're 100% happy. </p>
                </div>
                <div class="col span-1-of-4 boxs">
                                             <i class="ion-ios-nutrition-outline icon-big"></i>

                <h3>100% organic </h3>
                    <p>All our vegetables are fresh, organic and local. Animals are raised without added hormones or antibiotics. Good for your health, the environment, and it also tastes better!  </p>
                </div>
                <div class="col span-1-of-4 boxs">
                    <i class="ion-ios-cart-outline icon-big" ></i>
                <h3> Order anything
                        </h3> 
                    <p> We don't limit your creativity, which means you can order whatever you feel like. You can also choose from our menu containing over 100 delicious meals. It's up to you! </p>
                </div>
                    
            </div>
                  
            
        </section>
        <section class="section-meals">
        <ul class="meals-showcase clearfix">
            <li>
            <figure class="meal-photo">
            <img src="./public/images/1.jpg">
                </figure>
            </li>
            <li>
            <figure  class="meal-photo">
                <img src="./public/images/2.jpg">
                </figure>
            </li>
            <li>
            <figure  class="meal-photo">
                <img src="./public/images/3.jpg">
                </figure>
            </li>
            <li>
            <figure  class="meal-photo">
                <img src="./public/images/4.jpg">
                </figure>
            </li>
            </ul>
            <ul class="meals-showcase clearfix">
            <li>
            <figure  class="meal-photo">
                <img src="./public/images/5.jpg">
                </figure>
            </li>
            <li>
            <figure  class="meal-photo">
                <img src="./public/images/6.jpg">
                </figure>
            </li>
            <li>
            <figure  class="meal-photo">
                <img src="./public/images/7.jpg">
                </figure>
            </li>
            <li>
            <figure  class="meal-photo">
                <img src="./public/images/8.jpg">
                </figure>
            </li>
            </ul>
        </section>
        <section class="section-steps" id="how">
            <div class="row">
            <h2>How it works &mdash;Simple as 1, 2, 3</h2>
                </div>
            <div class="row">
            <div class="col span-1-of-2 step-box">
            <img src="./public/images/app-iPhone.png" class="app-screen js--wp-4">    
            
            </div>
        <div class="col span-1-of-2  step-box">
            <div class="work-step">
            <div>1</div>
                <p>Choose the subscription plan that best fits your needs and sign up today.
</p>
            </div>
            <div class="work-step">
            <div>2</div>
                <p>Order your delicious meal using our mobile app or website. Or you can even call us!
</p>
            </div>
            <div class="work-step">
            <div>3</div>
                <p>Enjoy your meal after less than 20 minutes. See you the next time!
</p>
            </div>
            <a href="#" class="btn-app"><img src="./public/images/download-app.svg" alt="app store btn"></a> 
            <a href="#" class="btn-app"><img src="./public/images/download-app-android.png" alt="play store btn"></a>
            
            </div>
            </div>
         </section>
        <section class="section-cities" id="cities">
            <div class="row">
            <h2> We're currently in these cities</h2>
            </div>
            <div class="row js--wp-3">
            <div class="col span-1-of-4 box">
                <img src="./public/images/agra1.jpg" alt="Agra">
                <h3>Agra</h3>
                <div class="city-features">
                    <div class="cities-icon">
                <i class="ion-ios-person"></i>
                        </div>
                1600+ happy eaters
                </div>
                <div class="city-features">
                     <div class="cities-icon">
                <i class="ion-ios-star"></i>
                    </div>
               60+ top chefs
                </div>
                <div class="city-features">
                     <div class="cities-icon">
                <i class="ion-social-twitter"></i>
                    </div>
                    <a href="#"> @food_agra</a>
                </div>
                </div>
                <div class="col span-1-of-4 box">
                <img src="./public/images/new-delhi.jpg" alt="New-delhi" style="height:auto;">
                <h3>New Delhi</h3>
               <div class="city-features">
                    <div class="cities-icon">
                <i class="ion-ios-person"></i>
                        </div>
                3700+ happy eaters
                </div>
                <div class="city-features">
                     <div class="cities-icon">
                <i class="ion-ios-star"></i>
                    </div>
               160+ top chefs
                </div>
                <div class="city-features"> <div class="cities-icon">
                <i class="ion-social-twitter"></i>
                    </div>
              <a href="#"> @food_newdelhi</a> 
                </div>
                </div>
                <div class="col span-1-of-4 box">
                <img src="./public/images/hyderabad.jpg" alt="libson">
                <h3>Hyderabad</h3>
            <div class="city-features">
                    <div class="cities-icon">
                <i class="ion-ios-person"></i>
                        </div>
                2300+ happy eaters
                </div>
                <div class="city-features">
                     <div class="cities-icon">
                <i class="ion-ios-star"></i>
                    </div>
               110+ top chefs
                </div>
                <div class="city-features">
                     <div class="cities-icon">
                <i class="ion-social-twitter"></i>
                    </div>
                <a href="#">@food_hyderabad</a>
                </div>
                </div>
                 <div class="col span-1-of-4 box">
                <img src="./public/images/jaipur.jpg" alt="jaipur">
                <h3>Jaipur</h3>
                <div class="city-features">
                    <div class="cities-icon">
                <i class="ion-ios-person"></i>
                        </div>
                1200+ happy eaters
                </div>
                <div class="city-features">
                     <div class="cities-icon">
                <i class="ion-ios-star"></i>
                    </div>
               50+ top chefs
                </div>
                <div class="city-features">
                     <div class="cities-icon">
                <i class="ion-social-twitter"></i>
                    </div>
                <a href="#">@food_jaipur</a>
                </div>
                </div>
            </div>
        </section>
        <section class="section-testimonials">
        <div class="row">
            <h2>Our customers can't live without us</h2>
            </div>
            <div class="row">
            <div class="col span-1-of-3">
                <blockquote>Omnifood is just awesome! I just launched a startup which leaves me with no time for cooking, so Omnifood is a life-saver. Now that I got used to it, I couldn't live without my daily meals!
                    <cite><img src="./public/images/customer-1.jpg">Alberto Duncan</cite>
                </blockquote>
                </div>
            <div class="col span-1-of-3">
                <blockquote>Inexpensive, healthy and great-tasting meals, delivered right to my home. We have lots of food delivery here in Lisbon, but no one comes even close to Omifood. Me and my family are so in love!                    <cite><img src="./public/images/customer-2.jpg">Joana Silva</cite>
                </blockquote>
                </div>
                 <div class="col span-1-of-3">
                <blockquote>I was looking for a quick and easy food delivery service in San Franciso. I tried a lot of them and ended up with Omnifood. Best food delivery service in the Bay Area. Keep up the great work!
                    <cite><img src="./public/images/customer-3.jpg">Milton Chapman</cite>
                </blockquote>
                </div>
            </div>
        </section>
        
        <section class="section-form">
        <div class="row">
            <h2>We're happy to hear from you</h2></div>
            <div class="row">
            <form method="post" action="#" class="contact-form">
                <div class="row">
                <div  class="col span-1-of-3">
                  <label>Name</label>  
                    </div>
                <div class="col span-2-of-3">
                    <input type="text" name="name" id="name" placeholder="Your Name" required>               
                    </div>
                    </div>
                <div class="row">
                     <div  class="col span-1-of-3">
                  <label>Email</label>  
                    </div>
                <div class="col span-2-of-3">
                    <input type="text" name="email" id="email" placeholder="Your Email Id" required>               
                    </div>
                    </div>
                <div class="row">
                     <div  class="col span-1-of-3">
                  <label>How did you find us?</label>  
                    </div>
                <div class="col span-2-of-3">
                <select name="find-us" id="find-us">
                    <option value="friends">Friends</option>
                    <option value="search" selected>Search-Engine</option>
                    <option value="Ad">Advetisement</option>
                    <option value="Other">Others</option>
                    </select>            
                    </div>
                    </div>
                    
                    <div class="row">
                <div  class="col span-1-of-3">
                  <label>Newsletter?</label>  
                    </div>
                <div class="col span-2-of-3">
                    <input type="checkbox" name="news" id="news"  checked >Yes,Please               
                    </div>
                    </div>
                 <div class="row">
                <div  class="col span-1-of-3">
                  <label>Drop us a line</label>  
                    </div>
                <div class="col span-2-of-3">
                   <textarea name="message" placeholder="Your Message"></textarea>
                    </div>
                    </div>
                 <div class="row">
                <div  class="col span-1-of-3">
                  <label>&nbsp;</label>  
                    </div>
                <div class="col span-2-of-3">
                    <input type="submit" value="Send, it!" >               
                    </div>
                    </div>
                </form>
            </div>
        </section>
<?php 
		include("footer.php");
		?>
           </body> 
   
    </head>
</html>