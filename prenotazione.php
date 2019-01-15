<?php

$config = require 'app/config/config.php';
$days = require 'app/config/days-config.php';
require_once 'app/classes/ConnectDb.php';
require_once 'app/classes/SessionManager.php';

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

//create db connection
$instance = ConnectDb::getInstance();
$pdo = $instance->getConnection();

//get registered days
$stmt = $pdo->prepare('SELECT * FROM iscrizione WHERE mail = :mail ');
$stmt->execute(['mail' => $mail]);

$regTableHtml = "";
$regTableLength = 0;
while ($row = $stmt->fetch()) {
  $regTableLength++;
  $regTableHtml .=
"<tr>
  <td>" . $row['giorno'] . "</td>
  <td>" . $row['orario'] . "</td>
  <td> <button>cancella</button></td>
<tr>";
}

if($regTableLength === 0)
{
  $prenotazioni = "<p>non hai ancora prenotato un giorno</p>";
}else
{
  $prenotazioni =
"<table id=\"js-registered-table\">
<tr>
  <th> giorno </th>
  <th> orario </th>
  <th> opzioni </th>
</tr>". $regTableHtml . "</table>";
}


$daysInfo = $days;
//set to false the hours that are already registered in the database
$stmt = $pdo->query('SELECT giorno, orario FROM iscrizione limit 200');
while ($row = $stmt->fetch())
{
  $daysInfo[$row['giorno']][$row['orario']] = false;
}

//create the html to display the days
$tabellaGiorni = "";
foreach($daysInfo as $day => $hours)
{
  $tabellaGiorni .= 
    "<button>" . $day . "</button>
     <div class=\"hidden\">";
  foreach($hours as $hour => $free)
  {
    $class = $free ? "free" : "taken";
    $button = $free ? "<button>prenota</button>" : "";
    $tabellaGiorni .=
    "<div class=\"$class\"><span>$hour</span> $button</div><br>";
  }
  $tabellaGiorni .= "</div>";
}

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
      <ul>
        <li><a class="active" href="https://www.liceobanfi.gov.it/">home</a></li>
        <li><a href="http://silviasi.it/">SilviaSi</a></li>
        <li><a href="informazioni.html">informazioni</a></li>
      </ul>
    </nav>
    <div class="container cf">

      <div class="user-table-wrapper">
        <p><a id="js-back" class="back-bt">indietro</a></p>
        <h2>le tue prenotazioni</h2>
  <?php echo $prenotazioni; ?>
      </div>

 <!-- <?php echo $tabellaGiorni ?> -->

  <div class="days-table-wrapper" id="js-registrable-days">
    <h2>prenota una data</h2>
    <div class="days-container half left-small">
  <!-- BEGIN PHP GENERATED OUTPUT -->
      <label class="control control--radio">29 gennaio 2019
        <input type="radio" name="radio" checked="checked"/>
        <div class="control__indicator"></div>
      </label>
      <label class="control control--radio">30 gennaio 2019
        <input type="radio" name="radio"/>
        <div class="control__indicator"></div>
      </label>
      <label class="control control--radio">Second radio
        <input type="radio" name="radio"/>
        <div class="control__indicator"></div>
      </label>
      <label class="control control--radio">Second radio
        <input type="radio" name="radio"/>
        <div class="control__indicator"></div>
      </label>
  <!-- END PHP GENERATED OUTPUT -->
    </div>

    <table class="hours-container half right-big">
  <!-- BEGIN PHP GENERATED OUTPUT -->
      <tr>
      <td>[09:00 - 10:05]  Gruppo 4</td>
      <td> <button>prenota</button></td> 
      </tr>
      <tr>
      <td>[09:00 - 10:05]  Gruppo 4</td>
      <td> <button>prenota</button></td>
      </tr>
  <!-- END PHP GENERATED OUTPUT -->
    </table>
  </div>

    </div>
  </body>
</html>


