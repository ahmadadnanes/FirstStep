<?php
$status=$_SERVER['REDIRECT_STATUS'] ?? null;
$codes=array(
    400 => array('400 Bad Request', 
                'The request cannot be fulfilled due to bad syntax.'),
    401 => array('401 Login Error', 
                'It appears that the password and/or user-name you entered was incorrect.'),
    500 => array('500 Internal Server Error',
                'The request was unsuccessful due to an unexpected condition encountered by the server.'),
      //all the other necessary codes
);

if(isset($codes[$status])){
    $errortitle=$codes[$status][0];
    $message=$codes[$status][1];
}
else{
    $errortitle="Unknown Error";
    $message="An unknown error has occurred. Code: $status.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("resources/views/components/layout.php") ?>
    <title><?= $errortitle ?></title>
</head>

<body class="errorPage">
    <div class="container">
        <div class="text">
            <h1><?= $message ?></h1>
            <a href="/">return Home?</a>
        </div>
    </div>
</body>
<script src="/app.js"></script>

</html>