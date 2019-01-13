<?php

$config = require 'config/config.php';
require_once 'classes/connectDb.php';


$instance = ConnectDb::getInstance();
$pdo = $instance->getConnection();

/* $stmt = $pdo->prepare('SELECT * FROM iscrizione WHERE mail = :mail '); */
/* $stmt->execute(['mail' => $_POST['mail']]); */

$query = "select * from iscrizione WHERE mail = 'rossi@gmail.com'";
$stmt = $pdo->query($query);

$gg = array();
$or = array();

$result = [];
while ($row = $stmt->fetch()) {
  $gg[] = $row['giorno'];
  $or[] = $row['orario'];
}

echo json_encode(
  ['giorno'=>$gg,
  'orario' => $or
]);
