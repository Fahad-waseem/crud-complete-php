<?php

    include('dbConnection.php');

    $data =stripslashes(file_get_contents("php://input"));
    $mydata=json_decode($data,true);
    $name=$mydata['name'];
    $email=$mydata['email'];
    $password=$mydata['password'];
    if(!empty($name) && !empty($email) && !empty($password)){
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql ="INSERT INTO students(name, email,password)
    VALUES ('$name','$email','$password');";


    if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                // show data user withoust reload the page
                // ?>  <script>
                showdata();
                </script>   <?php  
                // end  show data user withoust reload the page   end  
            } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }else{
        echo "fill all fields";
    }
?>