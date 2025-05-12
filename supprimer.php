<?php
    include_once 'connexion.php';
    $id=$_GET['id']?? null;
    if(!$id){
        echo'aucun id inserted';
    }
    $sql=$db->prepare('DELETE FROM tour WHERE tour_id=:id');
    $sql->execute([':id'=>$id]);
    header('location:tours.php');
?>