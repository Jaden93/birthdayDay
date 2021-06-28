<?php


if($users) {
    foreach($users as $user) { ?>
        
        
       <?=$user['username']?>

    <?php
    
    }
    
    echo ", mancano GIORNI per il tuo compleanno!";
    
} else {
    echo "Guest registrati per sapere quanti giorni mancano al tuo compleanno!";
}
