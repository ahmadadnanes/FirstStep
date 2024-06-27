<?php
@session_start();
use app\controller\AdminController;
include "./app/include/autoloader.php";
$admin = new AdminController;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("resources/views/components/layout.php") ?>
    <title>Welcome admin <?= $_SESSION["user"] ?></title>
</head>

<body class="admin">
    <?php include('resources/views/components/sidebar.php') ?>
    <div class="content">
        <div class="container">
            <h1 class="text-center">Status</h1>
            <div class="card-container">
                <div class="card">
                    <i class="fa-solid fa-users"></i>
                    <h6>Number Of Users</h6>
                    <p>
                        <?php 
                            $totalUsers = $admin->users_count();
                            echo "<b>" . $totalUsers[0][0] . "</b>";
                        ?>
                    </p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-comment"></i>
                    <h6>Number Of Comments</h6>
                    <p>
                        <?php 
                            $totalComments = $admin->comments_count();
                            echo "<b>" . $totalComments[0][0] . "</b>";
                        ?>
                    </p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-book"></i>
                    <h6>Number Of Diaries</h6>
                    <p>
                        <?php 
                            $totalDiaries = $admin->diaries_count();
                            echo "<b>" . $totalDiaries[0][0] . "</b>";
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>