$(document).ready( function()
{
  function validateForm()
  {
    if($("input[name='scuola']").val() === '') return 'il campo scuola è obbligatorio';
    if($("input[name='citta']").val() === '') return 'il campo città è obbligatorio';
    if($("input[name='docente']").val() === '') return 'il campo docente è obbligatorio';
    var mail = $("input[name='mail']").val();
    var mailValidationRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(! mailValidationRegex.test(String(mail).toLowerCase()) ) return 'inserire una mail valida';
    if($("input[name='telefono']").val() === '') return 'inserire un numero di telefono';
    return false;
  }

  function errorMessage(msg){
    $("#js-messages").text(msg);
    $("#js-messages").show(100);
  }

  $("#js-registrati").click(
  function()
  {
    if(validateForm())
    {
      errorMessage(validateForm());
    } else
    {
      window.location.href = 'prenotazione.php?'+
        $("#js-registration-form").serialize();
    }
  }
  );

});

