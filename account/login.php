<!--Description: This is the login page-->

<!--HTML-Header-->
<?php session_start(); ?>
<?php include_once "../header.php" ?>

<!--Check for Login-->
<!--TODO Custom Login check - "you are already logged in"-->

<!--Container for content-->
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <?php
            $pdo = new PDO ('mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc');
            if (isset ($_GET ['login'])) {
                // lokale Variablen aus dem HTML Formular holen
                $email = $_POST ['email'];
                $passwort = $_POST ['pwd'];
                // Abfrage auf die login Datenbank
                $statement = $pdo->prepare("SELECT EMail, Passwort FROM Benutzer WHERE EMail = :email");
                $result = $statement->execute(array(
                    'email' => $email
                ));
                
                $user = $statement->fetch();
                // Überprüfung der Login Daten
                if ($user !== false && password_verify($passwort, $user ['Passwort'])) {
                    $_SESSION ['userid'] = $email;
                    
                    die ('
                    </div></div></div>
                    <div class="alert alert-success" role="alert" style="margin-top: 20px">
                        <strong>Erfolgreich angemeldet!</strong> <br> Sie werden automatisch weitergeleitet...<br>
                        <a href="../index.php" class="alert-link"> Falls nicht, klicken sie bitte hier</a>.
                    </div>                       
                    ');
                    // weiterleitung: Link noch anpassen!
                } else {
                    echo('
                    <div class="alert alert-danger" role="alert" style="margin-top: 20px">
                        <strong>Es ist ein Fehler aufgetreten!</strong><br> Benutzername oder Passwort ist falsch.<br>
                        Bitte versuchen sie es erneut.
                    </div> 
                    ');
                }
            }
            ?>
            <div class="panel panel-default panel-body panel-login">
                <div class="row">
                    <div class="col-md-12">
                        <img src="../resources/images/logo.png" class="img-responsive" alt="">
                        <br>
                        <form action="?login=1" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Passwort:</label>
                                <input type="password" class="form-control" id="pwd" name="pwd">
                            </div>
                            <button type="submit" class="btn btn-default">Login</button>
                            <a href="register.php">
                                <button type="button" class="btn btn-link pull-right">Registrieren</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
</body>
</html>