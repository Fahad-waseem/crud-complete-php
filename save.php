<?php
     include('dbConnection.php');
        $data =stripslashes(file_get_contents("php://input"));
        $myresult=json_decode($data,true);
        print_r($myresult); 
       
         $id =$myresult['id'];
        $name=$myresult['name'];
        $email=$myresult['email'];
        $password=$myresult['password'];
        // $conn = new mysqli($id, $name, $email, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $update=
         "UPDATE students  SET  name ='$name', email ='$email', password ='$password' 
         WHERE id='$id' ";
      
        if ($conn->query($update) === TRUE) {
        // if ($myresult) {
            echo "Record updated successfully.";
      
        } else {
        echo "Failed to update.";
        }
        $conn->close();
?>