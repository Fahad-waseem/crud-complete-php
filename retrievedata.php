<?php
    require_once "dbConnection.php";
    $select = "SELECT * FROM students";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo
        '<tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["name"] . '</td>
            <td>' . $row["email"] . '</td>
            <td>' . $row["password"]  .'</td>
            <td><a data-eid=" ' . $row['id'] . '" " class= "edit" >
            <span class="fa fa-pencil"></span></a>
            <a data-id=" ' . $row['id']  . '" class="delete" data-toggle="tooltip">
             <span class="fa fa-trash"></span></a></td>
        </tr>';
        }
    } else {
        echo
        '<tr>
        <td scope="row" colspan="6" class="text-center">No result found, nothing to show.</td>
    </tr>';
    }
    mysqli_close($conn);
?>
