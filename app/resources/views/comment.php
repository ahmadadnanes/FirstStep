<?php
include_once "./app/controller/DiaryController.php";
if (isset($_GET["id"])) {
    $id = htmlspecialchars($_GET["id"]);
    $comment = DiaryController::GetCommentById($id);
    die(var_dump($comment));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $comment[0] ?></title>
</head>

<body>

</body>

</html>