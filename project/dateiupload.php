<?php
echo "<pre>";
print_r($_FILES);
echo "</pre>";
/* hier kommt nun das Formular ? am Ende !! */
?>
<form ?

      Array
      (
      [uploaddatei]=> Array
    (
    [name] => kaffeepause.png
    [type] => image/png
    [tmp_name] => /tmp/phplP3DM3
    [error] => 0
    [size] => 90109
    )
    )
    
    <?php
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    if ($_FILES['uploaddatei']['name'] <> "") {
        // Datei wurde durch HTML-Formular hochgeladen
        // und kann nun weiterverarbeitet werden
    }
    /* hier kommt nun das Formular ? am Ende !! */
    ?>
    <form ?

          move_uploaded_file(
          $_FILES[
    'uploaddatei']['tmp_name'] ,
    'hochgeladenes/'. $_FILES['uploaddatei']['name']);
    
    
    <?php
    echo "<pre>";
    echo "FILES:<br />";
    print_r($_FILES);
    echo "</pre>";
    if ($_FILES['uploaddatei']['name'] <> "") {
        // Datei wurde durch HTML-Formular hochgeladen
        // und kann nun weiterverarbeitet werden
        move_uploaded_file(
            $_FILES['uploaddatei']['tmp_name'],
            'hochgeladenes/' . $_FILES['uploaddatei']['name']);
        
        echo "<p>Hochladen war erfolgreich: ";
        echo '<a href="hochgeladenes/' . $_FILES['uploaddatei']['name'] . '">';
        echo 'hochgeladenes/' . $_FILES['uploaddatei']['name'];
        echo '</a>';
    }
    ?>

    <form name="uploadformular" enctype="multipart/form-data" action="dateiupload.php" method="post">
        Datei: <input type="file" name="uploaddatei" size="60" maxlength="255">
        <input type="Submit" name="submit" value="Datei hochladen">
    </form>