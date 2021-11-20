<?php
    
    $firstName = $_POST['firstName'];
    $Mails = $_POST['Mails'];
    $PWD = $_POST['PWD'];
    $MSG = $_POST['MSG'];

    //Database connection
     $conn = new mysqli('localhost', 'root', '', 'contact');
     if($conn->connect_error){
         die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName, Mails, PWD, MSG)
                   values(?, ?, ?, ?)");
        $stmt->bind_param("ssss",$firstName, $Mails, $PWD, $MSG);
        $stmt->execute();
        echo "Message Send....";
        $stmt->close();
        $conn->close();
    }
?>