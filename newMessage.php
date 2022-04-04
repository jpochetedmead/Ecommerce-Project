<?php
    include 'db_connection.php';
    include 'templates/head.html';
    session_start();
    $recipientID = 0;
    $sellerName = '';
    $previousMessage = '';
    $subject = '';
    //If they click on the message seller link/button
    if($_GET['new'] == 1){
        $recipientID = $_GET['recipient'];
        $sql = "SELECT * FROM Users WHERE user_ID=$recipientID;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $sellerName = $row['first_name'] . " " . $row['last_name'];
    }elseif($_GET['new'] == 0){
        //Need 3 things new,recipient, and messageID
        $recipientID = $_GET['recipient'];
        $sql = "SELECT * FROM Users WHERE user_ID=$recipientID;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $sellerName = $row['first_name'] . " " . $row['last_name'];

        $sql = "SELECT * FROM Messages WHERE message_ID=$_GET[messageID]";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $previousMessage = $row['message'];
        $subject = $row['subject'];
            
    }
    if(isset($_POST['send'])){
        //if based on if previous message isset
        $futureDate=date('Y-m-d', strtotime('+1 year'));
        $sql = "INSERT INTO Messages (sender_ID, recipient_ID,message,subject,expire_date)
        VALUES ($_SESSION[ID],$_POST[ID],'$_POST[message]','$_POST[subject]','$futureDate');";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<body>
    <form action="newMessage.php" method="POST" >
    <div>
        <label for="to">To: </label>
        <input id="to" name="to" disabled type="text" value="<?php echo $sellerName ?>">
    </div>
    <input id="ID" name="ID" type="text" hidden value="<?php echo $recipientID ?>">
    <?php if($_GET['new'] == 0){
        echo "<input id='previousID' name='previousID' type='text' hidden value='" . $_GET['messageID'] . "'>";
    }
    ?>
    <div>
        <label for="subject">Subject: </label>
        <input id="subject" required name="subject" type="text" value="<?php echo (strlen($previousMessage) > 0)?"Re: " . $subject:'';?>">
    </div>
    <div>
        <textarea class="resize-none h-80" row="30" cols="80" wrap="soft" id="message" required name="message"><?php echo (strlen($previousMessage) > 0)?$previousMessage:''; ?>&#10 -- -- -- -- &#10</textarea>
    </div>
    <div>
        <button name="send" id="send" type="submit">Send</button>
    </div>
    <div>
        <button name="cancel" id="cancel" type="submit">Cancel</button>
    </div>
          

    </form>


<?php
    include 'templates/footer.html';
?>