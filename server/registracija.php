<?php
    include_once "broker.php";
    
    $db=Broker::getBroker();
    $username=$_POST["username"];
    $password=$_POST["password"];
    $firstName=$_POST["firstName"];
    $lastName=$_POST["lastName"];
  
    if(!isset($username) || !isset($password)){
       
    }else{
        
        $db->izvrsiUpit("select username, ime, prezime, id from korisnik where username='".$username."'");
        $rezultat=$db->getRezultat();
        if(!$rezultat){
            echo "greska u bazi";
            return ;
        }
        $user=$rezultat->fetch_object();
        if(isset($user)){
            echo "korisnik vec postoji postoji";
        }else{
            $db->izvrsiUpit("insert into korisnik (username,sifra,ime,prezime) values ('".$username."','".$password."','".$firstName."','".$lastName."')");
            $rezultat=$db->getRezultat();
            if(!$rezultat){
                echo "greska u bazi";
                return ;
            }
            include 'login.php';
        }
    }
?>