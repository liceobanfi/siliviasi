$(document).ready( function()
{
  function validateForm()
  {
    if($("input[name='scuola']").val() === '') return false;
    if($("input[name='citta']").val() === '') return false;
    if($("input[name='docente']").val() === '') return false;
    var mail = $("input[name='mail']").val();
    var mailValidationRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(! mailValidationRegex.test(String(mail).toLowerCase()) ) return false;
    if($("input[name='telefono']").val() === '') return false;
    return true;
  }

  $("#js-registrati").click(
  function()
  {
    if(!validateForm())
    {
      alert("completare tutti i campi");
    } else
    {
      window.location.href = 'prenotazione.php?'+
        $("#js-registration-form").serialize();
    }
  }
  );

});

