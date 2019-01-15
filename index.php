<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>prenotazione</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="./js/jquery-3.3.1-min.js"></script>
    <script async type="text/javascript" src="./js/index.js" ></script>
    <link rel="stylesheet" href="./css/index.css" >
  </head>
  <body>
    <nav>
      <img class="logo" src="resources/logo4.png" />
      <ul>
        <li class="ghost"><a></a></li>
        <li><a href="https://www.liceobanfi.gov.it/">home</a></li>
        <li><a href="http://silviasi.it/">SilviaSi</a></li>
        <li><a href="">informazioni</a></li>
      </ul>
    </nav>
    <div class="form-wrapper">
      <h1>SilviaSi</h1>
      <form id="js-registration-form" class="cf" >
      <h2>Prenotazione visite guidate 29-30-31/1 1/2</h2>
      <p><strong>accesso riservato ai docenti. </strong> Inserire i propri dati per prenotare un giorno o modificare 
le proprie prenotazioni</p>
      <input name="scuola" placeholder="istituto" />
      <input name="citta" placeholder="città" />
      <input name="docente" placeholder="docente responsabile" />
      <input name="mail" placeholder="mail" />
      <input name="telefono" placeholder="telefono" />
<!--      <div>
      <span style="color:red">(*)</span> Recapito telefonico:<br/><input name="telefono" />
      </div>
-->
      <p class="messages" id="js-messages">non valida qwe qwe qwe qwe </p>
      <input id="js-registrati" type="button" value="avanti" class="input-submit">
      </form>
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


