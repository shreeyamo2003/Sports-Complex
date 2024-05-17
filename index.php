<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Web Design Mastery | Power</title>
  </head>
  <body>
    <header class="header">
      <nav>
        <div class="nav__header">
          <div class="nav__logo">
            <a href="#"><img src="logo.png" alt="logo" />Sports Center</a>
          </div>
          <div class="nav__menu__btn" id="menu-btn">
            <span><i class="ri-menu-line"></i></span>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li class="link"><a href="#home">Home</a></li>
          <li class="link"><a href="#about">About</a></li>
          <li class="link"><a href="#class">Sports Info</a></li>
          <li class="link"><a href="#trainer">Competitions</a></li>
          <li class="link"><button class="btn"><a href="#contact">Contact Us</a></button></li>
        </ul>
      </nav>
      <div class="section__container header__container" id="home">
        <div class="header__image">
          <img src="header.png" alt="header" />
        </div>
        <div class="header__content">
          <h4>Elevate Your Game</h4>
          <h1 class="section__header">Define Your Success!</h1>
          <p>
            Join our premier program today and take the first step towards unlocking your body's full potential. With our cutting-edge facilities and expert guidance, you'll embark on a transformative journey towards a stronger, fitter, and more confident version of yourself. Don't miss out on the opportunity to witness the incredible changes your body is capable of – sign up now!
          </p>
          <div class="header__btn">
            <button class="btn" onclick="func()">Join Today</button>
          </div>
        </div>
      </div>
    </header>

    <section class="section__container about__container" id="about">
      <div class="about__image">
        <img class="about__bg" src="assets/dot-bg.png" alt="bg" />
        <img src="about.png" alt="about" />
      </div>
      <div class="about__content">
        <h2 class="section__header">About</h2>
        <p class="section__description">
          Led by our team of expert and motivational instructors, "The Class You
          Will Get Here" is a high-energy, results-driven session that combines
          a perfect blend of cardio, strength training, and functional
          exercises.
        </p>
        <div class="about__grid">
          <div class="about__card">
            <span><i class="ri-open-arm-line"></i></span>
            <div>
              <h4>Open Door Policy</h4>
              <p>
                We believe in providing unrestricted access to all individuals,
                regardless of their fitness level, age, or background.
              </p>
            </div>
          </div>
          <div class="about__card">
            <span><i class="ri-shield-cross-line"></i></span>
            <div>
              <h4>Fully Insured</h4>
              <p>
                Your peace of mind is our top priority, and our commitment to
                your safety extends to every aspect of your fitness journey.
              </p>
            </div>
          </div>
          <div class="about__card">
            <span><i class="ri-p2p-line"></i></span>
            <div>
              <h4>Personal Trainer</h4>
              <p>
                At our sports facility, we offer personalized training designed just for you. From custom workout plans to specialized coaching, we're dedicated to helping you succeed in reaching your fitness goals.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container class__container" id="class">
      <h2 class="section__header">Sports Info</h2>
      <p class="section__description">
        Explore a wide variety of exhilarating classes at our sports facility, tailored to accommodate all levels of athleticism and interests. Whether you're a seasoned athlete or new to your fitness journey, our diverse range of classes ensures there's something for everyone.
      </p>
      <div class="class__grid">
        <div class="class__card">
          <img src="indoor.png" alt="class" height="200px" />
          <div class="class__content">
            <h4>Indoor Games</h4>
            <h3><button class="btn" onclick="func2()">Join</button></h3>

          </div>
        </div>
        <div class="class__card">
          <img src="outdoor.png" alt="class" height="200px" />
          <div class="class__content">
            <h4>Outdoor Games</h4>
            <h3><button class="btn" onclick="func3()">Join</button></h3>
          </div>
        </div>
        <div class="class__card">
          <img src="fitness.png" alt="class" height="200px"/>
          <div class="class__content">
            <h4>Fitness</h4>
            <h3><button class="btn" onclick="func4()">Join</button></h3>
          </div>
        </div>
        <div class="class__card">
          <img src="competitive.png" alt="class" height="200px"/>
          <div class="class__content">
            <h4>Competitive Games</h4>
            <h3><button class="btn" onclick="func5()">Join</button></h3>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container trainer__container" id="trainer">
      <h2 class="section__header">Competitions</h2>
      <p class="section__description">
        Engage in thrilling competitions at our sports facility, where the spirit of competition fuels excitement and camaraderie. From friendly matches to intense tournaments, our events cater to athletes of all levels and disciplines. Whether you're vying for victory or simply seeking the thrill of the game, our competitions provide a platform for athletes to showcase their skills and passion for sport.
      </p>

      <main>
        <table class="data-table">
            <caption>Table for Competitions</caption>
            <thead>
                <tr>
                    <th>Competition name</th>
                    <th>Event name</th>
                    <th>Date</th>
                    <th>Fees</th>
  
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sports complex";
        
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
        
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
        
                // Fetch data from database
                $sql = "SELECT * FROM competitions";
                $result = $conn->query($sql);
        
                // Display data in table format
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["comp_name"] . "</td>";
                        echo "<td>" . $row["event_name"] . "</td>";
                        echo "<td>" . $row["date1"] . "</td>";
                        echo "<td>" . $row["fees"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No data found</td></tr>";
                }
        
                

                $conn->close();
                ?>
            </tbody>
        </table>
              </main>
              <h3><button class="btn" onclick="func13()">Register</button></h3>
           
    </section>



 

    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="footer__logo">
            <a href="#"><img src="logo.png" alt="logo" />Sports Center</a>
          </div>
          <p>
            Take the first step towards a healthier, stronger you with our
            unbeatable pricing plans. Let's sweat, achieve, and conquer
            together!
          </p>
          <div class="footer__socials">
            <a href="#"><i class="ri-facebook-fill"></i></a>
            <a href="#"><i class="ri-instagram-line"></i></a>
            <a href="#"><i class="ri-twitter-fill"></i></a>
          </div>
        </div>
        
        <div class="footer__col">
          <h4>About Us</h4>
          <div class="footer__links">
            <a href="#">Blogs</a>
            <a href="#">Security</a>
            <a href="#">Careers</a>
          </div>
        </div>
        <div class="footer__col" id="contact">
          <h4>Contact</h4>
          <div class="footer__links">
            <a href="#">Contact Us</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            
          </div>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2023 Web Design Mastery. All rights reserved.
      </div>
    </footer>
    <script>
      function func(){
          window.location.href="index2.html";
          return false;
        }
        
     function func2(){
        window.location.href="indoorgames.html";
    }
    function func3(){
        window.location.href="outdoor.html";
    }
    function func4(){
        window.location.href="fitness.html";
    }
    function func5(){
        window.location.href="competitive.html";
    }
    function func13(){
        window.location.href="http://localhost/dbs-main/signup_registration.php";
    }

      
    </script>
      
  

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>