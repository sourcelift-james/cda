$( window ).scroll(function(event) {
    var scroll = $( window ).scrollTop();
    if (scroll > 0) {
        $('.header').addClass('backgroundOverlay');
    }
   if (!scroll) {
       $('.header').removeClass('backgroundOverlay');
   }
});

$('button.reset').click(function() {
    $("input").val("");
    $("textarea").val("");
})
