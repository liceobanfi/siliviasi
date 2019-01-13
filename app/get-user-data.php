<?php

$config = require 'config/config.php';
require_once 'classes/connectDb.php';


$instance = ConnectDb::getInstance();
$pdo = $instance->getConnection();

/* $stmt = $pdo->prepare('SELECT * FROM iscrizione WHERE mail = :mail '); */
/* $stmt->execute(['mail' => $_POST['mail']]); */

$query = "select * from iscrizione WHERE mail = 'rossi@gmail.com'";
$stmt = $pdo->query($query);

$output = array();

while ($row = $stmt->fetch()) {
  $output[] = [
    'giorno' => $row['giorno'],
    'orario' => $row['orario']
   ];
}

echo json_encode($output);
