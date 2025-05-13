<?php
    require_once 'connexion.php';

    $sql = "SELECT c.*, b.book_date, t.tour_id,t.tour_name
    FROM client c JOIN book b on c.client_id = b.client_id JOIN tour t on t.tour_id = b.tour_id 
    WHERE b.book_date >= CURRENT_DATE;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $sql = "SELECT count(*) as total FROM book where book_date >= CURRENT_DATE;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $total = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Tour Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <h3> le nombre total des réservations: <?= $total['total']?>   </h3>
    <h1>les réservations à venir avec les détails</h1>

    <table>
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Date de réservation</th>
                <th>Nom Client</th>
                <th>Email</th>
                <th>téléphone</th>
                <th>Nom du Tour</th>
            </tr>
        </thead>      
        <tbody>
        <?php foreach($reservations as $reservation): ?>
            <tr>
                <td><?= htmlspecialchars($reservation['client_id']."-".($reservation['tour_id'])) ?></td>
                <td><?= htmlspecialchars($reservation['book_date']) ?></td>
                <td><?= htmlspecialchars($reservation['client_fullname']) ?></td>
                <td><?= htmlspecialchars($reservation['client_email']) ?></td>
                <td><?= htmlspecialchars($reservation['client_phone']) ?></td>
                <td><?= htmlspecialchars($reservation['tour_name']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>