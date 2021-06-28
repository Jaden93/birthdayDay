<?php
require_once 'functions.php';
require_once 'view/header.php';
?>
<header>
    <div class="centerPos">
            <div class="containerCenter">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1><?php
                              $users = getUsers();
                              if (!$users) { ?>
                              <h1>Ciao Guest,</h1>
                                  <h2>Registrati per sapere quanti giorni mancano al tuo compleanno!</h2>
                                  <?php
                              }
                              $dates = takeDate();
                              require 'userList.php';
                               ?>
                              
                            </h1>
                        </div>
                        <form method="POST" action="insert.php/">
                        <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="username" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Inserisci data nascita</label>
                            <input class="dataInput" name="data" type="date" required>
                        </div>
                        <div class="containerBtn">
                            <button  id="submitBtn" type="submit" class="rowBtn" name="submit">Registrati</button>
                        </form>
                        <form action="functions.php" method="post">
                            <button class="rowBtn" id="deleteBtn" name="azione" type="submit">Elimina utente</button>
                        </form>
                        </div>
                       </form>
                    </div>
                </div>        
            </div>
    </div>
</header>



