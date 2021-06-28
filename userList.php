<?php




if($users) {
    foreach($users as $user) { ?>
    
    <?php
    $date = $user['date'];
    $date = explode("-", $date);
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
     $totalCurrentDays = $totalCurrentDays - $daysLeft;     }
     if (isset($user['date'])) { ?>
     <?php 
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
                 echo "Ciao $user[username], Oggi è il tuo compleanno, Auguri!";
             }
             elseif ($totalDayleft == 1) {
                 echo "Domani $user[username], è il tuo compleanno!";
             }
             elseif ($totalDayleft > 1) {
                 echo "Ciao $user[username], mancano"." ".$totalDayleft." giorni al tuo compleanno! Cadrà di ".$value["name"];
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
                     echo "Ciao $user[username], mancano ".$dayLastBirthday + 2 ." al tuo compleanno. Cadrà di ".$monthBirthday;
                 }
             }
         }
    }


    
}
    
