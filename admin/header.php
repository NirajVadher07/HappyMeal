<header class="p-4 ">
      <div class="container flex justify-between h-16 mx-auto">
        <a rel="noopener noreferrer" href="index.php" aria-label="Back to homepage" class="flex items-center p-2">
          <img class="mx-auto h-20 w-auto" src="..\images\logo.png" alt="Your Company">
          <img class="mx-auto h-20 w-auto" src="..\images\HappyMeal.png" alt="Your Company">
          <!-- <h1 class="text-3xl font-bold italic">Happy Meal!</h1> -->
        </a>
        <ul class="items-stretch hidden space-x-3 lg:flex">
          <li class="flex">
            <a rel="noopener noreferrer" href="manageuser.php" class="flex items-center px-2 -mb-1 hover:border-b-2 border-[#EB9901] text-lg font-semibold">Manage User</a>
          </li>
          <li class="flex">
            <a rel="noopener noreferrer" href="manageorder.php" class="flex items-center px-2 -mb-1 hover:border-b-2 border-[#EB9901] text-lg font-semibold">Manage Order</a>
          </li>
          <li class="flex">
            <a rel="noopener noreferrer" href="managetiffinprovider.php" class="flex items-center px-2 -mb-1 hover:border-b-2 border-[#EB9901] text-lg font-semibold">Manage Tiffin Provider</a>
          </li>          
          <li class="flex">
            <a rel="noopener noreferrer" href="managetiffin.php" class="flex items-center px-2 -mb-1 hover:border-b-2 border-[#EB9901] text-lg font-semibold">Manage Tiffin</a>
          </li>          
        </ul>
        <div class="items-center flex-shrink-0 hidden lg:flex">
          <a class="font-bold px-8 py-3 rounded-lg bg-[#EB9901] m-2 text-white flex justify-evenly items-center" href="#">            
            <div>
              Hello, <?php echo $admin_data['username'];?> 
            </div>
          </a>
          <button class="self-center font-bold px-8 py-3 rounded-lg bg-[#EB9901] m-2 text-white ">
            <a href="logout.php">Log Out</a>
          </button>
        </div>
        <button class="p-4 lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-black border-black-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
</header>