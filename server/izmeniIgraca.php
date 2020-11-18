<?php
include_once "broker.php";
include 'validacijaIgraca.php';

$db=Broker::getBroker();
$firstName=$_POST['firstName'];
$pozicija=$_POST['pozicija'];
$lastName=$_POST['lastName'];
$id=$_POST['id'];
$pol=$_POST['pol'];
if(!validiraj($firstName,$lastName,$pozicija,$pol) || !isset($id) || !intval($id)){
    echo 'igrac nije validan';
    exit;
}
$db->izvrsiUpit("update igrac set ime='".$firstName."', prezime='".$lastName."', pozicija=".$pozicija.", pol='".$pol."' where id=".$id);
echo ($db->getRezultat())?'ok':$db->getMysqli()->error;



?>