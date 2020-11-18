<?php


function validiraj($ime,$prezime,$pozicija,$pol){
    $ime=trim($ime);
    $prezime=trim($prezime);
    $pozicija=trim($pozicija);
    return preg_match('/^[A-Z][a-z]*$/', $ime) && preg_match('/^[A-Z][a-z]*$/', $prezime) && intval($pozicija) && ($pol=="M" || $pol=="Z");

}

?>