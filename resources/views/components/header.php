<!-- start header -->
<nav class="m-2">
    <div class="container">
        <?php 
        include('resources/views/components/logo.php');
        ?>
        <?php if(isset($_SESSION["id"])){ ?>
            <div class="user">
                <div class="links">
                    <span class="icon">
                        <button class="user" aria-label="user profile"><i class="fa-solid fa-user" id="user"></i></button>
                    </span>
                    <div class="drop-down-user" id="drop-down-user">
                        <ul id="nav_ul_user">
                            <?php if(isset($server)) :?>
                                <?php if($server !== "ar") : ?>
                                    <li><a href="<?= '/profile/' . $user  ?>">Profile</a></li>
                                    <li><a href="/logout">Logout</a></li>
                                <?php else: ?>
                                    <li><a href="<?= '/profile/' . $user  ?>">حسابك</a></li>
                                    <li><a href="/logout">تسجيل الخروج</a></li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li><a href="<?= '/profile/' . $user  ?>">Profile</a></li>
                                <li><a href="/logout">Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="normal-bar">
            <?php foreach($nav as $key => $na) : ?>
                <a href="<?= $na[0] ?>" aria-label="<?= $na[1] ?>"><?= $key ?></a>
            <?php endforeach ?>
        </div> 
        <div class="drop-down" id="drop-down">
            <div class="links">
                <span class="icon">
                    <i class="fa-solid fa-bars" id="nav_button"></i>
                    <!-- <input type="image" src="/resources/img/bars-solid.svg" id="nav_button" alt="bars"> -->
                </span>
                <ul id="nav_ul">
                    <?php foreach($nav as $key => $na) : ?>
                        <li>
                            <a href="<?= $na[0] ?>" aria-label="<?= $na[1] ?>"><?= $key ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div> 
    </div>
</nav>

<!-- end header -->
