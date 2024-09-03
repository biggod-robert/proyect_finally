document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('welcome') === 'true') {
        Swal.fire({
            title: '¡Bienvenido, querido/a!',
            text: 'Estamos encantados de tenerte aquí. ¡Disfruta de lo mejor en nuestro departamento! 😊🎉',
            icon: 'success',
            confirmButtonText: '¡Genial!',
            background: '#12880e',
            customClass: {
                popup: 'swal-popup',
                title: 'swal-title',
                content: 'swal-content',
                confirmButton: 'swal-confirm-button'
            },
            imageUrl: '../../img/travel.jpg', // URL de una imagen de bienvenida (opcional)
            imageWidth: 10, // Ajusta el tamaño de la imagen si es necesario
            imageWidth: 300,
            imageAlt: 'Imagen de bienvenida'
        }).then(() => {
            // Crear el contenedor de burbujas
            const bubbleContainer = document.createElement('div');
            bubbleContainer.id = 'bubble-container';
            document.body.appendChild(bubbleContainer);

            // Generar burbujas
            for (let i = 0; i < 20; i++) {
                createBubble(bubbleContainer);
            }

            // Eliminar las burbujas después de unos segundos
            setTimeout(() => {
                bubbleContainer.remove();
            }, 5000);
        });
    }
});

function createBubble(container) {
    const bubble = document.createElement('div');
    bubble.className = 'bubble';
    bubble.style.left = `${Math.random() * 100}%`;
    bubble.style.animationDelay = `${Math.random() * 2}s`;
    bubble.style.animationDuration = `${3 + Math.random() * 2}s`;
    container.appendChild(bubble);
}