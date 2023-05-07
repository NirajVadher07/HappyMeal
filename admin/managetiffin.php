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
    <title>Admin Section</title>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <script src="https://kit.fontawesome.com/8aa5cbb25f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("header.php")?>    
    <div class="w-full text-5xl font-bold italic flex justify-center">Tiffin</div>   
    <!-- order - history -->
    <div class="p-5 m-2">
        <div class="relative overflow-x-auto sm:rounded-lg m-2 border-[2px] w-full">
            <table class="w-full text-sm text-left text-black">
                <thead class="text-lg text-black uppercase bg-[#FDE68A]">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tiffin ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Provider Name
                        </th>                            
                        <th scope="col" class="px-6 py-3">
                            Tiffin Name
                        </th>          
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>           
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>                                                                                                                  
                    </tr>
                </thead>
                <tbody class="text-md font-semibold">
                    <?php                             
                        $localhost="localhost";
                        $username="root";
                        $pass='';
                        $database='happymeal';
                        $con=mysqli_connect("localhost","root","","happymeal");
                        $sql = "SELECT tiffins.TiffinID AS ID, tiffinproviders.Name AS ProviderName, tiffins.TiffinName, tiffins.Description, tiffins.Price 
                        FROM tiffins 
                        INNER JOIN tiffinproviders ON tiffins.ProviderID = tiffinproviders.ProviderID;
                        ";
                        $result = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">';
                                    echo $row['ID'];
                                echo '</th>
                                    <td class="px-6 py-4">';
                                        echo $row['ProviderName'];                                
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['TiffinName'];                           
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['Description']; 
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['Price'];                                
                            echo '</tr>';
                        }
                    ?>                        
                </tbody>
            </table>
        </div>        
    </div>
    <?php include("footer.php"); ?>    
</body>
</html>

