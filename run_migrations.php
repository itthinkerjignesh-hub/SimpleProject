<?php

require_once __DIR__ . '/config/database.php';

try {

    $migrationPath = __DIR__ . '/database/migrations/';

    $files = scandir($migrationPath);

    foreach ($files as $file) {

        if (pathinfo($file, PATHINFO_EXTENSION) !== 'sql') {
            continue;
        }

        $check = $pdo->prepare(
            "SELECT COUNT(*) FROM migrations WHERE migration_name = ?"
        );

        $check->execute([$file]);

        if ($check->fetchColumn() > 0) {

            echo "Skipping: $file\n";

            continue;
        }

        echo "Running: $file\n";

        $sql = file_get_contents($migrationPath . $file);

        $pdo->exec($sql);

        $insert = $pdo->prepare(
            "INSERT INTO migrations (migration_name) VALUES (?)"
        );

        $insert->execute([$file]);

        echo "Completed: $file\n";
    }

} catch (PDOException $e) {

    die("Migration Failed: " . $e->getMessage());
}