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
    <title>Order</title>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/8aa5cbb25f.js" crossorigin="anonymous"></script>
</head>
<body>



    <?php
        $Providerid =  intval($_GET['ProviderID']);
        $tiffinid = intval($_GET['TiffinID']);
        $customerid = intval($user_data['CustomerID']);
        $fullname = $user_data['FirstName']." ".$user_data['LastName'];
        $cardnumber = "";
        for ($i=0; $i < 4; $i++) { 
            $n = rand(1000, 9999);            
            $cardnumber .= $n;            
        }
        $cvv = rand(100,999);
        
        $con = mysqli_connect("localhost","root","","happymeal");        
        $query = "SELECT Price FROM tiffins WHERE TiffinID = $tiffinid";
        $query_run = mysqli_query($con, $query);
        $totalamount = 0;
        if(mysqli_num_rows($query_run) > 0)
        {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $totalamount = $row['Price'] ;                
            }
        }
        
        $currentDate= date('d-m-Y', strtotime('+1 day'));
        $endDate = date('d-m-Y', strtotime('+30 days', strtotime($currentDate)));

        $random = rand(3,10);
        $randommonth = rand(1,12);
        $expiryDate =  date('m/Y', strtotime($randommonth." months ".$random." years" , strtotime($currentDate)));

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $con = mysqli_connect("localhost","root","","happymeal");        
            $query = "INSERT INTO `orders` (CustomerID, TiffinID, OrderDate, LastDate, TotalAmount) 
          VALUES ('$customerid', '$tiffinid', '$currentDate', '$endDate', '$totalamount')";

            $query_run = mysqli_query($con, $query);
            header("Location: thankyou.php");
        }
?>
    
    <div class="flex justify-center items-center min-h-screen bg-blue-300">
        <div class="h-auto w-[400px] bg-white p-5 rounded-lg shadow-2xl">
            <div class="flex justify-end">
                <a href="providerdetails.php?ProviderID=<?php echo $Providerid?>" class="flex w-[10%] p-[2px] justify-center rounded-md bg-[#EB9901] text-xs font-semibold text-white">Back</a>
            </div>
            <form action="#" method="POST">
                <p class="text-2xl font-semibold">Payment Details</p>
                <div class="input_text mt-6 relative"> 
                    <input type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " value="<?php echo $fullname;?>" /> <span class="absolute left-0 text-sm -top-4">Cardholder Name</span> <i class="absolute left-2 top-4 text-gray-400 fa fa-user"></i> 
                </div>
                <div class="input_text mt-8 relative"> <input type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " value=<?php echo $cardnumber ?> data-slots="0" data-accept="\d" size="19" /> <span class="absolute left-0 text-sm -top-4">Card Number</span> <i class="absolute left-2 top-[14px] text-gray-400 text-sm fa fa-credit-card"></i> </div>
                <div class="mt-8 flex gap-5 ">
                    <div class="input_text relative w-full"> <input type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " value="<?php echo $expiryDate?>" placeholder="mm/yyyy" data-slots="my" /> <span class="absolute left-0 text-sm -top-4">Expiry</span> <i class="absolute left-2 top-4 text-gray-400 fa fa-calendar-o"></i> </div>
                    <div class="input_text relative w-full"> <input type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " value="<?php echo  $cvv?>" placeholder="000" data-slots="0" data-accept="\d" size="3" /> <span class="absolute left-0 text-sm -top-4">CVV</span> <i class="absolute left-2 top-4 text-gray-400 fa fa-lock"></i> </div>
                </div>
                <p class="text-lg text-center mt-4 text-gray-600 font-semibold">
                    Payment amount:  <?php echo $totalamount?>
                </p>            
                <div class="flex justify-center mt-4"> 
                    <button class="outline-none pay h-12 bg-[#fab93e]  text-white mb-3 hover:bg-[#EB9901] rounded-lg w-1/2 cursor-pointer transition-all text-xl font-bold">Pay</button> 
                </div>
            </form>
        </div>
    </div>
</body>
</html>