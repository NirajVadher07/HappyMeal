<?php
    session_start();
    include("connection.php");
    include("function.php");
    
  
    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];       
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];        
        
        //save to database            
        $query = "UPDATE `customers` SET `FirstName`='$firstname',`LastName`='$lastname',`Email`='$email',`Phone`='$phonenumber',`Address`='$address',`City`='$city',`State`='$state',`ZipCode`='$pincode' WHERE `CustomerID`='{$user_data['CustomerID']}'";
        mysqli_query($con, $query);
        header("Location: myprofile.php");    
    }               
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center items-center">
        <div class="border-1 w-[75vw] rounded-lg shadow-2xl">
            <div class="flex justify-end">
                <a href="myprofile.php" class="flex w-[5%] p-[2px] m-2 justify-center rounded-md bg-[#EB9901] text-xs font-semibold text-white">Back</a>
            </div>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">                
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update Profile</h2>
            </div>

            <div class="mt-10 w-full">
                <form  action="#" method="POST" class="flex justify-evenly items-center flex-wrap">
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                        <div class="mt-2">
                        <input id="firstname" name="firstname" type="text"  value="<?php echo $user_data['FirstName']?>" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                        <div class="mt-2">
                        <input id="lastname" name="lastname" type="text" value="<?php echo $user_data['LastName']?>" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email"  value="<?php echo $user_data['Email']?>" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                        <div class="mt-2">
                        <input id="phonenumber" name="phonenumber" type="text" value="<?php echo $user_data['Phone']?>" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>                
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                        <div class="mt-2">
                        <input id="address" name="address" type="text" required  value="<?php echo $user_data['Address']?>" class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                        <div class="mt-2">
                        <input id="city" name="city" type="text" required value="<?php echo $user_data['City']?>" class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">State</label>
                        <div class="mt-2">
                        <input id="state" name="state" type="text" required value="<?php echo $user_data['State']?>" class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Pin Code</label>
                        <div class="mt-2">
                        <input id="pincode" name="pincode" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6" value="<?php echo $user_data['ZipCode']?>">
                        </div>
                    </div>                                        
                    <div class="w-2/3 m-2 mb-10 flex justify-center items-center">
                        <button type="submit" class="flex w-1/2 justify-center rounded-md bg-[#EB9901] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>

</body>
</html>