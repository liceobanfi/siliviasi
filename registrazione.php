<?php

$config = require 'app/config/config.php';
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

$instance = ConnectDb::getInstance();
$pdo = $instance->getConnection();

/* $stmt = $pdo->prepare('SELECT * FROM iscrizione WHERE mail = :mail '); */
/* $stmt->execute(['mail' => $_POST['mail']]); */

/* $query = "select * from iscrizione WHERE mail = 'rossi@gmail.com'"; */
/* $stmt = $pdo->query($query); */

/* $output = array(); */

/* while ($row = $stmt->fetch()) { */
/*   $output[] = [ */
/*     'giorno' => $row['giorno'], */
/*     'orario' => $row['orario'] */
/*    ]; */
/* } */

//TODO: fare che questa variabile contenga i dati ottenuti dalla query per ottenere le registrazioni
//oppure la scritta -nessun giorno registrato- se non è stato trovato niente
$registrazioni = "<p>nono hai ancora registrato nessun giorno</p>";
//TODO: fare che questa varaiblie contenga tutti i giorni disponibili in una bella tabella html
$tabellaGiorni = "";

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


