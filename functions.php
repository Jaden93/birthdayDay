<?php 
require "db.php";







function getUsers() {

    $connection = $GLOBALS['conn'];

    $records = [];

    $sql = 'SELECT * 
    FROM users 
    ORDER BY id DESC 
    LIMIT 1';
    
    $res = $connection->query($sql);
    if($res) {
        while ($row = $res->fetch_assoc()) {
            $records[] = $row;
        }
    }
    return $records;
}




function resetUsers() {
    
    $connection = $GLOBALS['conn'];
    $connection->query('DELETE from users');
    header("location: http://form.test/index.php");
    
}


function takeDate() {

    $records = [];
    $connection = $GLOBALS['conn'];

    $sql = 'SELECT date from USERS
            ORDER BY ID DESC
            LIMIT 1';
    
    $res = $connection->query($sql);

    if($res) {
        while ($row = $res->fetch_assoc()) {
            $records[] = $row;
        }
    }
    return $records;

}


if (isset($_POST['azione'])) {
 resetUsers();
}