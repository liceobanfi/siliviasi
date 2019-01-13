$(document).ready( function()
{
$("#rd1").click(
function()
{
    $("#DIV_LSA").show();
    $("#DIV_LS").hide();
    $("#DIV_CL").hide();
    $("#FORM_PRENOTA").hide();
    $("input#corso").val("1");
}
);

$("#rd2").click(
function()
{
    $("#DIV_LSA").hide();
    $("#DIV_LS").show();
    $("#DIV_CL").hide();
    $("#FORM_PRENOTA").hide();
    $("input#corso").val("2");
}
);

$("#rd3").click(
function()
{
    $("#DIV_LSA").hide();
    $("#DIV_LS").hide();
    $("#DIV_CL").show();
    $("#FORM_PRENOTA").hide();
    $("input#corso").val("3");
}
);
/*
$("a#DATE_LSA_1").click(
function()
{
    $gg = $(this).text();
    alert($gg);
}
);
*/

$("a").click(
function()
{
    $gg = $(this).text();
    $("#FORM_PRENOTA").show();
    $("input#data").val($gg);
}        
);


$("input#data").click(
function()
{
    $gg=$(this).val();
    alert($(this).val());
    $(this).val("Nuovo valore");
}        
);


}); /* Ready */
