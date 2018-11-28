// Replace source
// $('img').on("error", function() {
//     $(this).attr('src', '/images/missing.png');
// });

// Or, hide them
$("img").on("error", function() {
    $(this).hide();
});