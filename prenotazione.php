<?php

$config = require 'app/config/config.php';
$days = require 'app/config/days-config.php';
require_once 'app/classes/ConnectDb.php';
require_once 'app/classes/SessionManager.php';
require_once 'app/classes/HtmlGenerator.php';

//validates received output, and redirects to the login if something fails
$error = 0;
$error += !(isset($_GET['scuola']) && strlen($_GET['scuola']) < 150 );
$error += !(isset($_GET['citta']) && strlen($_GET['citta']) < 30 );
$error += !(isset($_GET['docente']) && strlen($_GET['docente']) < 150 );
$error += !(isset($_GET['mail']) && filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL) && strlen($_GET['mail']) < 254 );
$error += !(isset($_GET['telefono']) && strlen($_GET['telefono']) < 30 );
if($error !== 0)
{
  header("Location: index.php?error=1");
  die();
}

$scuola = filter_var(htmlSpecialChars($_GET['scuola']), FILTER_SANITIZE_STRING);
$citta = filter_var(htmlSpecialChars($_GET['citta']), FILTER_SANITIZE_STRING);
$docente = filter_var(htmlSpecialChars($_GET['docente']), FILTER_SANITIZE_STRING);
$mail = filter_var($_GET['mail'], FILTER_SANITIZE_EMAIL);
$telefono = filter_var(htmlSpecialChars($_GET['telefono']), FILTER_SANITIZE_STRING);

//store the user data in a session variable
$session = new SessionManager();
$_SESSION = array_merge($_SESSION, [
  'scuola' => $scuola,
  'citta' => $citta,
  'docente' => $docente,
  'mail' => $mail,
  'telefono' => $telefono,
]);
$session->setValid();

//create html tables with the user data
$reservationsTable = HtmlGenerator::reservationsTable($mail);
$daysRadioList = HtmlGenerator::daysRadioList();
$hoursTables = HtmlGenerator::hoursTables();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>open day</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="./js/jquery-3.3.1-min.js"></script>
    <script async type="text/javascript" src="./js/prenotazione.js" ></script>
    <link rel="stylesheet" href="./css/prenotazione.css" >
  </head>
  <body>
    <nav>
      <a href="https://www.liceobanfi.gov.it/"><img class="logo"  src="resources/logo4.png" /></a>
      <ul>
        <li class="ghost"><a></a></li>
        <li><a class="active" href="https://www.liceobanfi.gov.it/">home</a></li>
        <li><a href="http://silviasi.it/">SilviaSi</a></li>
        <li><a href="informazioni.html">informazioni</a></li>
      </ul>
    </nav>
    <div class="page-wrapper cf">

      <div class="user-table-wrapper">
        <p><a id="js-back" class="back-bt">indietro</a></p>
        <h2>le tue prenotazioni</h2>
  <!-- BEGIN PHP GENERATED OUTPUT -->
  <?php echo $reservationsTable; ?>
  <!-- END PHP GENERATED OUTPUT -->
      </div>

      <div class="days-table-wrapper" id="js-registrable-days">
        <h2>prenota una data</h2>
        <div class="days-container half left-small">
      <!-- BEGIN PHP GENERATED OUTPUT -->
      <?php echo $daysRadioList ?>
      <!-- END PHP GENERATED OUTPUT -->
        </div>

        <div id="js-hours-tables-container">
      <!-- BEGIN PHP GENERATED OUTPUT -->
      <?php echo $hoursTables ?>
      <!-- END PHP GENERATED OUTPUT -->
        </div>
      </div>

    </div>
  </body>
</html>


