<?php

/**
 * api endpoint for the prenotazione.php front end
 *
 * this page receives a GET requests from the prenotazione.php front end
 * when the user subscribes or cancel the subscription to a day.
 *
 * parameters received:
 * action string - can be either "add" or "delete"
 * giorno string - the day the user wants to subscribe to
 * orario string - the hour the user wants to subscrbe to
 */
$days = require 'config/days-config.php';
require_once 'classes/ConnectDb.php';
require_once 'classes/SessionManager.php';

//initialize session, and die if the user is not in session
$session = new SessionManager();
if(!$session->isValid())
{
  header("HTTP/1.0 400 invalid session");
  die();
}

//validates received output, and die if something fails
$error = 0;
$error += !(isset($_POST['action']) && ($_POST['action'] === "add" || $_POST['action'] === "delete"));
$error += !(isset($_POST['giorno']) && strlen($_POST['giorno']) < 50 );
$error += !(isset($_POST['orario']) && strlen($_POST['orario']) < 50 );
if($error !== 0)
{
  header("HTTP/1.0 400 invalid data");
  die();
}

//check that the selected days actually exist
$giorno = htmlspecialchars($_POST['giorno']);
$orario = htmlspecialchars($_POST['orario']);
if (!(array_key_exists($giorno, $days) && array_key_exists($orario, $days[$giorno])) )
{
  header("HTTP/1.0 400 invalid selection");
  die();
}

//initialize the db connection, and add or remove the subscription
$instance = ConnectDb::getInstance();
$pdo = $instance->getConnection();

//prepare the data to store in the database
$info = "";
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip = $_SERVER['HTTP_CLIENT_IP'];
}else{
  $ip = $_SERVER['REMOTE_ADDR'];
}
$forwarded = "";
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $forwarded = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
$timestamp = time();

$action = $_POST['action'];
if($action === "add")
{
  $stmt = $pdo->prepare(
    'insert  into
    `iscrizione`(`giorno`,`orario`,`scuola`,`citta`,`docente`,`mail`,`telefono`,`info`,`ip`,`forwarded_host_ip`,`timestamp` ) values 
    (:giorno, :orario, :scuola, :citta, :docente, :mail, :telefono, :info, :ip, :forwarded, :timestamp) '
  );
  $stmt->execute( [
  'scuola' => $_SESSION['scuola'],
  'giorno' => $giorno,
  'orario' => $orario,
  'citta' => $_SESSION['citta'],
  'docente' => $_SESSION['docente'],
  'mail' => $_SESSION['mail'],
  'telefono' => $_SESSION['telefono'],
  'info' => $info,
  'ip' => $ip,
  'forwarded' => $forwarded,
  'timestamp' => $timestamp
  ]);

  $affectedRows = $stmt->rowCount();
  echo $affectedRows;
}else
{
  $stmt = $pdo->prepare(
    'delete from `iscrizione`
    where giorno = :giorno and orario = :orario and mail = :mail'
  );
  $stmt->execute( [
  'giorno' => $giorno,
  'orario' => $orario,
  'mail' => $_SESSION['mail']
  ]);

  $affectedRows = $stmt->rowCount();
  echo $affectedRows;
}

