<?php 
include "db.php";


$sql = "DROP TABLE users";
if ($conn->query($sql) === TRUE) {
  echo "Table users deleted successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();