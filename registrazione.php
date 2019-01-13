<?php

$config = require 'app/config/config.php';
$days = require 'app/config/days-config.php';
require_once 'app/classes/connectDb.php';

//validates received output, and redirects to the login if something fails
$error = 0;
$error += !(isset($_GET['scuola']) && strlen($_GET['scuola']) < 150 );
$error += !(isset($_GET['citta']) && strlen($_GET['citta']) < 150 );
$error += !(isset($_GET['docente']) && strlen($_GET['docente']) < 150 );
$error += !(isset($_GET['mail']) && filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL) && strlen($_GET['mail']) < 254 );
$error += !(isset($_GET['telefono']) && strlen($_GET['telefono']) < 30 );
if($error === 0)
{
  $scuola = filter_var(htmlSpecialChars($_GET['scuola']), FILTER_SANITIZE_STRING);
  $citta = filter_var(htmlSpecialChars($_GET['citta']), FILTER_SANITIZE_STRING);
  $docente = filter_var(htmlSpecialChars($_GET['docente']), FILTER_SANITIZE_STRING);
  $mail = filter_var($_GET['mail'], FILTER_SANITIZE_EMAIL);
  $telefono = filter_var(htmlSpecialChars($_GET['telefono']), FILTER_SANITIZE_STRING);
}else
{
  header("Location: index.php?error=1");
  die();
}

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
  $registrazioni = "<p>nono hai ancora registrato nessun giorno</p>";
}else
{
  $registrazioni =
"<table>
<tr>
  <th> giorno </th>
  <th> orario </th>
  <th> opzioni </th>
</tr>". $regTableHtml . "</table>";
}


$daysInfo = $days;
//set to false the hours that are already registered in the database
$stmt = $pdo->query('SELECT giorno, orario FROM iscrizione');
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
  foreach($hours as $hour => $taken)
  {
    $class = $taken ? "taken" : "free";
    $tabellaGiorni .=
    "<a class=\"$class\">$hour<button>prenota</button></a>";
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script async type="text/javascript" src="./js/main.js" ></script>
    <link rel="stylesheet" href="./css/styl.css" >
  </head>
  <body>
    <button id="js-back">indietro</button>
    <div class="user-table-wrapper">
      <h1>le tue registrazioni</h1>
<?php echo $registrazioni; ?>
    </div>
    <div class="days-table-wrapper">
      <h1>selezionare una data</h1>
<?php echo $tabellaGiorni ?>
    </div>
  </body>
</html>


