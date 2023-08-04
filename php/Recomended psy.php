<?php
require "conn.php";
session_start();
$gov = $_GET["gov"];
$sql = "SELECT * FROM psy WHERE gov like '$gov' ORDER BY rating desc";
$result = mysqli_query($conn, $sql);
$id = implode($_SESSION["id"]);
$html = "../Home.php?id=$id";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css file -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/Recomended psy.css">
    <!-- other css files -->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/brands.min.css">
    <link rel="stylesheet" href="../css/normal.css">
    <title>Recomended Psychologist</title>
</head>

<body bgcolor="#DCDCDC">

    <!-- start header -->
    <nav>
        <div class="container">
            <a href="<?php echo $html ?>"><img src="../img/logo-removebg-preview.png" width="90px"></a>

            <div class="normal-bar">
                <a href="php/logout.php">Logout</a>
            </div>

            <div class="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="../img/bars-solid.svg" id="nav_button">
                    </span>

                    <ul id="nav_ul">

                        <li>
                            <a href="php/logout.php">Logout</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>


    </nav>
    <!-- end header -->
    <section>
        <div class="container">
            <table border="1" style="border-collapse: collapse;" align="center">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PHONE</th>
                    <th>LOCATION</th>
                    <th>WORKHOURS</th>
                    <th>RATING</th>
                    <th>GOVERNORATE</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["psy_name"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td> <a href="<?php echo $row["psy_location"] ?>"><img src="../img/3.png" width="25px" /></a></td>
                        <td><?php echo $row["work_hours"] ?></td>
                        <td><?php echo $row["rating"] ?></td>
                        <td><?php echo $row["gov"]  ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </section>

    <!-- start footer -->
    <footer>
        <div class="footer_container" style="background-color: brown;">
            <h2>Follow Me</h2>
            <ul class="footer_ul">
                <li><a href="https://www.linkedin.com/in/ahmad-istaitieh-64a635248/"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100002178974914"><i class=" fa-brands fa-facebook"></i></a></li>
                <li><a href="https://github.com/ahmadadnanes"><i class="fa-brands fa-github"></i></a></li>
            </ul>
            <h3>Made With <span>&#10084;</span> By ahmad adnan</h3>
        </div>
    </footer>
    <!-- end footer -->

</body>

</html>
<?php
mysqli_close($conn);
?>