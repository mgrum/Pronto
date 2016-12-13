<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["username"] = "";
$_SESSION["role"] = "";
$_SESSION["chosenProject"] = "";
echo "Session variables are set.";
?>

</body>
</html> 