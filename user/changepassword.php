<?php
    session_start();
    include("connection.php");
    include("function.php");
    $user_data = check_login($con);    

    if($_SERVER['REQUEST_METHOD']== "POST"){        
        $old = $_POST['old'];
        $new = $_POST['new'];
        $rewritenew = $_POST['rewritenew'];        
        $ID = $user_data['CustomerID'];
        if(!empty($old) && !empty($new) && !empty($rewritenew)){
            if($user_data['Password'] == $old){
                if($new == $rewritenew){
                    $con = mysqli_connect("localhost","root","","happymeal");        
                    $query = "UPDATE customers SET password = '$new' WHERE CustomerID = '{$user_data['CustomerID']}' ";
                    $query_run = mysqli_query($con, $query);
                    ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-2" role="alert">
                            <strong class="font-bold">Done!!!</strong>
                            <span class="block sm:inline">Password Updated</span>                            
                        </div>
                    <?php                    
                }
                else{?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-2" role="alert">
                        <strong class="font-bold">Error!!!</strong>
                        <span class="block sm:inline">re-written password doesn't match with new password</span>                            
                    </div>
                <?php                    
                }
            }
            else{?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-2" role="alert">
                    <strong class="font-bold">Error!!!</strong>
                    <span class="block sm:inline">Enter Correct Current Password</span>                            
                </div>
            <?php                
            }
        }
        else{?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-2" role="alert">
                <strong class="font-bold">Error!!!</strong>
                <span class="block sm:inline">Enter all details</span>                            
            </div>
        <?php            
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

<body>
    <div class="flex min-h-[60%] mt-2 flex-col justify-center items-center px-6 py-12 lg:px-8">
        <div class="border-1 w-[500px] p-[20px] rounded-lg shadow-2xl">
            <div class="flex justify-end">
                <a href="myprofile.php" class="flex w-[10%] p-[2px] justify-center rounded-md bg-[#EB9901] text-xs font-semibold text-white">Back</a>
            </div>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">                
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update Password</h2>
            </div>

            <div class="mt-10 mb-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Current Passowrd</label>
                    <div class="mt-2">
                    <input id="old" name="old" type="password" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>                    
                    </div>
                    <div class="mt-2">
                    <input id="new" name="new" type="password" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Re-write New Password</label>                    
                    </div>
                    <div class="mt-2">
                    <input id="rewritenew" name="rewritenew" type="password" required class="px-1.5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#EB9901] sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="pt-5">
                    <button type="submit" class="m-2 flex w-full justify-center rounded-md bg-[#EB9901] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>                    
                </div>
                </form>                
            </div>
        </div>
    </div>


</body>
</html>