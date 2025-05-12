<?php
    require_once 'connexion.php';
    $id = $_GET['id'] ?? null;
    if(!$id){
        echo'aucun id inserted';
        exit;
    }

    $req=$db->prepare("SELECT * FROM tour WHERE tour_id=:id");
    $req->execute([
        ':id'=>$id
    ]);
    $tour=$req->fetch(PDO::FETCH_ASSOC);
    if (!$tour) {
        echo "Tour non trouvé.";
        exit;
    }

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
            $sql=$db->prepare("UPDATE tour SET tour_name= :name, tour_price = :prix, tour_description = :desc WHERE tour_id = :id");
            $sql->execute([
            ':name'=> $name,
            ':prix'=> $prix,
            ':desc'=> $desc,
            ':id'=>$id
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
    <input type="text" name="nom" id="nom" placeholder="nom" value="<?= htmlspecialchars($tour["tour_name"]) ?>">
    
    <input type="number" name="prix" id="prix" placeholder="prix" value="<?= htmlspecialchars($tour["tour_price"]) ?>">
    
    <input type="text" name="desc" id="desc" placeholder="description" value="<?= htmlspecialchars($tour["tour_description"]) ?>">
    
    <button type="submit">modifier</button>
</form>

</body>
</html>