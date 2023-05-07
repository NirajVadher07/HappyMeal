<?php
  session_start();
  include("connection.php");
  include("function.php");

  $admin_data = check_login($con);
?>

<?php
    $flag = FALSE;
    if($_SERVER['REQUEST_METHOD'] == "POST" ){
        $providerid = $_POST['providerid'];
        $tiffinname = $_POST['tiffinname'];
        $description = $_POST['description'];        
        $price = $_POST['price'];        

        if( !empty($providerid) && !empty($tiffinname) && !empty($description) && !empty($price) && is_numeric($providerid) && is_numeric($price)){
            //save to database            
            $query = "INSERT INTO `tiffins`(`ProviderID`, `TiffinName`, `Description`, `Price`) VALUES ('$providerid','$tiffinname','$description','$price')";
            mysqli_query($con, $query);
            $flag = TRUE;            
        }
        else{
            echo "Please enter some valid information";
        }
    }
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
<body class="h-full">
    <div class="flex flex-col justify-center items-center h-[100vh]">          
        <?php if($flag == TRUE){?>
        <div class="bg-green-100 border mb-5 border-green-400 text-green-700 px-4 py-3 w-[50%] rounded relative" role="alert">
            <strong class="font-bold">Done!!!</strong>
            <span class="block sm:inline">Added Tiffin</span>                            
        </div>
        <?php }?>
        <div class="border-1 w-[75vw] rounded-lg shadow-2xl">
            <div class="flex justify-end">
                <a href="index.php" class="flex w-[5%] p-[2px] m-2 justify-center rounded-md bg-[#EB9901] text-xs font-semibold text-white">Back</a>
            </div>      
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-40 w-auto" src="..\images\logo.png" alt="Your Company">
                <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Add Tiffin</h2>
            </div>
            <div class="mt-2 w-full mb-2">                
                <form  action="#" method="POST" class="flex justify-around items-center flex-wrap">
                    <div class="w-1/3 m-2 flex justify-between items-center">
                        <label for="name" class="block text-xl font-medium leading-6 text-gray-900">Provider Name</label>
                        <div class="mt-2 w-1/2">
                            <select name="providerid" id="providerid" class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                                <?php
                                    $localhost="localhost";
                                    $username="root";
                                    $pass='';
                                    $database='happymeal';
                                    $con=mysqli_connect("localhost","root","","happymeal");
                                    $query = "SELECT * FROM `tiffinproviders`";
                                    $providers=mysqli_query($con,$query);
                                    while($c=mysqli_fetch_array($providers)){
                                        echo '<option value="';
                                        echo $c["ProviderID"];
                                        echo '">';
                                        echo $c["Name"];
                                        echo '</option>';
                                    }
                                ?>                        
                            </select>
                        </div>
                    </div>
                    <div class="w-1/3 m-2 flex justify-between items-center">
                        <label for="tiffinname" class="block text-xl font-medium leading-6 text-gray-900">Tiffin Name</label>
                        <div class="mt-2 w-1/2">
                        <input id="tiffinname" name="tiffinname" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2 flex justify-between items-center">
                        <label for="description" class="block text-xl font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2 w-1/2">
                        <input id="description" name="description" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>                    
                    <div class="w-1/3 m-2 flex justify-between items-center">
                        <label for="price" class="block text-xl font-medium leading-6 text-gray-900">Price</label>
                        <div class="mt-2 w-1/2">
                        <input id="price" name="price" type="number" step="0.01" min="0.01" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>                    
                    <div class="w-2/3 m-2 mt-5 flex justify-center items-center">
                        <button type="submit" class="flex w-1/3 justify-center rounded-md bg-[#EB9901] px-3 py-1.5 text-xl font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Tiffin</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>

</body>
</html>
