$(document).ready(function(){

  $( "body" ).delegate( ".current_color", "change", function() {

  //$(".current_color").change(function(){
      var current_color = $(this).val();
     if(current_color == ''){ $(".img_current").attr("src","img/default_car.png"); }
     if(current_color == 'Red'){ $(".img_current").attr("src","img/red_car.png"); $(".r").attr('disabled',true); $(".g").attr('disabled',false); $(".b").attr('disabled',false); }
     if(current_color == 'Green'){ $(".img_current").attr("src","img/green_car.png"); $(".g").attr('disabled',true); $(".r").attr('disabled',false); $(".b").attr('disabled',false); }
     if(current_color == 'Blue'){ $(".img_current").attr("src","img/blue_car.png"); $(".b").attr('disabled',true); $(".g").attr('disabled',false); $(".r").attr('disabled',false); }
  });

  $( "body" ).delegate( ".target_color", "change", function() {
  //$(".target_color").change(function(){
      var target_color = $(this).val();
    if(target_color == ''){ $(".img_target").attr("src","img/default_car.png"); }
    if(target_color == 'Red'){ $(".img_target").attr("src","img/red_car.png"); }
    if(target_color == 'Green'){ $(".img_target").attr("src","img/green_car.png"); }
    if(target_color == 'Blue'){ $(".img_target").attr("src","img/blue_car.png"); }
  });


});