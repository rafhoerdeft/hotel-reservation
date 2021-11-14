$(".top-menu ul li a, .bottom-menu ul li a, .link").on('click', function(e) { // Scroll window to target id
    // e.preventDefault();
    var athis = $(this);
    var target = $(this.hash); // search # in href
    if (target.length) {
        $('html,body').animate({
            scrollTop: target.offset().top - 50
        }, 1000, 'swing', function() {
            // window.location.hash = target;
            $('.menu-item').removeClass('active');
            athis.parent().addClass('active');

        });
        return false;
    }
});

$(window).scroll(function(event) {
    var scrollPos = $(document).scrollTop();
    if (scrollPos === 0) {
        $('a[href^="#header-bottom"]').parent().addClass('active');
        return;
    }
    $('.menu-item a').each(function() {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (
            (refElement.position().top - 175) <= scrollPos &&
            ((refElement.position().top - 175) + refElement.height()) > scrollPos
        ) {
            currLink.parent().addClass("active");
        } else {
            currLink.parent().removeClass("active");
        }
    });
})