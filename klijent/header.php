<nav class="navbar navbar-expand-lg navbar-light sticky-top topHeader">


    <div class="navbar-collapse collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
        <li class="nav-item mx-auto">
                <label class="nav-link " id='vreme'></label>
            </li>
            <li class="nav-item mx-auto">
                <a class="nav-link" href="index.php">Reprezentacije</a>
            </li>
           

            <?php
            if(session_status()!==PHP_SESSION_ACTIVE)
                session_start();
            if(!isset($_SESSION["korisnik_id"])){


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
     $(document).ready(function () {
     
      $.getJSON('http://www.7timer.info/bin/api.pl?lon=113.17&lat=23.09&product=civillight&output=json', function (data) {

        let vreme = data.dataseries[0];
        $("#vreme").html(` Dnevna temperatura:
          Min: ${vreme.temp2m.min} 
          Maks: ${vreme.temp2m.max}
         `)

      })
    })


</script>