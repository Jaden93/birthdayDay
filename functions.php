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


// function takeDate() {

//     $records = [];
//     $connection = $GLOBALS['conn'];

//     $sql = 'SELECT date from USERS
//             ORDER BY ID DESC
//             LIMIT 1';
    
//     $res = $connection->query($sql);

//     if($res) {
//         while ($row = $res->fetch_assoc()) {
//             $records[] = $row;
//         }
//     }
//     return $records;

// }


if (isset($_POST['azione'])) {
 resetUsers();
}


function takeDate() {

    $mesi = json_decode(file_get_contents("months2.json"), true);
    
  
    $days = 0;
    $giorno= date('d');
    $month = date('m');
    $mesee = trim($month,0);
    $totalCurrentDays = 0;
    $totalLeftDays = 0;
    forEach($mesi as $mese => $value) {
        if ($value["number"] <= $mesee){
            $totalCurrentDays += $value["days"];
        };
        if ($value["number"] == $mesee) {
            $daysLeft =  $value["days"] - $giorno."\n";
        }
    }
    $totalCurrentDays = $totalCurrentDays - $daysLeft; 
    if (isset($_POST['data'])) { ?>
        <?php $date = $_POST['data']; ?>
        <?php 
        $date = explode("-", $date);
        foreach($mesi as $mese => $value) {
            
            $days += $value["days"];
            $month = $value["number"];
            if ($month == $date[1]) { ?>
            <h1> <?php
    
                $fineMese =  $days - $date[2];
                $giorniMancanti =  $days - $fineMese;
                //Giorni da inizio anno a compleanno
                 $dayPast =  $days - $value["days"] + $giorniMancanti;
                //Giorno odierno
                 $totalDayleft = $dayPast - $totalCurrentDays;
                
                if ($totalDayleft == 0) {
                    echo "Oggi è il tuo compleanno, Auguri!";
                }
                elseif ($totalDayleft == 1) {
                    echo "Domani è il tuo compleanno!";
                }
                elseif ($totalDayleft > 1) {
                    echo "Mancano"." ".$totalDayleft." giorni al tuo compleanno! Cadrà di ".$value["name"];
                }
    
                else {
    
                        foreach($mesi as $mese => $value) {
                           if ($value["number"] > $mesee) {
                            $totalLeftDays += $value["days"];
                            
                           } elseif ($value["number"] == $month) {
                              $monthBirthday =  $value["name"];
                           }
    
                        }
                        $dayLastBirthday =  $totalLeftDays + $dayPast;
                        echo "Mancano ".$dayLastBirthday + 2 ." al tuo compleanno! Cadrà di ".$monthBirthday;
                }
            }
        }
    }
}


