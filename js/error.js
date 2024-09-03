window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');

    if (error) {
        let title = '';
        let text = '';

        switch (error) {
            case 'captcha':
                title = 'Error';
                text = 'CAPTCHA incorrecto.';
                break;
            case 'credentials':
                title = 'Error';
                text = 'Credenciales incorrectas.';
                break;
            default:
                title = 'Error';
                text = 'Error desconocido.';
                break;
        }

        Swal.fire({
            icon: 'error',
            title: title,
            text: text
        });
    }
};