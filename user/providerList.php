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
    <title>Tiffin Provider List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <script src="https://kit.fontawesome.com/8aa5cbb25f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("header.php"); ?>

    
    <div class="flex flex-wrap justify-evenly items-center p-5">
    <?php 
        $con = mysqli_connect("localhost","root","","happymeal");

        $query = "SELECT * FROM `tiffinproviders`";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
                $ID =  $row['ProviderID'];   
    ?>
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:min-w-[40%] m-2">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                    <?php $imagenumber = rand(3,14);?>
                    <img class="h-full w-full object-cover md:w-48" src="..\images\<?php echo $imagenumber?>.jpg" alt="<?php echo $imagenumber?>">
                    </div>
                    <div class="p-8">                    
                    <a href="providerdetails.php?ProviderID=<?php echo $ID?>" class="block mt-1 text-xl leading-tight font-medium font-bold text-black hover:underline"><?= $row['Name']?></a>
                    <p class="mt-2 text-gray-500"><?= $row['Email']?></p>
                    <p class="mt-2 text-blue-500">+91 <?= $row['Phone']?></p>      
                    <p class="mt-2 text-gray-500"><?= $row['Address']?></p>      
                    <p class="mt-2 text-gray-500"><?= $row['City']?></p>      
                    <p class="mt-2 text-gray-500"><?= $row['ProviderID']?></p>      
                    <p class="mt-2 text-gray-500">
                    <i class="fa-solid fa-star fa-lg" style="color: #eb9903;"></i>  <?= $row['Rating']?>
                    </p>      
                    </div>
                </div>
            </div>  
    <?php
            }
        }
        else
        {
    ?>
        <div>
            No record Found!!
        </div>
    <?php
        }
    ?>
          
    </div>    

    <?php include("footer.php"); ?>
</body>
</html>