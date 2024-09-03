$(document).ready(function () {
    // Manejar clic en el icono del usuario para mostrar el dropdown
    $('#userDropdown').on('click', function (e) {
        e.preventDefault();
        $(this).siblings('.dropdown-menu').toggleClass('show');
    });

    // Cerrar el dropdown si se hace clic fuera del menú
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#userDropdown').length) {
            $('.dropdown-menu').removeClass('show');
        }
    });
});
