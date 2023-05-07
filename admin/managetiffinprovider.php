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
    <div class="w-full text-5xl font-bold italic flex justify-center">Tiffin Providers</div>   
    <!-- order - history -->
    <div class="p-5 m-2">
        <div class="relative overflow-x-auto sm:rounded-lg m-2 border-[2px] w-full">
            <table class="w-full text-sm text-left text-black">
                <thead class="text-lg text-black uppercase bg-[#FDE68A]">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>                            
                        <th scope="col" class="px-6 py-3">
                            Phone Number
                        </th>          
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>           
                        <th scope="col" class="px-6 py-3">
                            City
                        </th>        
                        <th scope="col" class="px-6 py-3">
                            State
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pin-Code
                        </th> 
                        <th scope="col" class="px-6 py-3">
                            Rating
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
                        $sql = "SELECT * FROM `tiffinproviders`";
                        $result = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">';
                                    echo $row['Name'];
                                echo '</th>
                                    <td class="px-6 py-4">';
                                        echo $row['Email'];                                
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['Phone'];                           
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['Address']; 
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['City']; 
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['State']; 
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['ZipCode']; 
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['Rating'];                                
                            echo '  </td>
                                </tr>';
                        }
                    ?>                        
                </tbody>
            </table>
        </div>        
    </div>
    <?php include("footer.php"); ?>    
</body>
</html>


