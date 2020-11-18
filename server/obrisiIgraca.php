<?php
include_once "broker.php";

$db=Broker::getBroker();
$id=$_POST['id'];
if(!intval($id)){
    echo 'Id mora biti broj';
    exit;
}
$db->izvrsiUpit("delete from igrac where id=".$id);
echo ($db->getRezultat())?'ok':$db->getMysqli()->error;



?>