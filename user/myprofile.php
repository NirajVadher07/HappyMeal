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
    <title>Hii! <?php echo $user_data['FirstName']." ".$user_data['LastName'];?></title>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/8aa5cbb25f.js" crossorigin="anonymous"></script>    
</head>
<body>
    <?php include("header.php"); ?>
    <!-- profile -->
    <div class="flex p-5 m-2 min-h-[50vh]">
        <div class="h-[40vh] flex flex-col justify-center items center p-6 shadow-2xl rounded-xl sm:px-12 mr-10 w-1/4 ">
            <?php
                if($user_data['Gender'] == "Male"){ ?>
                    <img src="..\images\male.jpg" alt="" class="w-32 h-32 mx-auto rounded-full aspect-square border-2 border-black">
                <?php }
                else {?>
                    <img src="..\images\female.jpg" alt="" class="w-32 h-32 mx-auto rounded-full aspect-square border-2 border-black">
                <?php } ?>
            <div class="space-y-4 text-center divide-y divide-gray-700 flex">
                <div class="my-2 space-y-1 flex flex-col justify-center w-full">
                    <h2 class="text-xl font-semibold sm:text-2xl"> <?php echo $user_data['FirstName']." ".$user_data['LastName'];?></h2>
                    <p class="text-xs sm:text-base dark:text-gray-400"><?php echo $user_data['Email']?></p>
                    <p class="text-xs sm:text-base dark:text-gray-400"><?php echo $user_data['Phone']?></p>
                </div>                
            </div>
        </div>
        <div class="h-[40vh] flex flex-row justify-center items center p-2 shadow-2xl rounded-xl sm:px-12 w-3/4">
            <div class="w-1/2 border-black border-r p-5">
                <div>
                    <h1 class="text-2xl font-bold pb-5 flex justify-center">Address</h1>
                    <p class="italic text-lg"><?php echo $user_data['Address']?></p>
                    <p class="italic text-lg"><?php echo $user_data['City']?></p> 
                    <p class="italic text-lg"><?php echo $user_data['State']?></p>
                    <p class="italic text-lg"><?php echo $user_data['ZipCode']?></p>
                </div>
            </div>
            <div class="w-1/2 p-2 flex flex-col justify-evenly items-center">
                <a class="w-1/2 flex justify-center text-white bg-[#EB9901] border-0 py-2 px-6 focus:outline-none rounded text-lg" href="changepassword.php">Change Password</a>
                <a class="w-1/2 flex justify-center text-white bg-[#EB9901] border-0 py-2 px-6 focus:outline-none rounded text-lg" href="orderHistory.php">Order History</a>
                <a class="w-1/2 flex justify-center text-white bg-[#EB9901] border-0 py-2 px-6 focus:outline-none rounded text-lg" href="changeprofile.php">Change Profile</a>
            </div>
        </div>
    </div>    
    <?php include("footer.php"); ?>
</body>
</html>