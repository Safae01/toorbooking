<?php
    $sdn='mysql:host=localhost;dbname=EasyTourBooking';
    $user='root';
    $mdps="";
    try{
        $db= new PDO($sdn,$user,$mdps);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo"error".$e->getMessage();
    }
?>