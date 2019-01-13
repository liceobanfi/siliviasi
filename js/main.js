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

  function displayData(data)
  {
    var receivedData = JSON.parse(data);
    console.log(receivedData)
    var htmlOutput = "";
    for(var i=0; i<receivedData.giorno.length; i++){
      htmlOutput += '<p>giorno: '+receivedData.giorno[i]+ " orario: "+ receivedData.orario[i] + "</p>";
    }
    $('#display-prenotazioni').html(htmlOutput);
  }
    
  $("#registrati").click(
  function()
  {
    if(!validateForm())
    {
      alert("completare tutti i campi");
    } else
    {
      console.log($("#registration-form").serialize())
      $.ajax({
        type: "POST",
        url: 'app/get-user-data.php',
        data: $("#registration-form").serialize(),
        success: displayData,
        // dataType: dataType
      });
    }
  }
  );

});

