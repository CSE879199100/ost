 
 <!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Commobilespatible" content="ie=edge">
      <title>OnlineAutoMobileservices</title>
      <link rel="stylesheet" href="style.css">
      <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <style>

      li a,.dropbtn {
    display: block;
    color: #fff;
    text-align: center;
    padding: 20px 15px;
    text-decoration: none;
      opacity:1.0;
      font-size:15px;
      padding:0px;
}

li a:hover,.dropdown:hover.dropbtn {
    color: gray;
}
li.dropdown {
    display: inline-block;

}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 20px;    
    z-index: 1;
}

.dropdown-content a {
    color: black;
    
    text-decoration: none;
    display: block;
    text-align: left;
      font-size:15px;
      
}
.dropdown-content a:hover {
background-color:black;

}

.dropdown:hover .dropdown-content {
    display:block;
      
}
</style>
</head>

<body>
<?php
session_start(); 
?>
      <div class="wrapper">
            <header>

                  <nav>

                        <div class="menu-icon">
                              <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo">
                              AutoMobile Services
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    
                           <li class="dropdown"><a href="Locationsearch.php" class="dropbtn">Book Service</a>
                                    <div class="dropdown-content">
                                    <a href="fueldelivery.php">fuel delivery</a>
                                          
                                    <a href="services.php">automobile repair</a>
                                    </div>
                                    </li>
                                       
                            <!--        <li><a href="contact.php">Contact</a></li>-->
                                    <li><a href="index.html">Logout</a></li>
                              </ul>
                              <p class="wlcm">
                              		HI <?php echo $_SESSION['username'];?>
                              </p>
                        </div>
                  </nav>
                 

            </header>
 
            <div class="content">
                  <p>
                        

Online Automobile Services provides 24/7 onspot breakdown support & towing service anywhere in Bangalore within 30 Minutes. Our services includes Onspot flat tyre fixing for Tube & Tubeless puncture, stephny change, battery jumpstart, clutch cable replacements, acceleratory cable replacements, spark plug replacement, onspot minor repairs, emergency fuel delivery, bike flatbed towing, car flatbed towing, car safe-lift towing, car chain-lift towing. We support all the models for the brands like Audi, BMW, Benz, Landrover, Prosche, Honda, Hundai, Toyota, Mahindra, TATA, Jaguar, Nissan, Dustan, Maruti Suzuki, Ford, Harley Davidson, Ducati, KTM, Hero, Bajaj, Hyosung, Yahama, Royal Enfield, TVS, kawasaki, LML, Triumph, Indian Motorcycle, Aprilia, Suzuki Hayabuza, Intruder. Our services are available anywhere in Bangalore including Koramangala, Indiranagar, Yelankha, Peenya, Rajajinagar, Malleshwaram, CV Raman Nagar, Vasanth Nagar, MG Road, Ulsoor, Madiwala, Singasandara, Bomanahalli, Electronic city, Bannerghatta Road, NICE Road, BTM, Jayanagar, JP Nagar, Banashankari, Banaswadi, HRBR Layout, Kamanahalli, Kalyan Nagar, Nagawara, Manyata Tech Park, Hebbal, RT Nagar, EcoSpace, Belandur, CESNA Tech Park, RMZ Infinity, Domlur, EGL (Embassy Golf Link), Bagmanae Tech Park, Audugodi, Uttarahalli, Vijayanagar, Nagarbhavi, Sarjapur, Outring Road, Hosa Road, Whitefield, ITPL, Marthahalli, HAL, Old Airport Road, Jeevan Bhima Nagar, Tippasandara, Mahadevpura, KR Puram, Yeshwantpur, HSR Layout.

                  </p>
               
            </div>
      </div>

      <script type="text/javascript">

      // Menu-toggle button

      $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })


      </script>
      
</body>

</html>
