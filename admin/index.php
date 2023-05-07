<?php
  session_start();
  include("connection.php");
  include("function.php");

  $admin_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>    
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <title>Admin Section</title>
    <script src="https://kit.fontawesome.com/8aa5cbb25f.js" crossorigin="anonymous"></script>
</head>
<body>  
    <?php include("header.php");
    $localhost="localhost";
    $username="root";
    $pass='';
    $database='happymeal';
    $con=mysqli_connect("localhost","root","","happymeal");
    $sql = "SELECT COUNT(*) AS count FROM `customers`";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $CustomerCount = $row['count'];

    $sql = "SELECT COUNT(*) AS count FROM `orders`";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $OrderCount = $row['count'];

    $sql = "SELECT COUNT(*) AS count FROM `tiffinproviders`";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $ProviderCount = $row['count'];

    ?>    
    <div class="p-2 m-2 rounded-lg min-h-[47vh] flex justify-center items-center flex-wrap ">
      <div class="  w-1/4 m-2 flex justify-center items-center rounded-lg shadow-2xl bg-[#FDE68A] text-black min-h-[20vh]">
        <i class="fa-solid fa-user fa-2xl w-1/3 flex justify-center"></i>
        <h1 class="w-2/3 p-2 flex justify-evenly flex-col items-center text-3xl  font-bold">Users <span class="mt-2"><?php echo $CustomerCount?></span> </h1>
      </div>
      <div class="  w-1/4 m-2 flex justify-center items-center rounded-lg shadow-2xl bg-[#FDE68A] text-black min-h-[20vh]">
        <i class="fas fa-utensils fa-2xl w-1/3 flex justify-center"></i>
        <h1 class="w-2/3 p-2 flex justify-center flex-col items-center text-3xl  font-bold">Order <span class="mt-2"><?php echo $OrderCount?></span> </h1>
      </div>
      <div class="  w-1/4 m-2 flex justify-center items-center rounded-lg shadow-2xl bg-[#FDE68A] text-black min-h-[20vh]">      
        <i class="fa-solid fa-hotel fa-2xl w-1/3 flex justify-center"></i>
        <h1 class="w-2/3 p-2 flex justify-center flex-col items-center text-3xl  font-bold">Tiffin Providers <span class="mt-2"><?php echo $ProviderCount?></span> </h1>
      </div>

      <a href="addtiffin.php" class="  w-1/4 m-2 text-3xl font-bold flex justify-between items-center rounded-full shadow-2xl text-black bg-[#FDE68A] min-h-[10vh] cursor-pointer">      
        <i class="fa-sharp fa-solid fa-circle-plus fa-lg w-1/5 pl-5 "></i>
        <h1 class="w-4/5">
          Add Tiffins
        </h1>
      </a>
      <a href="addtiffinprovider.php" class="  w-1/4 m-2 text-3xl font-bold flex justify-between items-center rounded-full shadow-2xl text-black bg-[#FDE68A] min-h-[10vh] cursor-pointer">      
        <i class="fa-sharp fa-solid fa-circle-plus fa-lg w-1/5 pl-5"></i>
        <h1 class="w-4/5">
          Add Tiffin Provider
        </h1>
      </a>
    </div>
    <?php include("footer.php"); ?>    
</body>
</html>
