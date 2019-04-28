$(document).ready(function(){
      

      if ($(window).width() < 600) {
        $("#namaProduk").attr("width", "auto");
      }
      else{
        $("#namaProduk").attr("width", ""+$(window).width()*7/10);
      }
  });