<?php

session_start();

unset($_SESSION["korisnik_id"]);
session_destroy();
header("Location:../klijent/index.php");

?>