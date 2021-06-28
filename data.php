<?php
require_once 'functions.php';
require_once 'view/header.php';
?>

<header>
    <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Ciao  <?php
                              $users = getUsers();
                              $date = getDate();
                              require 'userList.php';?>
                            </h2>
                        </div>
                        
                        <form action="insert.php" method="post">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="username" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Data di nascita</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <input id="submitBtn" type="submit" class="btn btn-primary" name="submit">
                        </form>
                            <form action="functions.php" method="post">
                            <button id="deleteBtn" name="azione" type="submit">DELETE</button>
                            </form>
                    </div>
                </div>        
            </div>
    </div>
</header>

</body>
</html>
