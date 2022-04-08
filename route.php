<?php
    include 'db_connection.php';

    if(isset($_POST['submit'])){
        $email = strtolower($_POST['email']);
        $check = false;

        $sql = "SELECT * FROM Users
        WHERE LOWER(email) = '$email' AND password = '$_POST[password]';";

        $result = $conn->query($sql);
        $cnt = mysqli_num_rows($result);
        if ( 0===$cnt ) {
            //echo 'no user records <br>';
        }else {
            while( false!=($res=mysqli_fetch_array($result)) ) {
                $sql = "SELECT * FROM Users
                WHERE LOWER(email) = '$email' AND password = '$_POST[password]';";

                $result = $conn->query($sql);
                $user = $result->fetch_assoc();
                $check = true;
            }
        }
        if($check === false){
            header("location:login.php?error=1&send=" . $_POST['email']);
        }elseif($check === true){
            session_start();

            $sql = "SELECT * FROM Users
            WHERE LOWER(email) = '$email' AND password = '$_POST[password]';";
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();

            $_SESSION['role'] = $user['role'];
            $_SESSION['firstName'] = $user['first_name'];
            $_SESSION['lastName'] = $user['last_name'];
            $_SESSION['ID'] = $user['user_ID'];
            $_SESSION['phone'] = $user['telephone_number'];
            $_SESSION['addressFirstLine'] = $user['address_first_line'];
            $_SESSION['addressSecondLine'] = $user['address_second_line'];
            $_SESSION['city'] = $user['city'];
            $_SESSION['state'] = $user['state_abbreviation'];
            $_SESSION['zip'] = $user['zip_code'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['approval'] = $user['approval'];
            $_SESSION['email'] = $user['email'];
        }

        if($_SESSION['role'] == 'seller' && $_SESSION['approval'] == 1){
            header('location:sellerHome.php');
        }elseif($_SESSION['role'] == 'buyer' || $_SESSION['role'] == 'moderator' || ($_SESSION['role'] == 'seller' && $_SESSION['approval'] == 0)){
            header('location:home.php');
        }elseif($_SESSION['role'] == 'admin'){
            header('location:adminHome.php');
        }

    }
?>
