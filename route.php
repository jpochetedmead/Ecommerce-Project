<?php
    include 'db_connection.php';

    if(isset($_POST['submit'])){
        $email = strtolower($_POST['email']);
        $check = false;
        $role = "";

        $sql = "SELECT * FROM Seller
        WHERE LOWER(email) = '$email' AND password = '$_POST[password]' AND approval = 1;";

        $result = $conn->query($sql);
        $cnt = mysqli_num_rows($result);
        if ( 0===$cnt ) {
            //echo 'no seller records <br>';
        }else {
            while( false!=($res=mysqli_fetch_array($result)) ) {
                $check = true;
                $role = 'seller';
            }

        }
        if($check == false){
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
                    $role = $user['role'];
                    $check = true;
                }
            }
        }
        if($check === false){
            header("location:login.php?error=1&send=" . $_POST['email']);
        }elseif($check === true){
            session_start();
            if($role == 'seller'){
                $sql = "SELECT * FROM Seller
                WHERE LOWER(email) = '$email' AND password = '$_POST[password]';";
                $result = $conn->query($sql);
                $seller = $result->fetch_assoc();

                $_SESSION['role'] = 'seller';
                $_SESSION['firstName'] = $seller['first_name'];
                $_SESSION['lastName'] = $seller['last_name'];
                $_SESSION['ID'] = $seller['seller_ID'];
                $_SESSION['phone'] = $seller['telephone_number'];
                $_SESSION['addressFirstLine'] = $seller['address_first_line'];
                $_SESSION['addressSecondLine'] = $seller['address_second_line'];
                $_SESSION['city'] = $seller['city'];
                $_SESSION['state'] = $seller['state_abbreviation'];
                $_SESSION['zip'] = $seller['zip_code'];
            }else{
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
                echo $_SESSION['role'] . "<br>";
                echo $_SESSION['firstName'] . "<br>";
                echo $_SESSION['lastName'] . "<br>";
                echo $_SESSION['ID'] . "<br>";
                echo $_SESSION['phone'] . "<br>";
                echo $_SESSION['addressFirstLine'] . "<br>";
                echo $_SESSION['addressSecondLine'] . "<br>";
                echo $_SESSION['city'] . "<br>";
                echo $_SESSION['state'] . "<br>";
                echo $_SESSION['zip'] . "<br>";
                echo $_SESSION['gender'] . "<br>";
            }
        }

        if($_SESSION['role'] == 'seller'){
            header('location:sellerHome.php');
        }elseif($_SESSION['role'] == 'buyer' || $_SESSION['role'] == 'Buyer' || $_SESSION['role'] == 'moderator'){
            header('location:home.php');
        }elseif($_SESSION['role'] == 'admin'){
            header('location:adminHome.php');
        }

    }


?>
