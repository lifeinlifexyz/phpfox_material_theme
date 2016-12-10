function toTopMainMenu()
{
    $(window).bind('scroll', function () {
        var mainMenu = $('#section-header');
        if ($(window).scrollTop() > 180) {
            mainMenu.addClass('scroll-color');
        } else {
            mainMenu.removeClass('scroll-color');
        }
    });
}

$(document).ready(function(){
   toTopMainMenu();
});

$Ready(function() {

    if ($('#site-menu').hasClass('in')) {
        $('a[href="#site-menu"]').find('i').removeClass('fa-reorder').addClass('fa-arrow-left');
        $('#site-menu ul a').focus();
    } else {
        $('a[href="#site-menu"]').find('i').addClass('fa-reorder').removeClass('fa-arrow-left');
    }


    $('#site-menu').on('hidden.bs.collapse', function () {
        $('a[href="#site-menu"]').find('i').addClass('fa-reorder').removeClass('fa-arrow-left');
    }).on('show.bs.collapse',  function () {
        $('a[href="#site-menu"]').find('i').removeClass('fa-reorder').addClass('fa-arrow-left');
    });

    if ( ($(window).height() + 100) < $(document).height() ) {
        $('#top-link-block').removeClass('hidden').affix({
            // how far to scroll down before link "slides" into view
            offset: {top:100}
        });
    }

    $('.site-menubar-body a').on('click', function(){
        $('.site-menubar-body li').removeClass('active');
        $(this).closest('li').addClass('active');
    });
});

