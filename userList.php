<?php

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
if (isset($_GET['data'])) { ?>
    <?php $date = $_GET['data']; 
    ?>
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
            
            if ($totalDayleft == 0 && $users) { ?>
        <?php
            foreach($users as $user) { ?>
                <?= $user["username"] ?>

        <?php
            }
                echo $user["username"]."Oggi è il tuo compleanno, Auguri!";
            }
            elseif ($totalDayleft == 1 && $users) {
                echo "Domani è il tuo compleanno!";
            }
            elseif ($totalDayleft > 1 && $users) {
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
                    echo "Mancano ancora ".$dayLastBirthday + 2 ." al tuo compleanno! Cadrà di ".$monthBirthday;
            }
        ?>
    <?php } 
    }
 
}

