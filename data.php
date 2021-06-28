<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
<?php
$today = date("j F");   // March 10, 2001, 5:16 pm
echo "OGGI.$today";
?>
<form method="GET" action="">
    <label for="">Inserisci data nascita</label>
    <input name="data" type="date" required>
     <button type="submit">INVIA</button>
</form>
</h1>
<?php 

$mesi = json_decode(file_get_contents("months2.json"), true);

$days = 0;
//28 giorno
$giorno= date('d');
//06 mese
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
if (isset($_GET['data'])) { ?>
    <?php $date = $_GET['data']; ?>
    <?php 
    $date = explode("-", $date);
    foreach($mesi as $mese => $value) {
        
        $days += $value["days"];
        $month = $value["number"];
        $year = 365;
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
        ?>
        </h1>
    <?php } 
}
  ?>
<?php
}
?>
</body>
</html>
