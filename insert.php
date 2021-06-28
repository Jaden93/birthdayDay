<?php
include 'db.php';
if(isset($_POST['submit']))
{    
     $name = $_POST['username'];
     $date = date('Y-m-d', strtotime($_POST['date']));
     $sql = "INSERT INTO users (username,date)
     VALUES ('$name','$date') ";
     if (mysqli_query($conn, $sql)) {
        //echo "New record has been added successfully !";
       header("location: http://form.test/index.php");
         
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>