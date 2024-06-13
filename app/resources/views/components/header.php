<!-- start header -->
<nav>
    <div class="container">
        <?php include('./app/resources/views/components/logo.html') ?>
        <?php if(isset($_SESSION["id"])){ ?>
            <div class="user">
                <span class="icon">
                    <?php if (isset($_SESSION["admin"])) { ?>
                        <span>
                            <a href="/admin" aria-label="user profile"><i class="fa-solid fa-user" id="user"></i></a>
                        </span>
                    <?php } else { ?>
                <span>
                    <a href="<?= '/user/' . $user  ?>" aria-label="user profile"><i class="fa-solid fa-user" id="user"></i></a>
                </span>
                    <?php } ?>
                </span>
            </div>
        <?php } ?>
        <div class="normal-bar">
            <?php foreach($nav as $key => $na){ ?>
                <a href="<?= $na[0] ?>" aria-label="<?= $na[1] ?>"><?= $key ?></a>
            <?php } ?>
        </div> 
        <div class="drop-down" id="drop-down">
            <div class="links">
                <span class="icon">
                    <input type="image" src="/app/resources/img/bars-solid.svg" id="nav_button" alt="bars">
                </span>
                <ul id="nav_ul">
                    <?php foreach($nav as $key => $na){ ?>
                        <li>
                            <a href="<?= $na[0] ?>" aria-label="<?= $na[1] ?>"><?= $key ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div> 
    </div>
</nav>

<!-- end header -->
