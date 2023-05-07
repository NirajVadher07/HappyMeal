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
    <div class="w-full text-5xl font-bold italic flex justify-center">Orders</div>   
    <!-- order - history -->
    <div class="p-5 m-2">
        <div class="relative overflow-x-auto sm:rounded-lg m-2 border-[2px] w-full">
            <table class="w-full text-sm text-left text-black">
                <thead class="text-lg text-black uppercase bg-[#FDE68A]">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            OrderID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Provider Name
                        </th>                            
                        <th scope="col" class="px-6 py-3">
                            Tiffin Name
                        </th>          
                        <th scope="col" class="px-6 py-3">
                            Ordered Date
                        </th>           
                        <th scope="col" class="px-6 py-3">
                            Last Date
                        </th>        
                        <th scope="col" class="px-6 py-3">
                            Total Amount
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
                        $sql = "SELECT o.OrderID AS ID, c.FirstName as FN, c.LastName as LN, tp.Name AS PN, t.TiffinName AS TN, o.OrderDate AS SD, o.LastDate AS LD, o.TotalAmount AS TA
                        FROM Orders o
                        INNER JOIN Tiffins t ON o.TiffinID = t.TiffinID
                        INNER JOIN TiffinProviders tp ON t.ProviderID = tp.ProviderID
                        INNER JOIN customers c ON c.CustomerID = o.CustomerID";
                        $result = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">';
                                    echo $row['ID'];
                                echo '</th>
                                    <td class="px-6 py-4">';
                                        echo $row['FN']." ".$row['LN']; 
                                echo '</th>
                                    <td class="px-6 py-4">';
                                        echo $row['PN'];                                
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['TN'];                           
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['SD']; 
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['LD']; 
                                echo '</td>
                                    <td class="px-6 py-4">';
                                        echo $row['TA']; 
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
