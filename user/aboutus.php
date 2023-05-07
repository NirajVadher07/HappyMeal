<?php
  session_start();
  include("connection.php");
  include("function.php");

  $user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <script src="https://kit.fontawesome.com/8aa5cbb25f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="flex flex-row justify-center items-center p-[20px] m-2 bg-white shadow-2xl rounded-lg flex-wrap">
      <div class="flex justify-center w-1/3">
        <!-- image -->
        <img src="..\images\1.jpg" alt="aboutus" width="80%">
      </div>
      <div class=" w-2/3 text-lg font-semibold bg-white">
        <div class="p-2 m-2 text-justify">
          Welcome to Happymeal, the go-to destination for delicious and healthy home-cooked food! Our passion for food and the desire to provide people with wholesome, tasty meals led to the inception of Happymeal in 2020.
        </div>
        <div class="p-2 m-2 text-justify">
          Since our establishment, we have been committed to serving nutritious and hygienic food to our customers. With more than 3 years of experience in the industry, we have mastered the art of cooking and delivering food that not only satiates your hunger but also makes you happy.
        </div>    
        <div class="p-2 m-2 text-justify">
          We understand the importance of home-cooked food and its impact on our overall health and wellbeing. Therefore, we ensure that our meals are prepared using the freshest ingredients, without compromising on taste or quality. Our team of expert chefs curates a menu that caters to a diverse range of tastes and dietary preferences.
        </div>
        <div class="p-2 m-2 text-justify">
          At Happymeal, we believe that good food should be accessible to everyone. That's why we offer affordable meal plans that are tailored to meet your specific needs. Whether you're a busy professional, a student, or a family, we have something for everyone.        
        </div>
        <div class="p-2 m-2 text-justify">
          Our commitment to excellence has earned us a loyal customer base who trust us to deliver delicious, healthy meals to their doorstep. We are proud to have served thousands of customers over the years, and we continue to strive for excellence in everything we do.
        </div>    
        <div class="p-2 m-2 text-justify">
          Thank you for choosing Happymeal. We look forward to serving you and making your mealtime happy and healthy!
        </div>
      </div>
      <div class="w-full m-5 p-2 flex flex-row">
        <div class="w-1/2">
          <div class="flex flex-col justify-evenly-items-center font-semibold text-lg">
            <div class="p-2 m-2 text-justify">
            Certainly! Happymeal is a Rajkot-based startup that is proud to call Gujarat its home. We are a team of passionate food enthusiasts who are dedicated to bringing the joy of home-cooked food to people in Rajkot and beyond.
            </div>
            <div class="p-2 m-2 text-justify">
            Rajkot is a city with a rich cultural heritage and a vibrant food scene. At Happymeal, we draw inspiration from the city's diverse culinary traditions and incorporate them into our menu. Our aim is to offer a taste of Rajkot's culinary delights to people across India.
            </div>
            <div class="p-2 m-2 text-justify">
            As a startup, we understand the challenges that come with building a business from scratch. We are committed to supporting other startups and small businesses in Rajkot by sourcing our ingredients locally and collaborating with local suppliers.
            </div>
            <div class="p-2 m-2 text-justify">
            At Happymeal, we believe in giving back to the community. That's why we partner with local NGOs and charities to provide free meals to underprivileged communities in Rajkot. We also prioritize sustainability and are constantly exploring ways to reduce our carbon footprint and minimize waste.
            </div>
            <div class="p-2 m-2 text-justify">
            We are proud to be a Rajkot-based startup and are committed to contributing to the city's growth and development. Our goal is to become a leading name in the food industry and make Rajkot a hub for healthy and delicious home-cooked food.
            </div>
            <div class="p-2 m-2 text-justify">
            Thank you for choosing Happymeal, and we look forward to serving you!
            </div>
          </div>
        </div>
        <div class="w-1/2 flex flex-col justify-center items-center">
          <img src="..\images\2.jpg" alt="aboutus" width="70%" class="mb-5">
          <img src="..\images\3.jpg" alt="aboutus" width="70%">
        </div>
      </div>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>