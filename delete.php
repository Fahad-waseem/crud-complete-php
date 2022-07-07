<?php  

include_once 'dbConnection.php';

$studentId = $_POST["studentId"];
echo $studentId;

$sql = "DELETE FROM students WHERE id=$studentId";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>