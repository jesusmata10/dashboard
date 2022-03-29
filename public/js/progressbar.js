$(document).on("scroll", function () {
    var pixels = $(document).scrollTop();
    var pageHeight = $(document).height() - $(window).height();
    var progress = 100 * pixels / pageHeight;

    $("div.progress").css("width", progress + "%");
})

// ---- Notes ---- //

// pixels = cantidad de px desde la parte superior de la página
// pageHeight = altura de toda la página menos la altura de la página visible
// progress = pixels from top / page-height * 100 - píxeles desde arriba / altura de página * 100