<?php
    session_start();
    include("connection.php");
    include("function.php");
    $error = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];       
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        
        // Validate first name
        if (empty($_POST['firstname'])) {
            $error = 'First name is required';
        } else {
            $firstname = test_input($_POST['firstname']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
                $error = 'Only letters and white space allowed in first name';
            }
        }

        // Validate last name
        if (empty($_POST['lastname'])) {
            $error = 'Last name is required';
        } else {
            $lastname = test_input($_POST['lastname']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
                $error = 'Only letters and white space allowed in last name';
            }
        }

        // Validate email address
        if (empty($_POST['email'])) {
            $error = 'Email address is required';
        } else {
            $email = test_input($_POST['email']);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Invalid email format';
            }
        }

        // Validate password
        if (empty($_POST['password'])) {
            $error = 'Password is required';
        } else {
            $password = test_input($_POST['password']);
            // check if password contains at least one uppercase letter, one lowercase letter, one number, and one special character
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)) {
                $error = 'Password should contain at least one uppercase letter, one lowercase letter, one number, and one special character and should be at least 8 characters long';
            }
        }

        // Validate phone number
        if (empty($_POST['phonenumber'])) {
            $error = 'Phone number is required';
        } else {
            $phonenumber = test_input($_POST['phonenumber']);
            // check if phone number is valid
            if (!preg_match("/^[0-9]{10}$/",$phonenumber)) {
                $error = 'Invalid phone number';
            }
        }

        // Validate address
        if (empty($_POST['address'])) {
            $error = 'Address is required';
        } else {
            $address = test_input($_POST['address']);
        }

        // Validate city
        if (empty($_POST['city'])) {
            $error = 'City is required';
        } else {
            $city = test_input($_POST['city']);
            // check if city name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
                $error = 'Only letters and white space allowed in city name';
            }
        }

        // Validate state
        if (empty($_POST['state'])) {
            $error = 'State is required';
        } else {
            $state = test_input($_POST['state']);
            // check if state name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$state)) {
                $error = 'Only letters and white space allowed in state name';
            }
        }
        

        if( !empty($firstname) && !empty($lastname) && !empty($email) && !empty($phonenumber) && !empty($address) && !empty($city) && !empty($state) && !empty($pincode) && !empty($gender) && !empty($password) && is_numeric($phonenumber) && is_numeric($pincode)){
            //save to database            
            $query = "INSERT INTO `customers`(`FirstName`, `LastName`, `Email`, `Gender`, `Phone`, `Password`, `Address`, `City`, `State`, `ZipCode`) VALUES ('$firstname','$lastname','$email','$gender','$phonenumber','$password','$address','$city','$state','$pincode')";
            mysqli_query($con, $query);
            header("Location: login.php");
            die;
        }
        else{
            echo "Please enter some valid information";
        }
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
        <?php if($error != ""){?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!!!</strong>
            <span class="block sm:inline">Invalid Password</span>                            
        </div>
        <?php }?>
        <div class="border-1 w-[75vw] rounded-lg shadow-2xl">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-40 w-auto" src="..\images\logo.png" alt="Your Company">
                <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign Up to your account</h2>
            </div>

            <div class="mt-2 w-full">
                <form  action="#" method="POST" class="flex justify-evenly items-center flex-wrap">
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                        <div class="mt-2">
                        <input id="firstname" name="firstname" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                        <div class="mt-2">
                        <input id="lastname" name="lastname" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                        <div class="mt-2">
                        <input id="phonenumber" name="phonenumber" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>                
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                        <div class="mt-2">
                        <input id="address" name="address" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                        <div class="mt-2">
                        <input id="city" name="city" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">State</label>
                        <div class="mt-2">
                        <input id="state" name="state" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Pin Code</label>
                        <div class="mt-2">
                        <input id="pincode" name="pincode" type="text" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>            
                        </div>
                        <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-1/3 m-2">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>            
                        </div>
                        <div class="mt-2 flex text-sm justify-evenly items-center px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                            <div class="flex items-center">
                                <input type="radio" id="male" name="gender" value="Male" class="mr-2">
                                <label for="male">Male</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="female" name="gender" value="Female" class="mr-2">
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="w-2/3 m-2 flex justify-center items-center">
                        <button type="submit" class="flex w-1/2 justify-center rounded-md bg-[#EB9901] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign Up</button>
                    </div>
                </form>

                <p class="mt-[10px] pb-[5px] text-center text-sm text-gray-500">
                Already a member?
                <a href="login.php" class="font-semibold leading-6 text-[#EB9901]">Log In</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>