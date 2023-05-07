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
    <title>Tiffin Provider Details</title>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/8aa5cbb25f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("header.php"); ?>

<!-- Display of Tiffin Provider  -->
    <div class="flex flex-wrap justify-evenly items-center p-5 min-h-[80vh] shadow-2xl bg-gradient-to-r from-[#FF9F4A] to-[#FF3C83] rounded-lg m-2">
        <?php 
            $con = mysqli_connect("localhost","root","","happymeal");
            $ID  = intval($_GET['ProviderID']);                
            $query = "SELECT * FROM tiffinproviders WHERE ProviderID=".$ID;
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $row)
                {
        ?>
                <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:min-w-[70%] m-2">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0 w-1/2">
                        <?php $imagenumber = rand(3,14);?>
                            <img class="h-full w-full object-cover" src="..\images\<?php echo $imagenumber;?>.jpg" alt="<?php echo $imagenumber?>">
                        </div>
                        <div class="p-8 flex flex-col justify-center w-1/2">                    
                        <p class="block mt-1 text-5xl leading-tight text-black font-bold"><?= $row['Name']?></p>
                        <p class="mt-2 text-gray-500 text-lg"><?= $row['Email']?></p>
                        <p class="mt-2 text-blue-500 text-lg">+91 <?= $row['Phone']?></p>      
                        <p class="mt-2 text-gray-500 text-lg"><?= $row['Address']?></p>      
                        <p class="mt-2 text-gray-500 text-lg"><?= $row['City']?></p>      
                        <p class="mt-2 text-gray-500 text-lg">
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
            <div class="text-2xl font-bold italic">
                <i class="fa-solid fa-circle-xmark fa-xl" style="color: #eb9901;"></i>
                No Tiffin Found!!
            </div>
        <?php
            }
        ?>
            
    </div>    

    <div class="w-full text-5xl font-bold italic border-t flex justify-center items-center p-10 mt-20">
            Combos
    </div>
<!-- Combination -->
<div class="flex flex-wrap mt-10 mb-10 border-b pb-5">
    <?php 
        $con = mysqli_connect("localhost","root","","happymeal");
        $ID  = intval($_GET['ProviderID']);                
        $query = "SELECT * FROM tiffins WHERE ProviderID=".$ID;
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
                $tiffinID = intval($row['TiffinID']);
    ?>
                <div class="p-4 xl:w-1/3 md:w-1/2 w-full">
                    <div class="h-full p-6 rounded-lg shadow-2xl bg-white flex flex-col relative overflow-hidden">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium"><?=$row['TiffinName']?></h2>
                        <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-600 leading-none"><?= $row['Price']?></h1>
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium">30 Days</h2>
                        <p class="flex items-center text-gray-600 mb-2 text-justify">
                            <?= $row['Description']?>
                        </p>
                        <a class="flex items-center mt-auto text-white bg-[#fab93e] border-0 py-2 px-4 w-full focus:outline-none hover:bg-[#EB9901] rounded cursor-pointer" href="order.php?ProviderID=<?php echo $ID?>&TiffinID=<?php echo $tiffinID?>">Subcribe
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>          
                    </div>
                </div>
        <?php
            }
        }
        else
        {
    ?>
            <div class="text-2xl font-bold italic w-full flex justify-center">
                <i class="fa-solid fa-circle-xmark fa-lg flex items-center p-2" style="color: #eb9901;"></i>
                No record Found!!
            </div>
    <?php
        }
    ?>
</div>
<?php include("footer.php"); ?>
</body>
</html>