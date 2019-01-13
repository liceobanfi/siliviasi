$(document).ready( function()
{
  $("#js-back").click( function(){
    window.history.back();
  });

  /**
   * makes an api call to delete a registered day
   */
  $("#js-registered-table button").click( function(){
    var giorno = $(this).parent().prev().prev().html();
    var orario = $(this).parent().prev().html();
    //questo è complicato da spiegare, ma serve
    var that = $(this);
    $.ajax({
      type: "POST",
      url: 'app/manage-days.php',
      data: "action=delete&giorno="+giorno+"&orario="+orario,
      success: function(){
        // that.parent().parent().remove();
        location.reload(); 
      }
    });
  });
  

  /**
   * makes an api call to register a day
   */
  $("#js-registrable-days button").click( function(){
    var giorno = $(this).parent().parent().prev().html();
    var orario = $(this).prev().html();
    //questo è complicato da spiegare, ma serve
    var that = $(this);
    $.ajax({
      type: "POST",
      url: 'app/manage-days.php',
      data: "action=add&giorno="+giorno+"&orario="+orario,
      success: function(){
        // that.remove();
        location.reload(); 
      }
    });
  })


});
