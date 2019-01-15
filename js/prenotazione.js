$(document).ready( function()
{
  $("#js-back").click( function(){
    window.history.back();
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
  var currentDay = "";
  $("#js-registrable-days input:radio[name=radio]").click( function(){
    currentDay = $(this).val()
    console.log(currentDay)
    var radioButtons = $("#myFormID input:radio[name='radioFieldName']");
    var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
    
    //hide all the tables
    $(".hours-container").hide();
    //show the table for the selected day
    var currentTable = $('#js-hours-tables-container [value="' + currentDay + '"]')
    currentTable.show(300);
  });

  

  /**
   * makes an api call to register a day
   */
  // $("#js-registrable-days button").click( function(){
  //   var giorno = $(this).parent().parent().prev().html();
  //   var orario = $(this).prev().html();
  //   $.ajax({
  //     type: "POST",
  //     url: 'app/manage-days.php',
  //     data: "action=add&giorno="+giorno+"&orario="+orario,
  //     success: function(){
  //       updateData();
  //     }
  //   });
  // })


});
