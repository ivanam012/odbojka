<?php
include_once "broker.php";
include 'validacijaIgraca.php';
if(session_status()!==PHP_SESSION_ACTIVE)
    session_start();
$db=Broker::getBroker();
$firstName=$_POST['firstName'];
$pozicija=$_POST['pozicija'];
$lastName=$_POST['lastName'];
$pol=$_POST['pol'];
if(!validiraj($firstName,$lastName,$pozicija,$pol)){
    echo 'igrac nije validan';
    exit;
}
$db->izvrsiUpit("insert into igrac(ime,prezime,korisnik,pozicija,pol) values ('".$firstName."','".$lastName."',".$_SESSION["korisnik_id"].",".$pozicija.",'".$pol."')");
echo ($db->getRezultat())?'ok':$db->getMysqli()->error;



?>