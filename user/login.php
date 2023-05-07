<?php
    session_start();
    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD']== "POST"){        
        $password = $_POST['password'];
        $email = $_POST['email'];
        if(!empty($password) && !empty($email)){
            //read from database            
            $query = "select * from customers where email='$email' limit 1";
            //$query = "SELECT * FROM `customers` WHERE `Email` = '$email'";            
            $result = mysqli_query($con, $query);            

            if($result){
                if(mysqli_num_rows($result) > 0 ){            
                    $user_data = mysqli_fetch_assoc($result);                            
                    if($user_data['Password'] == $password){
                        $_SESSION['CustomerID'] = $user_data['CustomerID'];                        
                        header("Location: index.php");
                        die; 
                    }
                    else{
                        // echo "please enter valid values";
                        ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-2" role="alert">
                            <strong class="font-bold">Error!!!</strong>
                            <span class="block sm:inline">Invalid Password</span>                            
                        </div>
                        <?php
                    }
                }
            }                      
        }
        else{
            echo "enter correct data";
        }
    }
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="..\images\logo1.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8">
        <div class="border-1 w-[500px] p-[20px] rounded-lg shadow-2xl">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-40 w-auto" src="..\images\logo.png" alt="Your Company">
                <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log in to your account</h2>
            </div>

            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-[#EB9901]">Forgot password?</a>
                    </div>
                    </div>
                    <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-[#EB9901] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log In</button>
                </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="signup.php" class="font-semibold leading-6 text-[#EB9901]">Sign Up</a>
                </p>
                <p class="mt-2 text-center text-sm text-gray-500">
                Are you Admin?
                <a href="../admin/index.php" class="font-semibold leading-6 text-[#EB9901]">Admin Login</a>
                </p>
            </div>
        </div>
    </div>


</body>
</html>