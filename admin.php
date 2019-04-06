<?php

$config = require 'app/config/config.php';
require_once 'app/classes/HtmlGenerator.php';

//get the admin id
if(!isset($_GET['id']) || strlen($_GET['id']) > 100 ){
  header("HTTP/1.0 400");
  die("<h1>credenziali di accesso non valide</h1>. contattare l'amministratore del sito per assistenza");
}
$U_id = $_GET['id'];

//check if the id is valid, by comparing it with the hash stored in the config file
if(!password_verify($U_id, $config['adminId'])){
  header("HTTP/1.0 400");
  die("<h1>credenziali di accesso non valide</h1>. contattare l'amministratore del sito per assistenza");
}

//create html tables with the user data
$allReservationsTable = HtmlGenerator::allReservationsTable();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>admin page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="./css/prenotazione.css" >
  </head>
  <body>
    <div>
      <nav>
        <a href="https://www.liceobanfi.gov.it/"><img class="logo"  src="resources/logo4.png" /></a>
        <ul>
          <li class="ghost"><a></a></li>
          <li><a href="https://www.liceobanfi.gov.it/">home</a></li>
          <li><a href="http://silviasi.it/">SilviaSi</a></li>
          <li><a href="">informazioni</a></li>
        </ul>
      </nav>

      <div class="page-wrapper">
        <h1>admin</h1>
        <h2>lista prenotazioni effettuate</h2>
        <div class="user-table-wrapper">
        <!-- BEGIN PHP GENERATED OUTPUT -->
        <?php echo $allReservationsTable; ?>
        <!-- END PHP GENERATED OUTPUT -->
        </div>
      </div>
    </div>

    <div class="footer">
      <p>&copy; 2018-<?php echo date("Y"); ?> Liceo A. Banfi | Pagina realizzata dagli studenti 
dell'indirizzo scienze applicate nell'ambito del progetto $nomeProgetto<br>
      <a href="https://github.com/liceobanfi/siliviasi">visita il codice</a> | 
      <a href="https://www.liceobanfi.gov.it/note-legali/privacy">privacy</a> |
      <a href="">info</a> </p>
    </div>

  </body>
</html>



