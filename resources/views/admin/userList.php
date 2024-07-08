<!DOCTYPE html>
<?php 
    use app\controller\UserController;
    use app\include\Validation;
    require "./app/include/autoloader.php";
    if(!isset($_GET["search"]) || !($username = Validation::validate_text($_GET["search"]))){
        $users = UserController::all();
    }else{
        $username = Validation::validate_text($_GET["search"]);
        $users = UserController::find_by_user($username);
        if(!$users){
            header('location: /admin/userlist');
            exit;
        }
    }
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./resources/views/components/layout.php" ?>
    <title>User List</title>
</head>
<body class="admin">
    <?php include "./resources/views/components/sidebar.php" ?>
    <div class="content position-relative">
        <div class="search mt-3 mb-1 text-center">
            <div class="container">
                <form action="/admin/userlist/" method="get" class="user_form">
                    <input type="text" name="search"><br><br>
                    <button type="submit">Search</button>
                    <button type="button" onclick="location.href='/admin/userlist'">Show All</button>
                </form>
            </div>
        </div>
        <div class="container">
            <table border="1" class="text-center">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>user name</th>
                        <th>email</th>
                        <th>admin</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php if(isset($_GET["search"])) : ?>
                        <tr>
                            <td><?= $users['id'] ?></td>
                            <td><?= $users['username'] ?></td>
                            <td><?= $users['email'] ?></td>
                            <td><?= boolval($users['admin']) ? 'true' : 'false' ?></td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($users as $user) : ?>
                            <tr>
                                <td><?= $user[0] ?></td>
                                <td><?= $user[1] ?></td>
                                <td><?= $user[2] ?></td>
                                <td><?= boolval($user[4]) ? 'true' : 'false' ?></td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>