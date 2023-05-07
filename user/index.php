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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Happy Meal!</title>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <script src="https://kit.fontawesome.com/8aa5cbb25f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("header.php")?>    
    
    <!-- hero section -->
    <section class="text-gray-600 body-font flex justify-center items-center">
      <div class="container flex md:flex-row flex-col items-center p-5 m-5 bg-white shadow-2xl rounded-lg">
        <div class=" md:w-1/2 w-5/6 md:mb-0 lg:w-1/2 flex justify-center">
          <!-- <img class="object-cover object-center rounded" alt="hero" src="https://img.freepik.com/premium-vector/young-woman-cooking-kitchen_73637-545.jpg?w=2000" width="60%"> -->
          <img class="object-cover object-center rounded" alt="hero" src="../images/herosection.jpg" width="70%">          
          <!-- <img class="object-cover object-center rounded" alt="hero" src="images/herosection.gif" width="70%">           -->
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Enjoy Home-like food,  
            <br class="hidden lg:inline-block">By just a CLICK..
          </h1>
          <p class="mb-8 leading-relaxed">Every meal is an experience to be savored and every recipe is a story waiting to be told !!!</p>
          <div class="flex justify-center">
            <a class="inline-flex text-white bg-[#EB9901] border-0 py-2 px-6 focus:outline-none rounded text-lg" href="providerList.php">Let's Order</a>
            <!-- <button class="ml-4 inline-flex text-white bg-[#EB9901] border-0 py-2 px-6 focus:outline-none rounded text-lg">Button</button> -->
          </div>
        </div>
      </div>
    </section>

    <!-- gallery -->
    <section class="py-6">
      <div class="container flex flex-col justify-center p-4 mx-auto">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 sm:grid-cols-2">
          <img class="object-cover w-full dark:bg-gray-500 aspect-square" src="https://t4.ftcdn.net/jpg/02/75/39/13/360_F_275391367_Hro3Ql1iFsCNtd86zWYuqa0Qe5cc7goE.jpg">
          <img class="object-cover w-full dark:bg-gray-500 aspect-square" src="https://t4.ftcdn.net/jpg/03/09/11/75/360_F_309117524_w5boCHE0hfVVfbT3TccStjShZ9EDyKvk.jpg">
          <img class="object-cover w-full dark:bg-gray-500 aspect-square" src="https://media.istockphoto.com/id/495185782/photo/indian-pulav-vegetable-rice-veg-biryani-basmati-rice.jpg?s=612x612&w=0&k=20&c=q4quybb8UpleJWZ89iLLp9RrvaRnEwrKp-GSuSav49g=">
          <img class="object-cover w-full dark:bg-gray-500 aspect-square" src="https://media.istockphoto.com/id/1292563627/photo/assorted-south-indian-breakfast-foods-on-wooden-background-ghee-dosa-uttappam-medhu-vada.jpg?s=612x612&w=0&k=20&c=HvuYT3RiWj5YsvP2_pJrSWIcZUXhnTKqjKhdN3j_SgY=">
        </div>
      </div>
    </section>

    <!-- steps to order food -->
    <section class="p-6">
      <div class="container mx-auto">
        <span class="block mb-2 text-xs font-medium tracking-widest text-center uppercase text-[#EB9901]">How it works</span>
        <h2 class="text-5xl font-bold text-center text-black">Simple to order </h2>
        <div class="grid gap-6 my-16 lg:grid-cols-3">
          <div class="flex flex-col p-8 space-y-4 rounded-md bg-[#EB9901]">
            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-xl font-bold rounded-full bg-black text-white">1</div>
            <p class="text-2xl font-bold text-white">
              Choose your Tiffin Provider              
            </p>
          </div>
          <div class="flex flex-col p-8 space-y-4 rounded-md bg-[#EB9901]">
            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-xl font-bold rounded-full bg-black text-white">2</div>
            <p class="text-2xl font-bold text-white">
              Select your Combination and Dates of Subscription
            </p>
          </div>
          <div class="flex flex-col p-8 space-y-4 rounded-md bg-[#EB9901]">
            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-xl font-bold rounded-full bg-black text-white">3</div>
            <p class="text-2xl font-bold text-white">
              Make Payment and Enjoy Your Meal!
            </p>
          </div>
        </div>
      </div>
    </section>

    <?php include("footer.php"); ?>    
</body>
</html>
