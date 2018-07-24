require('bootstrap');

$(document).ready(function () {
    var origheight = $("#trans1").height();
    var height = $(window).height();
    if (height > origheight) {
        $("#trans1").height(height);
    }


    $(window).scroll(function () {
        var x = $(this).scrollTop();
        $('#trans1').css('background-position', 'center -' + parseInt(x / 5) + 'px');
    });


});

$('#plus').click(function () {
    $('#showUpload').removeClass("d-none");
    $('#plus').addClass("d-none");
    $('#minus').removeClass("d-none");
    $('#plus1').removeClass("d-none");
    $('#minus1').addClass("d-none");

});
$('#minus').click(function () {
    $('#showUpload1').addClass("d-none");
    $('#showUpload').addClass("d-none");
    $('#plus').removeClass("d-none");
    $('#minus').addClass("d-none");
    $('#plus1').addClass("d-none");
    $('#minus1').addClass("d-none");


});
$('#plus1').click(function () {
    $('#showUpload1').removeClass("d-none");
    $('#plus1').addClass("d-none");
    $('#minus1').removeClass("d-none");
    $('#plus').addClass("d-none");
});
$('#minus1').click(function () {
    $('#showUpload1').addClass("d-none");
    $('#plus1').removeClass("d-none");
    $('#minus1').addClass("d-none");
    $('#plus').addClass("d-none");
});

$(document).ready(function () {

    $('input[type="checkbox"]').addClass('toggles').wrap('<label class="switch mr-4"></label>').after('<span class="slider round"></span>');
    $("#formMessage").hide();

});


$('input[type="checkbox"]').prop("checked", false).change(function () {
    $("#formMessage").slideToggle(300);

});
$('#announce_imageFile').bind('change', function () {
    var filename = $("#announce_imageFile").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen...");
    }
    else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
});
$('#announce_imageFile2').bind('change', function () {
    var filename = $("#announce_imageFile2").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile2").text("No file chosen...");
    }
    else {
        $(".file-upload").addClass('active');
        $("#noFile2").text(filename.replace("C:\\fakepath\\", ""));
    }
});
$('#announce_imageFile3').bind('change', function () {
    var filename = $("#announce_imageFile3").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile2").text("No file chosen...");
    }
    else {
        $(".file-upload").addClass('active');
        $("#noFile3").text(filename.replace("C:\\fakepath\\", ""));
    }
});

