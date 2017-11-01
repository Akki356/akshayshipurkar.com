(function($){
	$(document).ready(function(){


    // Target your .container, .wrapper, .post, etc.
    $(".entry-content").fitVids();


    // Select first word of every paragraph in post format chat
  $('.format-chat .entry-content p').each(function(){
    var text_splited = $(this).text().split(" ");
   $(this).html("<strong>"+text_splited.shift()+"</strong> "+text_splited.join(" "));
  });

  /*  Comments / pingbacks tabs
/* ------------------------------------ */
    $(".comment-tabs li").click(function() {
        $(".comment-tabs li").removeClass('active');
        $(this).addClass("active");
        $(".comment-tab").hide();
        var selected_tab = $(this).find("a").attr("href");
        $(selected_tab).fadeIn();
        return false;
    });

$(document).ready(function(){
$('header nav').ftmenu();
  });


/*Header Image Backstretch.js */
$(".header-img").backstretch([BackStretchImg.src],{duration:3000,fade:750});
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
  });

/*Scroll to Top */

  $('.scrollup').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });

/*sliding panel */
$(".second").pageslide({ direction: "right", modal: false });
}); })( jQuery );