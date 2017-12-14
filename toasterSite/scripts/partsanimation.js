$(document).ready(function() {


$(".description").hide();


$( ".toasttoaster" ).mouseover(function() {
  $(".toasttoaster").animate({
    "top": "+=90px",
  }, 1000);
  
  }).mouseout(function(){
    $(".toasttoaster").animate({
        "top": "-=90px",
    }, 1000);

});


$('#pos1').click(function(){
    $('.d1').slideToggle();
});

$('#pos2').click(function(){
    $('.d2').slideToggle();
});

$('#pos3').click(function(){
    $('.d3').slideToggle();
});

$('#pos4').click(function(){
    $('.d4').slideToggle();
});


 
});