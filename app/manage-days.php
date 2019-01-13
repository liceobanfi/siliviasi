<?php

$config = require 'config/config.php';
require_once 'classes/connectDb.php';
require_once 'classes/SessionManager.php';

$session = new SessionManager();
echo $_SESSION['mail'];


//TODO: questa pagina deve aggiungere o rimuovere i giorni che riceve tramite post



/* $instance = ConnectDb::getInstance(); */
/* $pdo = $instance->getConnection(); */

/* /1* $stmt = $pdo->prepare('SELECT * FROM iscrizione WHERE mail = :mail '); *1/ */
/* /1* $stmt->execute(['mail' => $_POST['mail']]); *1/ */

/* $query = "select * from iscrizione WHERE mail = 'rossi@gmail.com'"; */
/* $stmt = $pdo->query($query); */

/* $output = array(); */

/* while ($row = $stmt->fetch()) { */
/*   $output[] = [ */
/*     'giorno' => $row['giorno'], */
/*     'orario' => $row['orario'] */
/*    ]; */
/* } */

/* echo json_encode($output); */
