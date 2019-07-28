//start->registar_page
$(document).ready(function(){
  $("#user_Atag").click(function(){
    $("#rolename").val("User");
    console.log("User");
  });
});
$(document).ready(function(){
  $("#company_Atag").click(function(){
    $("#rolename").val("Company");
    console.log("Company");
  });
});
//end->registar_page

//start->home_page->see_cirlular_table
$(document).ready(function($) {
    $(".clickable-row").on({

        click: function() {
        window.location = $(this).data("href");
    },
    mouseenter: function(){
        $(this).css({"background-color": "#575653", "font-size": "150%","color":"white"});
    },
    mouseleave: function(){
        $(this).css({"background-color": "", "font-size": "150%","color":"black"});
    }

    })
});
//end->home_page->see_cirlular_table


$(document).ready(function(){
  
    $("#home").addClass("tab-pane fade in active show");
    
 
});
$(document).ready(function(){
  
    $("#user").addClass("tab-pane fade in active show");
    
 
});
function clickAtag() {
  console.log("Clicked");

// document.getElementById("cl").click();
}
  
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
}
//end->image-slide

$(document).ready(function () {
  $('a#cl').click(function () {
    // if it has to be href
    var tohref = $(this).attr("href");
    alert(tohref);
    window.location=tohref;
  });
 });
