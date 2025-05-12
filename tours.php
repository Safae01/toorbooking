<?php
    require_once 'connexion.php';
        $req=$db->prepare("SELECT * FROM tour");
        $req->execute();
        $row=$req->fetchAll(PDO::FETCH_ASSOC);
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
