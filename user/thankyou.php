<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailwind CSS Thank You Page Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
  </head>

  <body>
    <div class="flex items-center justify-center h-screen">
      <div class="p-1 rounded shadow-lg bg-gradient-to-r from-purple-500 via-green-500 to-blue-500">
        <div class="flex flex-col items-center p-10 space-y-2 bg-white text-4xl">         
          <img src="../images/tick2.gif" alt="Your GIF" height="50%" width="50%" loop="1">
          <h1 class="text-4xl font-bold font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500">Thank You !</h1>
          <p class="p-5 font-bold italic text-center">Order Confirmed<br> Enjoy Your Home-like Meal</p>
          <div class="flex justify-center items-center">
            <a href="index.php"
              class="inline-flex items-center px-4 py-2 m-2 text-white bg-indigo-600 border border-indigo-600 rounded rounded-full hover:bg-indigo-700 focus:outline-none focus:ring">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
              </svg>
              <span class="text-xl font-medium">
                Home
              </span>
            </a>
            <a href="orderHistory.php"
              class="inline-flex items-center px-4 py-2 m-2 text-white bg-indigo-600 border border-indigo-600 rounded rounded-full hover:bg-indigo-700 focus:outline-none focus:ring">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
              </svg>
              <span class="text-xl font-medium">
                Order History
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>
