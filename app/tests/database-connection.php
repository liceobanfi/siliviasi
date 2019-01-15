<?php

/**
 * simple tests for the database connection
 * this project doesn't have a test case system integrated yet.
 */
$config = require '../config/config.php';
require_once '../classes/ConnectDb.php';

$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
echo var_dump($conn);

$stmt = $conn->query('SELECT giorno from iscrizione limit 10');
while ($row = $stmt->fetch()) {
  echo "<br>";
  echo var_dump($row);
}

