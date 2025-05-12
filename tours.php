<?php
require_once 'connexion.php';

$ordre = $_GET['ordre'] ?? 'asc'; 
if ($ordre === 'desc') {
    $query = "SELECT * FROM tour ORDER BY tour_price DESC";
} else {
    $query = "SELECT * FROM tour ORDER BY tour_price ASC";
}

$req = $db->prepare($query);
$req->execute();
$row = $req->fetchAll(PDO::FETCH_ASSOC);
?>



<table border="1">
    <tr>
        <th>name</th>
        <th>price</th>
        <th>description</th>
    </tr>
    <?php foreach($row as $r){?>
    <tr>
        <td><?= $r["tour_name"]?></td>
        <td><?= $r["tour_price"]?></td>
        <td><?= $r["tour_description"]?></td>
        <td>
            <a href="modifier.php?id=<?= $r["tour_id"]?>"><button>modifier</button></a>
            <a href="supprimer.php?id=<?= $r["tour_id"]?>"onclick="return confirm('Confirmer la suppression ?');"><button>supprimer</button></a>
        </td>
    </tr>
    <?php }?>
</table>
<form action="" method="get">
    <select name="ordre" id="ordre">
        <option value="desc"<?= ($ordre==='desc')? 'selected': ''?>>ordre decroissant</option>
        <option value="asc"<?= ($ordre==='asc')? 'selected': ''?>>ordre croissant</option>
    </select>
    <button type="submit">Trier</button>
</form>
