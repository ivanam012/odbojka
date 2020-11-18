<?php
include_once "broker.php";
$db=Broker::getBroker();

$godina=$_POST["godina"];
$medalja=$_POST["medalja"];
$prviTim=$_POST["prviTim"];
$izmene=$_POST["izmene"];
$pol=$_POST["pol"];
if($medalja=='0 '|| $medalja==0){
    $medalja='NULL';
}
if(!intval($godina)){
    echo 'reprezentacija nije validna';
}
$db->izvrsiUpit("select * from reprezentacija r inner join angazovanje a on (r.id=a.reprezentacija) inner join igrac i on (i.id=a.igrac) where r.godina=".$godina." and i.pol='".$pol."'");
if(!$db->getRezultat()){
    
    echo $db->getMysqli()->error;
   
    exit;
}
$obj=$db->getRezultat()->fetch_object();
if(isset($obj)){
    echo 'Reprezentacija za datu godinu i pol vec postoji';
    exit;
}


$db->izvrsiUpit("insert into reprezentacija(godina,medalja) values (".$godina.",".$medalja.") ");
if(!$db->getRezultat()){
    
    echo $db->getMysqli()->error;
    exit;
}else{
    
    $reprezentacijaId=$db->getMysqli()->insert_id;
    $db->getMysqli()->commit();
   
    $db->getMysqli()->autocommit(FALSE);
$db->getMysqli()->begin_transaction();
    foreach($prviTim as $element){
        $db->izvrsiUpit("insert into angazovanje(igrac ,reprezentacija,prvi_tim) values (".$element.",".$reprezentacijaId.",1) ");
        if(!$db->getRezultat()){
    
            echo $db->getMysqli()->error;
            $db->getMysqli()->rollback();
            exit;
        }
    }
    foreach($izmene as $element){
        $db->izvrsiUpit("insert into angazovanje(igrac ,reprezentacija,prvi_tim) values (".$element.",".$reprezentacijaId.",0) ");
        if(!$db->getRezultat()){
    
            echo $db->getMysqli()->error;
            $db->getMysqli()->rollback();
            exit;
        }
    }
}


$db->getMysqli()->commit();
echo 'Reprezentacija je uspesno sacuvana';

?>