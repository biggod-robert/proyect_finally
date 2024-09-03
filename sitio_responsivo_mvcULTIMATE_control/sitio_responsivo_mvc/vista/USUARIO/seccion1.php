<?php
$pageTitle = "home";

ob_start();
?>

<div class="row">
    <div class="col-md-8">
        <h2>Bienvenido a la Sección 1</h2>
        <p>Aquí puedes agregar el contenido específico de la Sección 1.</p>
        <!-- Agrega más contenido según sea necesario -->
    </div>
    <div class="col-md-4">
        <h3>Información Adicional</h3>
        <ul>
            <li>Punto 1</li>
            <li>Punto 2</li>
            <li>Punto 3</li>
        </ul>
    </div>
</div>

<?php
$content = ob_get_clean();

include 'plantillaUser.php';
?>