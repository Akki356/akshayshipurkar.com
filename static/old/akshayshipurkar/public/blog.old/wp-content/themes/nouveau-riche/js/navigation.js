/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.

*/

(function ($) {
  "use strict";
    $.fn.ftmenu = function (options) {
        var defaults = {
            ftMenuTarget: jQuery(this), // Target the current HTML markup you wish to replace
            ftMenuContainer: 'body', // Choose where ftmenu will be placed within the HTML
            ftMenuClose: "X", // single character you want to represent the close menu button
            ftMenuCloseSize: "18px", // set font size of close button
            ftMenuOpen: "<span /><span /><span />", // text/markup you want when menu is closed
            ftRevealPosition: "center", // left right or center positions
            ftRevealPositionDistance: "0", // Tweak the position of the menu
            ftRevealColour: "", // override CSS colours for the reveal background
            ftRevealHoverColour: "", // override CSS colours for the reveal hover
            ftScreenWidth: "767", // set the screen width you want ftmenu to kick in at
            ftNavPush: "", // set a height here in px, em or % if you want to budge your layout now the navigation is missing.
            ftShowChildren: true, // true to show children in the menu, false to hide them
            ftExpandableChildren: true, // true to allow expand/collapse children
            ftExpand: "+", // single character you want to represent the expand for ULs
            ftContract: "-", // single character you want to represent the contract for ULs
            ftRemoveAttrs: false, // true to remove classes and IDs, false to keep them
            onePage: false, // set to true for one page sites
            removeElements: "" // set to hide page elements
        };
        var options = $.extend(defaults, options);

        // get browser width
        var currentWidth = window.innerWidth || document.documentElement.clientWidth;

        return this.each(function () {
            var ftMenu = options.ftMenuTarget;
            var ftContainer = options.ftMenuContainer;
            var ftReveal = options.ftReveal;
            var ftMenuClose = options.ftMenuClose;
            var ftMenuCloseSize = options.ftMenuCloseSize;
            var ftMenuOpen = options.ftMenuOpen;
            var ftRevealPosition = options.ftRevealPosition;
            var ftRevealPositionDistance = options.ftRevealPositionDistance;
            var ftRevealColour = options.ftRevealColour;
            var ftRevealHoverColour = options.ftRevealHoverColour;
            var ftScreenWidth = options.ftScreenWidth;
            var ftNavPush = options.ftNavPush;
            var ftRevealClass = ".ftmenu-reveal";
            var ftShowChildren = options.ftShowChildren;
            var ftExpandableChildren = options.ftExpandableChildren;
            var ftExpand = options.ftExpand;
            var ftContract = options.ftContract;
            var ftRemoveAttrs = options.ftRemoveAttrs;
            var onePage = options.onePage;
            var removeElements = options.removeElements;

            //detect known mobile/tablet usage
            if ( (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/Blackberry/i)) || (navigator.userAgent.match(/Windows Phone/i)) ) {
                var isMobile = true;
            }

            if ( (navigator.userAgent.match(/MSIE 8/i)) || (navigator.userAgent.match(/MSIE 7/i)) ) {
              // add scrollbar for IE7 & 8 to stop breaking resize function on small content sites
                jQuery('html').css("overflow-y" , "scroll");
            }

            function ftCentered() {
              if (ftRevealPosition == "center") {
                var newWidth = window.innerWidth || document.documentElement.clientWidth;
                var ftCenter = ( (newWidth/2)-22 )+"px";
                ftRevealPos = "left:" + ftCenter + ";right:auto;";

                if (!isMobile) {
                  jQuery('.ftmenu-reveal').css("left",ftCenter);
                } else {
                  jQuery('.ftmenu-reveal').animate({
                      left: ftCenter
                  });
                }
              }
            }

            var menuOn = false;
            var ftMenuExist = false;

            if (ftRevealPosition == "right") {
                ftRevealPos = "right:" + ftRevealPositionDistance + ";left:auto;";
            }
            if (ftRevealPosition == "left") {
                var ftRevealPos = "left:" + ftRevealPositionDistance + ";right:auto;";
            }
            // run center function
            ftCentered();

            // set all styles for ft-reveal
            var ftStyles = "background:"+ftRevealColour+";color:"+ftRevealColour+";"+ftRevealPos;
      var $navreveal = "";

            function ftInner() {
                // get last class name
                if (jQuery($navreveal).is(".ftmenu-reveal.ftclose")) {
                    $navreveal.html(ftMenuClose);
                } else {
                    $navreveal.html(ftMenuOpen);
                }
            }

            //re-instate original nav (and call this on window.width functions)
            function ftOriginal() {
              jQuery('.ft-bar,.ft-push').remove();
              jQuery(ftContainer).removeClass("ft-container");
              jQuery(ftMenu).show();
              menuOn = false;
              ftMenuExist = false;
              jQuery(removeElements).removeClass('ft-remove');
            }

            //navigation reveal
            function showftMenu() {
                if (currentWidth <= ftScreenWidth) {
                jQuery(removeElements).addClass('ft-remove');
                  ftMenuExist = true;
                  // add class to body so we don't need to worry about media queries here, all CSS is wrapped in '.ft-container'
                  jQuery(ftContainer).addClass("ft-container");
                  jQuery('.ft-container').prepend('<div class="ft-bar"><a href="#nav" class="ftmenu-reveal" style="'+ftStyles+'">Show Navigation</a><nav class="ft-nav"></nav></div>');

                    //push ftMenu navigation into .ft-nav
                    var ftMenuContents = jQuery(ftMenu).html();
                    jQuery('.ft-nav').html(ftMenuContents);

                // remove all classes from EVERYTHING inside ftmenu nav
                if(ftRemoveAttrs) {
                  jQuery('nav.ft-nav ul, nav.ft-nav ul *').each(function() {
                    jQuery(this).removeAttr("class");
                    jQuery(this).removeAttr("id");
                  });
                }

                    // push in a holder div (this can be used if removal of nav is causing layout issues)
                    jQuery(ftMenu).before('<div class="ft-push" />');
                    jQuery('.ft-push').css("margin-top",ftNavPush);

                    // hide current navigation and reveal ft nav link
                    jQuery(ftMenu).hide();
                    jQuery(".ftmenu-reveal").show();

                    // turn 'X' on or off
                    jQuery(ftRevealClass).html(ftMenuOpen);
                    $navreveal = jQuery(ftRevealClass);

                    //hide ft-nav ul
                    jQuery('.ft-nav ul').hide();

                    // hide sub nav
                     if(ftShowChildren) {
                        // allow expandable sub nav(s)
                         if(ftExpandableChildren){
                           jQuery('.ft-nav ul ul').each(function() {
                               if(jQuery(this).children().length){
                                   jQuery(this,'li:first').parent().append('<a class="ft-expand" href="#" style="font-size: '+ ftMenuCloseSize +'">'+ ftExpand +'</a>');
                               }
                           });
                           jQuery('.ft-expand').on("click",function(e){
                              e.preventDefault();
                               if (jQuery(this).hasClass("ft-clicked")) {
                                  jQuery(this).text(ftExpand);
                                   jQuery(this).prev('ul').slideUp(300, function(){});
                               } else {
                                  jQuery(this).text(ftContract);
                                  jQuery(this).prev('ul').slideDown(300, function(){});
                               }
                               jQuery(this).toggleClass("ft-clicked");
                           });
                         } else {
                             jQuery('.ft-nav ul ul').show();
                         }
                     } else {
                         jQuery('.ft-nav ul ul').hide();
                     }

                    // add last class to tidy up borders
                    jQuery('.ft-nav ul li').last().addClass('ft-last');

                    $navreveal.removeClass("ftclose");
                    jQuery($navreveal).click(function(e){
                      e.preventDefault();
                  if( menuOn == false ) {
                          $navreveal.css("text-align", "center");
                          $navreveal.css("text-indent", "0");
                          $navreveal.css("font-size", ftMenuCloseSize);
                          jQuery('.ft-nav ul:first').slideDown();
                          menuOn = true;
                      } else {
                        jQuery('.ft-nav ul:first').slideUp();
                        menuOn = false;
                      }
                        $navreveal.toggleClass("ftclose");
                        ftInner();
                        jQuery(removeElements).addClass('ft-remove');
                    });

                    // for one page websites, reset all variables...
                    if ( onePage ) {

            jQuery('.ft-nav ul > li > a:first-child').on( "click" , function () {
              jQuery('.ft-nav ul:first').slideUp();
              menuOn = false;
              jQuery($navreveal).toggleClass("ftclose").html(ftMenuOpen);

            });

                    }

                } else {
                  ftOriginal();
                }
            }

            if (!isMobile) {
                //reset menu on resize above ftScreenWidth
                jQuery(window).resize(function () {
                    currentWidth = window.innerWidth || document.documentElement.clientWidth;
                    if (currentWidth > ftScreenWidth) {
                        ftOriginal();
                    } else {
                      ftOriginal();
                    }
                    if (currentWidth <= ftScreenWidth) {
                        showftMenu();
                        ftCentered();
                    } else {
                      ftOriginal();
                    }
                });
            }

          // adjust menu positioning on centered navigation
            window.onorientationchange = function() {
              ftCentered();
              // get browser width
              currentWidth = window.innerWidth || document.documentElement.clientWidth;
              if (currentWidth >= ftScreenWidth) {
                ftOriginal();
              }
              if (currentWidth <= ftScreenWidth) {
                if (ftMenuExist == false) {
                  showftMenu();
                }
              }
            }
           // run main menuMenu function on load
           showftMenu();
        });
    };

})(jQuery);
