<?php
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];


    //Database connection
    $conn = new mysqli('localhost', 'root', '','test2');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(firstnae,email,subject)
            values(?,?,?)");
        $stmt->bind_param("sss",$firstname,$email,$subject);
        $stmt->execute();
        echo "Sent";
        $stmt->close();
        $conn->close();
    }
?>