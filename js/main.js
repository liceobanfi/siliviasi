$(document).ready( function()
{
  function validateForm()
  {
    if($("input[name='scuola']").val() === '') return false;
    if($("input[name='citta']").val() === '') return false;
    if($("input[name='docente']").val() === '') return false;
    if($("input[name='mail']").val() === '') return false;
    if($("input[name='telefono']").val() === '') return false;
    return true;
  }

  $("#registrati").click(
  function()
  {
    if(!validateForm())
    {
      alert("completare tutti i campi");
    } else
    {
      window.location.href = 'registrazione.php?'+
        $("#registration-form").serialize();
    }
  }
  );

});

