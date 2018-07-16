require('bootstrap');

$(document).ready(function() {
    var origheight = $("#trans1").height();
    var height = $(window).height();
    if (height > origheight) {
        $("#trans1").height(height);
    }


    $(window).scroll(function(){
        var x = $(this).scrollTop();
        $('#trans1').css('background-position','center -'+parseInt(x/5)+'px');
    });

});

$('#plus').click(function() {
    $('#showUpload').removeClass("d-none");
    $('#plus').addClass("d-none");
    $('#minus').removeClass("d-none");
    $('#plus1').removeClass("d-none");
    $('#minus1').addClass("d-none");

});
$('#minus').click(function() {
    $('#showUpload1').addClass("d-none");
    $('#showUpload').addClass("d-none");
    $('#plus').removeClass("d-none");
    $('#minus').addClass("d-none");
    $('#plus1').addClass("d-none");
    $('#minus1').addClass("d-none");


});
$('#plus1').click(function() {
    $('#showUpload1').removeClass("d-none");
    $('#plus1').addClass("d-none");
    $('#minus1').removeClass("d-none");
    $('#plus').addClass("d-none");
});
$('#minus1').click(function() {
    $('#showUpload1').addClass("d-none");
    $('#plus1').removeClass("d-none");
    $('#minus1').addClass("d-none");
    $('#plus').addClass("d-none");
});



