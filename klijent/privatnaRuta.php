<?php
 if(session_status()!==PHP_SESSION_ACTIVE)
    session_start();

if(!isset($_SESSION["korisnik_id"])){
   header("Location:index.php");
}

?>
