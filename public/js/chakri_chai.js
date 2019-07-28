//start->home_page->see_cirlular_table
$(document).ready(function($) {
    $(".clickable-row").on({

        click: function() {
        window.location = $(this).data("href");
    },
    mouseenter: function(){
        $(this).css({"background-color": "lightgray", "font-size": "200%"});
    },
    mouseleave: function(){
        $(this).css({"background-color": "", "font-size": "150%"});
    }

    })
});
//end->home_page->see_cirlular_table
  
//start->image-slide
var slideIndex = 1;
showDivs(slideIndex);
setInterval( 
    function() {
    showDivs(slideIndex += 1);
    }, 5000);


function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
//end->image-slide