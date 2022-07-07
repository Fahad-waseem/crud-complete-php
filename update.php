<?php
    include('dbConnection.php');

    $student=$_POST["id"];
    echo "$student";
    $sql = "SELECT * FROM students WHERE id=$student";
    $result=mysqli_query($conn,$sql) or die ("SQL query failed");
    $output="";
    if (mysqli_num_rows($result) > 0){    
        
        while($row = mysqli_fetch_assoc($result)){
        $output .= "
        <tr>
            <td>ID</td>
            
            <td><input type='text' id='id' readonly value='{$row["id"]} '> </td>

        </tr>
        <tr>
        <td>Name</td>
        <td><input type='text' id='name' value='{$row["name"]} '> </td>
            </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' id='email' value='{$row["email"]}'> </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='text' id='password' value='{$row["password"]}'>
          
             </td>
            
        </tr>
        <tr>
            <td>Update</td>
            <td><input type='submit' name='update' id='edit-submit'  class='update'  value='update details'></td>
        </tr>";
        echo $output;
        }

        } else {
            echo "Error: ";

        }

        
?>
    
