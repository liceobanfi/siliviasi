
/**
 * smart parallax effect by
 * https://codepen.io/magnificode/details/GpqGOm
 *
 */
$( document ).ready(function() {
    var hero = $('.hero-nav'),
        // heroHeight = $('.hero-nav').outerHeight(true);
        heroHeight = window.innerHeight;
        console.log(heroHeight)
        $(hero).parent().css('padding-top', heroHeight);
    $(window).scroll(function() {
        var scrollOffset = $(window).scrollTop();
        console.log(scrollOffset)
        if (scrollOffset < heroHeight) {
            $(hero).css('height', (heroHeight - scrollOffset));
        }
        if (scrollOffset > (heroHeight - 215)) {
            hero.addClass('fixme');
        } else {
            hero.removeClass('fixme');
        };
    });
});

$(window).on('beforeunload', function() {
    $(window).scrollTop(0);
});
