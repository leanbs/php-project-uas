
// $(document).ready(function(){$('#sidebar').affix({
//       offset: {
//         top: 230,
//         bottom: 100
//       }
// });	
// $('#midCol').affix({
//       offset: {
//         top: 230,
//         bottom: 100
//       }
// });	
// });

// $(document).on('scroll', function (e) {
//     $('.navbar').css('opacity', ($(document).scrollTop() / 500));
// });

// $(window).scroll(function(){
//     var fromtop = $(document).scrollTop();       // pixels from top of screen
//     $('.navbar').css({opacity: 100-fromtop}); // use a better formula for better fading
// });



$(window).bind('scroll', function(){
	var fadeStart=100 	// 100px scroll or less will equiv to 1 opacity
    	,fadeUntil=350;	// 350px scroll or more will equiv to 0 opacity

    var offset = $(document).scrollTop()
        ,opacity=0
    ;
    if( offset<=fadeStart ){
        opacity=1;
    }else if( offset<=fadeUntil ){
        opacity=1-offset/fadeUntil;
    }
    $('.navbar').css('opacity',opacity);
});


// $('.panel-heading[data-toggle^="collapse"]').click(function(){
//     var target = $(this).attr('data-target');
//     $(target).collapse('toggle');
// }).children().click(function(e) {
//   e.stopPropagation();
// });