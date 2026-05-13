<?php

require_once 'config/database.php';

$query = "SELECT * FROM users";

$stmt = $pdo->prepare($query);

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>

    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 600px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>

    <h2>User List Hereee....</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>

        <?php foreach ($users as $user): ?>

            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

</body>
</html>
