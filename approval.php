<?php
    include 'db_connection.php';
    session_start();

    if(isset($_POST['accept'])){
        $sql = "UPDATE Users
        SET approval = 1
        WHERE user_ID=$_POST[accept]";

        //will eventually send message about accept

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }elseif(isset($_POST['decline'])){
        $sql = "UPDATE Users
        SET role = 'buyer'
        WHERE user_ID=$_POST[decline]";
        //Will eventually send message about decline
        
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<div class="m-5">
    <form action="approval.php" id="form1" method="POST">
    <table>
            <tr>
                <th>Name</th>
                <th>ID Number</th>
                <th>Email</th>
                <th>Select</th>
            </tr>

            <?php
            $sql = "SELECT * FROM Users WHERE role='seller' && approval=0";
            $result = $conn->query($sql);

            while($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $res['first_name'] . " " . $res['last_name'] . "</td>";
                echo "<td>" . $res['user_ID'] . "</td>";
                echo "<td>" . $res['email'] . "</td>";
                ?>
                <td><button type="submit" name="accept" form="form1" id="accept" value="<?php echo $res['user_ID']?>">✅</button>
                <button type="submit" name="decline" form="form1" id="decline" value="<?php echo $res['user_ID']?>">❌</button></td>
                <?php
            }
            ?>

        </table>
        </form>
</div>