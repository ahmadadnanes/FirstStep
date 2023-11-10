<!-- start header -->
<nav>
    <div class="container">
        <div class="user">
            <span class="icon">
                <span>
                    <a href="<?= '/user/' . $user  ?>"><i class="fa-solid fa-user" id="user"></i></a>
                </span>
            </span>
        </div>
        <a href="/"><img src="/app/resources/img/logo-removebg-preview.png" width="90px" alt="logo"></a>

        <div class="normal-bar">
            <a href="/logout">Logout</a>
        </div>

        <div class="drop-down" id="drop-down">
            <div class="links">
                <span class="icon">
                    <input type="image" src="/app/resources/img/bars-solid.svg" id="nav_button" alt="bars">
                </span>

                <ul id="nav_ul">

                    <li>
                        <a href="/logout">Logout</a>
                    </li>

                </ul>
            </div>
        </div>

    </div>


</nav>
<!-- end header -->