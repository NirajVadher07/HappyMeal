<?php

function check_login($con){
    if($_SESSION['CustomerID']){
        $id = $_SESSION['CustomerID'];        
        $query = " select * from customers where CustomerID = '$id' limit 1";

        $result = mysqli_query($con,$query);

        if($result && mysqli_num_rows($result) > 0 ){
            $user_data = mysqli_fetch_assoc($result);

            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die; 
} 

// Function to sanitize data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>