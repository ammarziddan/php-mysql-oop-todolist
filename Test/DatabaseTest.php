<?php

require_once __DIR__ . '/../Config/Database.php';

use Config\Database;

$db = Database::getConnection();

echo "Sukses membuat koneksi ke database" . PHP_EOL;
