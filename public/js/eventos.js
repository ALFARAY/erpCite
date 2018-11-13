$(function()
{

    $(document).on('click', '.mat', function(e)
    {
      $("#materias").toggle("slow");
      $("#insum").hide("slow");
      $("#sumin").hide("slow");
  	});
    $(document).on('click', '.ins', function(e)
    {
      $("#insum").toggle("slow");
      $("#materias").hide("slow");
      $("#sumin").hide("slow");
  	});
    $(document).on('click', '.sum', function(e)
    {
      $("#sumin").toggle("slow");
      $("#materias").hide("slow");
      $("#insum").hide("slow");
  	});
});
$(document).ready(function(){
    $('.collapse').collapse();
});
