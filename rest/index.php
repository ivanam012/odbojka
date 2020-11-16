<?php
require 'flight/Flight.php';
require 'jsonindent.php';
//registracija baze Database
Flight::register('db', 'Database', array('odbojka'));

Flight::route('/', function(){
	die("Izabereti neku od ruta...");
});
Flight::route('GET /reprezentacija',function(){
   
    header("Content-Type: application/json; charset=utf-8");    
    $db = Flight::db();
    
	$db->ExecuteQuery("select * from reprezentacija");

    $niz =  sendData($db);
    
	echo indent(json_encode($niz));
});
Flight::route('GET /reprezentacija/@godina/igraci/@pol',function($godina,$pol){
   
    header("Content-Type: application/json; charset=utf-8");    
    $db = Flight::db();
    
	$db->ExecuteQuery("select i.*, a.prvi_tim from reprezentacija r inner join angazovanje a on (r.id=a.reprezentacija) inner join igrac i on (i.id=a.igrac) where r.godina=".$godina." and i.pol='".$pol."'");

    $niz =  sendData($db);
    
	echo indent(json_encode($niz));
});
Flight::route('GET /reprezentacija/@id',function($id){
    header("Content-Type: application/json; charset=utf-8");    
    $db = Flight::db();
    $db->ExecuteQuery("select * from reprezentacija where id=".$id);
    
    $red = $db->getResult()->fetch_object();
	echo indent(json_encode($red));
});


Flight::route('POST /reprezentacija',function(){
    header("Content-Type: application/json; charset=utf-8");    
    $db = Flight::db();
    //prima body parametre
    $podaci = file_get_contents('php://input');
    //pretvara JSON tekst 
    //u asocijativni niz
    $niz = json_decode($podaci,true);
    if(isset($niz["godina"]) && isset($niz["medalja"])){
        $db->ExecuteQuery("insert INTO reprezentacija(godina,medalja) VALUES (".$niz["godina"].",".$niz["medalja"].")");
    }else{
        echo "Losi ulazni parametri";
    }
    echo ($db->getResult())?"uspeh":"greska";
	
});
Flight::route('PUT /reprezentacija/@id',function($id){
    header("Content-Type: application/json; charset=utf-8");    
    $db = Flight::db();
    $podaci = file_get_contents('php://input');
    $niz = json_decode($podaci,true);
    $flag=0;
    if(isset($niz["godina"]) ){
        $flag=1;
        $db->ExecuteQuery("update reprezentacija SET godina=".$niz["godina"]." WHERE id=".$id);
    }if(isset($niz["medalja"])){
        $flag=1;
        $db->ExecuteQuery("update reprezentacija SET medalja=".$niz["medalja"]." where id=".$id);
    }
    if($flag==0){
        echo "Losi ulazni parametri";
        return;
    }
    echo ($db->getResult())?"uspeh":"greska";
	
});
Flight::route('delete /reprezentacija/@id',function($id){
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $db->ExecuteQuery("DELETE FROM reprezentacija WHERE id=".$id);

    echo ($db->getResult())?"uspeh":"greska";
});


Flight::route('GET /igrac',function(){
    header("Content-Type: application/json; charset=utf-8");    
    $db = Flight::db();
	$db->ExecuteQuery("select i.*, p.naziv as 'pozicija_naziv' from igrac i inner join pozicija p on (i.pozicija=p.id)");

	echo indent(json_encode(sendData($db)));
});

Flight::start();


    function sendData($db){
        $result=$db->getResult();
        if(!$result){
            $niz["status"]=false;
        }else{
            $niz["status"]=true;
            $niz["data"]=[];
            while ($red = $result->fetch_object()){
                $niz["data"][]=$red;
            }
        }
        return $niz;
    }
?>
