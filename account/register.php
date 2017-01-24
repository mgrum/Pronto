<!--Description: This is the register page-->
<!--TODO Modal to upload documents to database?!-->

<!--HTML-Header-->
<?php session_start(); ?>
<?php include_once "../header.php" ?>

<!--Check for Login-->
<!--TODO Custom Login check - "you are already logged in"-->

<!--Container for content-->
<?php
$pdo = new PDO ('mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc');
if (isset ($_GET ['register'])) {
    $error = false;
    $email = $_POST ['email'];
    $passwort = $_POST ['pwd'];
    $passwort2 = $_POST ['pwd2'];
    $vorname = $_POST ['vorname'];
    $nachname = $_POST ['nachname'];
    $sollAZ = $_POST ['sollAZ'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if (strlen($passwort) < 1) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if ($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    // Keine Fehler ==> Nutzer registrieren
    if (!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        
        $statement = $pdo->prepare("INSERT INTO `Benutzer` (`EMail`, `Vorname`, `Nachname`, `Passwort`, `SOLLArbeitszeit`, `ISTArbeitszeit`) VALUES (:email, :vorname, :nachname, :passwort, :sollAZ, NULL)");
        
        $result = $statement->execute(array(
            'email' => $email,
            'vorname' => $vorname,
            'nachname' => $nachname,
            'passwort' => $passwort_hash,
            'sollAZ' => $sollAZ
        ));
        
        if ($result) {
            die('
            <div class="alert alert-success" role="alert" style="margin-top: 20px">
                <strong>Erfolgreich registriert!</strong>
                <a href="../account/login.php" class="alert-link"> Bitte melden Sie sich an</a>.
            </div>  
            ');
        } else {
            die('
            <div class="alert alert-danger" role="alert" style="margin-top: 20px">
                <strong>Es ist ein Fehler aufgetreten!</strong>
                <a href="../account/login.php" class="alert-link"> Bitte versuchen Sie es erneut</a>.
            </div>  
            ');
        }
    }
}
$pdo = null;
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4"
        ">
        <div class="panel panel-default panel-body panel-login">
            <div class="row">
                <div class="col-md-12">
                    <img src="../resources/images/logo.png" class="img-responsive" alt="">
                    <br>
                    <form action="?register=1" method="post">
                        <div class="form-group">
                            <label for="vorname">Vorname</label>
                            <input type="text" class="form-control" id="vorname" name="vorname">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="nachname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Passwort</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Passwort wiederholen</label>
                            <input type="password" class="form-control" id="pwd2" name="pwd2">
                        </div>
                        <div class="form-group">
                            <label for="sollAZ">Arbeitszeit</label>
                            <input type="number" class="form-control" placeholder="h pro Woche" id="sollAZ"
                                   name="sollAZ">
                        </div>
                        <button type="submit" class="btn btn-default">Registrieren</button>
                        <a href="login.html">
                            <button type="button" class="btn btn-link pull-right">zurück</button>
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>