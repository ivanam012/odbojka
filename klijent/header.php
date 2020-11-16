<nav class="navbar navbar-expand-lg navbar-light sticky-top topHeader">


    <div class="navbar-collapse collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">

            <li class="nav-item mx-auto">
                <a class="nav-link" href="index.php">Reprezentacije</a>
            </li>
           

            <?php
            if(session_status()!==PHP_SESSION_ACTIVE)
                session_start();
            if(!isset($_SESSION["korisnik"])){


            ?>
            <li class="nav-item mx-auto">
                <a class="nav-link" href="login.php">Uloguj se</a>
            </li>
            <li class="nav-item mx-auto">
                <a class="nav-link" href="registracija.php">Registracija</a>
            </li>
            <?php
                }
                else{
?>
            <li class="nav-item mx-auto">
                <a class="nav-link" href="igraci.php">Igraci</a>
            </li>
            <li class="nav-item mx-auto">
                <a class="nav-link" href="reprezentacija.php">Kreiraj reprezentaciju</a>
            </li>
            <li class="nav-item mx-auto">
                <a class="nav-link" href="../server/logout.php">Logout</a>
            </li>
            <?php


                }

?>
        </ul>
    </div>

</nav>