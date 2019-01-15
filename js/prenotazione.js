$(document).ready( function()
{
  $("#js-back").click( function(){
    window.location.href = "index.php";
  });

  function updateData(){
    //TODO: this works prefectly on a small html page with no style or
    //particularly heavy resources. Make an api endpoint that returns the updated elements
    //when called with an ajax request and update only the interested elements when the design
    //gets heavier. this will also allow the page to get updates in real time, by short polling the api page.
    location.reload(); 
  }

  /**
   * makes an api call to delete a registered day
   */
  $("#js-registered-table button").click( function(){
    var giorno = $(this).parent().prev().prev().html();
    var orario = $(this).parent().prev().html();
    $.ajax({
      type: "POST",
      url: 'app/manage-days.php',
      data: "action=delete&giorno="+giorno+"&orario="+orario,
      success: function(){
        updateData();
      }
    });
  });

  /**
   * toggle days
   */
  $("#js-registrable-days input:radio[name=radio]").click( function(){
    //hide all the tables
    $(".hours-container").hide();
    //show the table for the selected day
    currentDay = $(this).val()
    var currentTable = $('#js-hours-tables-container [data-day="' + currentDay + '"]')
    currentTable.show(400);
  });


  /**
   * makes an api call to register a day
   */
  $("#js-registrable-days button").click( function(){
    var giorno = $(this).parents("table").attr("data-day");
    var orario = $(this).parent().prev().html();
    $.ajax({
      type: "POST",
      url: 'app/manage-days.php',
      data: "action=add&giorno="+giorno+"&orario="+orario,
      success: function(){
        updateData();
      }
    });
  })


});
