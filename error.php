<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Error</h1>
    <p>
    <?php
        echo $_SESSION['message'];

    ?>
    </p>     
    <a href="LogIn.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
