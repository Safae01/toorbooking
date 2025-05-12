<?php
    require_once 'connexion.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name=$_POST['nom'];
        $prix=$_POST['prix'];
        $desc=$_POST['desc'];
        
        if(empty($name)){
            echo'veuillez entrer le nom';
        }elseif(empty($prix)){
            echo'veuillez entrer le prix du tour';
        }elseif (empty($desc)) {
            echo'veuillez entrer la description';
        }else{
            $sql=$db->prepare("INSERT INTO tour (tour_name,tour_price,tour_description) VALUES (:nom,:prix,:desc)");
            $sql->execute([
            ':nom'=> $name,
            ':prix'=> $prix,
            ':desc'=> $desc
        ]);
        header('location:tours.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="nom" id="nom" placeholder="nom">
        <input type="number" name="prix" id="prix" placeholder="prix">
        <input type="text" name="desc" id="desc" placeholder="descritption">
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>