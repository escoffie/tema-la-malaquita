(function ($) {
    console.log('Hello');

    // Switch nav
    $('.burger-open').click(function () {
        $('#menu-main').addClass('active');
        console.log('Abrir');
    });
    $('#menu-main').click(function () {
        $('#menu-main').removeClass('active');
        console.log('Cerrar');
    });

})(jQuery);