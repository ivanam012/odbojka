<?php
    include_once "broker.php";
    if(session_status()!==PHP_SESSION_ACTIVE)
        session_start();
    $db=Broker::getBroker();
    $username=$_POST["username"];
    $password=$_POST["password"];
  
    if(!isset($username) || !isset($password)){
       echo 'Nisu prosledjeni svi podaci';
    }else{
        
        $db->izvrsiUpit("select username, ime, prezime, id from korisnik where username='".$username."' and sifra='".$password."'");
        $rezultat=$db->getRezultat();
        if(!$rezultat){
            echo "greska baza";
            return ;
        }
        $user=$rezultat->fetch_object();
        if(!isset($user)){
            echo "korisnik ne postoji";
        }else{
            $_SESSION["korisnik_id"]=$user->id;
            echo "ok";
        }
    }
?>