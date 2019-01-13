<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>open day</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script async type="text/javascript" src="./js/main.js" ></script>
  <link rel="stylesheet" href="css/style.css" >

<?php
function phpAlert($msg) 
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}


$LSA=Array
(
    array('08 dicembre 2018',20),
    array('09 dicembre 2018',20),
    array('10 dicembre 2018',15),
    array('11 dicembre 2018',15),
    array('12 dicembre 2018',15),
    array('13 dicembre 2018',15),
    array('22 dicembre 2018',20),
    array('23 dicembre 2018',15),
    array('24 dicembre 2018',20),
    array('25 dicembre 2018',15),
    array('26 dicembre 2018',15),
    array('27 dicembre 2018',15)
);

$LS=Array
(
    array('08 dicembre 2018',20),
    array('09 dicembre 2018',20),
    array('10 dicembre 2018',15),
    array('11 dicembre 2018',15),
    array('12 dicembre 2018',15),
    array('13 dicembre 2018',15),
    array('22 dicembre 2018',20),
    array('23 dicembre 2018',15),
    array('24 dicembre 2018',20),
    array('25 dicembre 2018',15),
    array('26 dicembre 2018',15),
    array('27 dicembre 2018',15)
);

$CL=Array
(
    array('08 dicembre 2018',6),
    array('09 dicembre 2018',6),
    array('10 dicembre 2018',6),
    array('11 dicembre 2018',6),
    array('12 dicembre 2018',6),
    array('13 dicembre 2018',6),
    array('22 dicembre 2018',6),
    array('23 dicembre 2018',6),
    array('24 dicembre 2018',6),
    array('25 dicembre 2018',6),
    array('26 dicembre 2018',6),
    array('27 dicembre 2018',6)
);

// ===================================
// Variabili globali
// ===================================
$con;  // memorizza la connessione a MySql
$successo;

// ===================================
//    connessione()
// ===================================
function connessione()
{
    global $con;
	
	$ipaddress  = "127.0.0.1";
	$login = "root";
	$pwd = "";
	$dbname = "banfidb";

	$con = mysqli_connect($ipaddress, $login, $pwd, $dbname);

}

// ===================================
//    aggiustaApostrofi()
//
//  I cognomi possono contenere apostrofi - che se usati in query Sql possono
//  mandare in crisi MySql.
//  Il problema si risolve a monte - filtrando i parametri immessi dall'utenti 
//  con la funzione addslashes()
// ===================================
function aggiustaApostrofi()
{
	$_POST['data']    = addslashes($_POST['data']);
	$_POST['corso']   = addslashes($_POST['corso']);
	$_POST['nome']    = addslashes($_POST['nome']);
	$_POST['cognome'] = addslashes($_POST['cognome']);
	$_POST['telefono'] = addslashes($_POST['telefono']);
	$_POST['mail']    = addslashes($_POST['mail']);
	$_POST['scuola']  = addslashes($_POST['scuola']);
	$_POST['comune']  = addslashes($_POST['comune']);
} 

// ===================================
//    dateLSA()
// ===================================
function dateLSA()
{
    global $con;
    global $LSA;
    print "<div id=\"DIV_LSA\" hidden>".
          "<h2>Liceo Scienze Applicate:<br /></h2>" . 
          "<h2>Scegli la data:<br /></h2>";
    for($i=0;$i<count($LSA);$i++)
    {
        $giorno=$LSA[$i][0];
		
	$sql="select * from iscrizione where Data=\"$giorno\" and corso=1 ";
	$ris=mysqli_query($con, $sql);
	$prenotati=mysqli_num_rows($ris);
		
        $gg = $LSA[$i][1] - $prenotati;
        print '<a href="#" value="Paolo"' . " id=DATE_LSA_$i>" .
                "$giorno" .
                "</a> ($gg posti disponibili) <br/>";
    }
    print "</div>";
}
// ===================================
//    dateLS()
// ===================================
function dateLS()
{
    global $con;
    global $LS;
    print "<div id=\"DIV_LS\" hidden>".
          "<h2>Liceo Scientifico:<br /></h2>" . 
          "<h2>Scegli la data:<br /></h2>";
    for($i=0;$i<count($LS);$i++)
    {
        $giorno=$LS[$i][0];
		
	$sql="select * from iscrizione where Data=\"$giorno\" and corso=2 ";
	$ris=mysqli_query($con, $sql);
	$prenotati=mysqli_num_rows($ris);
		
        $gg = $LS[$i][1] - $prenotati;
        print '<a href="#" value="Paolo"' . " id=DATE_LSA_$i>" .
                "$giorno" .
                "</a> ($gg posti disponibili) <br/>";
    }
    print "</div>";
}
// ===================================
//    dateCL()
// ===================================
function dateCL()
{
    global $con;
    global $CL;
    
    print "<div id=\"DIV_CL\" hidden>".
          "<h2>Liceo Classico:<br /></h2>" . 
          "<h2>Scegli la data:<br /></h2>";
    for($i=0;$i<count($CL);$i++)
    {
        $giorno=$CL[$i][0];
		
	$sql="select * from iscrizione where Data=\"$giorno\"  and corso=3 ";
	$ris=mysqli_query($con, $sql);
	$prenotati=mysqli_num_rows($ris);
		
        $gg = $CL[$i][1] - $prenotati;
        print '<a href="#" value="Paolo"' . " id=DATE_LSA_$i>" .
                "$giorno" .
                "</a> ($gg posti disponibili) <br/>";
    }
    print "</div><br/>";
}
// ===================================
//    iscrivi()
// ===================================
function iscrivi()
{
    if( $_POST['data']=='' ||
        $_POST['corso']==''||
	$_POST['nome']=='' ||
	$_POST['cognome']=='' ||
	$_POST['telefono']==''||
	$_POST['mail']==''   ||
	$_POST['scuola']=='' ||
	$_POST['comune']==''    )
    {		
	phpAlert("I campi non sono tutti completi !!!");
	return;
    }	
	
    global $con;
    global $LSA;
    global $LS;
    global $CL;
    global $successo;
    aggiustaApostrofi();

    $sql =	" select * from iscrizione " . 
			" where Data='"  . $_POST['data']  . "'" .
			" and Corso='"   . $_POST['corso'] . "'" 	;
		
    $ris=mysqli_query($con, $sql);
    if ( ($ris = mysqli_query($con, $sql)) == FALSE) 
    {
	phpAlert("Query Fallita line=" . __LINE__);
	return;
    }
					
    $quanti=mysqli_num_rows($ris);
    $errore=1;
	
    if ($_POST['corso'] == 1) // LSA
    {
        for ($i=0; $i<count($LSA); $i++)
        {
            if ($LSA[$i][0]==$_POST['data'])
            {
                if($LSA[$i][1] - $quanti<= 0)
                {
                    phpAlert("Le prenotazioni per questo giorno sono già al completo");
                    return;
                }
            }            
        }
    }    
    else if ($_POST['corso'] == 2) // LS
    {
        for ($i=0; $i<count($LS); $i++)
        {
            if ($LS[$i][0]==$_POST['data'])
            {
                if($LS[$i][1] - $quanti<= 0)
                {
                    phpAlert("Le prenotazioni per questo giorno sono già al completo");
                    return;
                }
            }            
        }
    }    
    else if ($_POST['corso'] == 3) // CL
    {
        for ($i=0; $i<count($CL); $i++)
        {
            if ($CL[$i][0]==$_POST['data'])
            {
                if($CL[$i][1] - $quanti <= 0)
                {
                    phpAlert("Le prenotazioni per questo giorno sono già al completo");
                    return;
                }
            }            
        }
    }    

    $sql=
	 " insert into iscrizione " .
	 " (Data,Corso,Nome,Cognome,Telefono,Mail,Scuola,Comune)" .
	 " values(" .
	 "'" . $_POST['data']     . "'," .
	 "'" . $_POST['corso']     . "'," .
	 "'" . $_POST['nome']     . "'," .
	 "'" . $_POST['cognome']  . "'," .
	 "'" . $_POST['telefono'] . "'," .
	 "'" . $_POST['mail']     . "'," .
	 "'" . $_POST['scuola']   . "'," .
	 "'" . $_POST['comune']   . "')"
	;
		
	if (mysqli_query($con, $sql) == FALSE) 
	{
		phpAlert("Query Fallita line=" . __LINE__);
		return;
	}
		
	$successo=1;
}


// ================================================================================
//   Main() --- Ad ogni caricamento della pagina vengono eseguite queste istruzioni
// ================================================================================

 connessione();
 
 if(isset($_POST['iscriviti']))
		iscrivi();	
	
 
?>

</head>

<body>
<header> 

</header>
<div class="clear_both"></div>

<?php if(isset($successo)&&$successo==1){ ?>


<div class="div_successo">
<h2>
Iscrizione avvenuta con successo!<br />
Ti aspettiamo il giorno <?=$_POST['data'] ?> al Liceo Banfi per partecipare ad una lezione del corso di "<?=$array_corso[$_POST['corso']]?>".<br />
Il corso avr&agrave; una durata di 2 ore, dalle 08.05 alle 10.05.Se devi cancellare la iscrizione o modificarla comunicalo per telefono alla segreteria della scuola<br />
Il calendario completo delle iscrizioni sar&agrave; consultabile a partire dal 23 Dicembre 2018 sul sito della scuola: www.liceobanfi.gov.it<br />
</h2>

</div>
<?php } ?>

<section>

<div class="fl div_testo1">

<!--
Tre RadioButton per selezionare la scuola 
<input checked="checked" type="radio" name="liceoscelto" id="rd1" value="1"/>
-->
<form>
<label class="label_title" id="labelCorso"> Scegli il corso: <br></label>
<input type="radio" name="liceoscelto" id="rd1" value="1"/>
<label >Liceo Scientifico opzione Scienze Applicate</label><br/>
<input type="radio" name="liceoscelto" id="rd2" value="2"/>
<label >Liceo Scientifico</label><br/>
<input type="radio" name="liceoscelto" id="rd3" value="3"/>
<label >Liceo Classico</label><br/>
</form>

</section>

<section>

<?php  
    dateLSA(); 
    dateLS(); 
    dateCL(); 
?>
<!--
-->


</section>

<aside>
<div id="FORM_PRENOTA" class="fl div_testo1" hidden>
	<h2>Inserisci i tuoi dati:</h2>
	<form method="POST">
            <input name="corso" id="corso" value="1" hidden />
            <input name="data" id="data" value="start" hidden />
	<div>
	<span style="color:red">(*)</span> Cognome:<br/><input name="cognome" />
	</div>
	<div>
	<span style="color:red">(*)</span> Nome:<br/><input name="nome" />
	</div>
	<div>
	<span style="color:red">(*)</span> e-mail:<br/><input name="mail" />
	</div>
	<div>
	<span style="color:red">(*)</span> Recapito telefonico:<br/><input name="telefono" />
	</div>
	<div>
	<span style="color:red">(*)</span> Comune di residenza:<br/><input name="comune" />
	</div>
	<div>
	<span style="color:red">(*)</span> Scuola di provenienza:<br/><input name="scuola" />
	</div>
	<div><i><span style="color:red">(*)</span> = campi obbligatori</i></div>
	<div><br />
	<button name="iscriviti">iscriviti!</button>
	</div>
	</form>
</div>
<br/><br/>    
</aside>


<footer>
LICEO "A. BANFI"<br>
Via Adda, 6 - 20871 Vimercate (MB)<br>
Tel. 039/6852263 - 039/6852264<br>
Fax 039/6080805<br>
</footer>

</body>
</html>

