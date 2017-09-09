/*  
Theme Name: Web170_Temp
Script Description: This is a responsive navigation script.
Author:Piano Hagens
Author URI: http://pianohagens.com/
*/


$(window).load(function() { //when the window loads...
    $('#mobile_botton').click(function(m) {// when the #mobile_botton is clicked...
        $('#navbar').slideToggle(); // ... toggle out the #navbar
        m.preventDefault(); //disable href on #navbar item        
    });  

//
    
    $('#navbar li.menu-item-has-children > a').after('<span class="downarrow">&#711;</span>'); //create a downarrow for the sub-ul
        $('span.downarrow').click(function() { //when clicked the downarrow...
            $(this).next('ul.sub-menu').slideToggle(); // shows the sub-ul
        
    });
    
    var loadWidth = window.innerWidth; //save window load width as a variable
    
    $(window).resize(function() { // when the window is resized...
        if ( loadWidth !== window.innerWidth ) { // trigger for width only ...
            if (window.innerWidth < 801) { //if the window width is less than 801 px...
                $('#navbar').hide(); //hide main navbar items.
                
            } else { // else ...
                
                $('#navbar').show(); // otherwise, show #navbar items
                
            }
        }// end trigger width only
        
    }); // end when the window is resized...

}); // End window load