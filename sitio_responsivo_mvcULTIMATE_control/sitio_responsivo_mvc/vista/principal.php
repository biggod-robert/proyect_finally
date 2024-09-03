<?php
session_start();
// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['id_documento'])) {
    // Redirige según el id_categoria
    if ($_SESSION['id_categoria'] === 1) { // Admin
        header('Location: ../vista/ADMIN/seccion1.php');
    } else { // Usuario
        header('Location: ../vista/USUARIO/seccion1.php');
    }
    exit;
}?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="../css/paginaprincipal.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>





    <header>
        <div class="contendor_menu">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="../img/logo.png" class="img-fluid" alt="logo de la empresa"> </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Fotos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">El malecon</a></li>
                                    <li><a class="dropdown-item" href="#">Parque principal</a></li>
                                    <li><a class="dropdown-item" href="#">Parque de la paz</a></li>
                                </ul>
                            </li>
                            <a class="nav-link separado" href="#quienes_somos">Quienes somos</a>
                            <a class="nav-link" href="#acerca_del_guaviare">Acerca del Guaviare</a>

                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="contenedorcentral">
        <div class="textCentral">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <h1>ESTAS A UN SOLO CLICK DE VIVIR LAS MEJORES EXPERIENCIAS</h1> <br>
                        <div class="row">



                            <div class="col-md-5">
                                <a href="../vista/inicioSesion.php" class="button"><span>¡INGRESA YA!</span>
                                    <div class="icono">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-bar-to-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 12l-10 0" />
                                            <path d="M14 12l-4 4" />
                                            <path d="M14 12l-4 -4" />
                                            <path d="M20 4l0 16" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="carouselExampleCaptions" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img loading="lazy" src="../img/pass1.jpg" class="carrus-fluid" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>pinturas rupestres</h5>
                                        <p>un lugar lleno de historia.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img loading="lazy" src="../img/pass2.jpg" class="carrus-fluid" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>las cascadas del amor</h5>
                                        <p>disfruta de un epectaculo por parte de la naturaleza.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img loading="lazy" src="../img/pass3.jpg" class="carrus-fluid" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        <p>Some representative placeholder content for the third slide.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img loading="lazy" src="../img/pass4.jpg" class="carrus-fluid" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        <p>Some representative placeholder content for the third slide.</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="wave">
            <div class="curve">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319"
                    style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto;">
                    <path fill="#41d0fccc" fill-opacity="1"
                        d="M0,224L30,234.7C60,245,120,267,180,256C240,245,300,203, 360,186.7C420,171,480,181,540,165.3C600,149,660,107,720,90.7C780,75,840,85,900,112C960,139,1020,181,1080, 208C1140,235,1200,245,1260,218.7C1320,192,1380,128,1410,96L1440,64L1440,320L1410,320C1380,320,1320,320,1260, 320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320, 420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                    </path>
                </svg>
            </div>
        </div>


    </div>
    <div class="centro_quienes_somos">
        <div class="curver">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#41d0fccc" fill-opacity="1"
                    d="M0,288L26.7,245.3C53.3,203,107,117,160,117.3C213.3,117,267,203,320,208C373.3,213,427,139,480,96C533.3,53,587,43,640,53.3C693.3,64,747,96,800,96C853.3,96,907,64,960,90.7C1013.3,117,1067,203,1120,202.7C1173.3,203,1227,117,1280,80C1333.3,43,1387,53,1413,58.7L1440,64L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z">
                </path>
            </svg>
        </div>


        <div id="acerca_del_guaviare">
            <div class="curved">
                <div class="row">
                    <div class="col-12">
                        <h1> ACERCA DEL GUAVIARE </h1>

                    </div>

                </div>
                <div class="container">
                    <p>Bienvenido al departamento del Guaviare, un tesoro escondido en el corazón de la Amazonía
                        colombiana.
                        Con
                        una biodiversidad excepcional y paisajes impresionantes, el Guaviare es un destino perfecto para
                        los
                        amantes de la naturaleza y la aventura. </p>

                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#41d0fccc" fill-opacity="1" d="M0,288L12,245.3C24,203,48,117,72,96C96,75,120,117,144,165.3C168,213,192,267,216,261.3C240,256,264,
                            192,288,165.3C312,139,336,149,360,170.7C384,192,408,224,432,208C456,192,480,128,504,106.7C528,85,552,
                            107,576,133.3C600,160,624,192,648,213.3C672,235,696,245,720,229.3C744,213,768,171,792,170.7C816,171,840,
                            213,864,234.7C888,256,912,256,936,250.7C960,245,984,235,1008,234.7C1032,235,1056,245,1080,256C1104,267,
                            1128,277,1152,256C1176,235,1200,181,1224,138.7C1248,96,1272,64,1296,42.7C1320,21,1344,11,1368,26.7C1392,
                            43,1416,85,1428,106.7L1440,128L1440,320L1428,320C1416,320,1392,320,1368,320C1344,320,1320,320,1296,320C1272,
                            320,1248,320,1224,320C1200,320,1176,320,1152,320C1128,320,1104,320,1080,320C1056,320,1032,320,1008,320C984,
                            320,960,320,936,320C912,320,888,320,864,320C840,320,816,320,792,320C768,320,744,320,720,320C696,320,672,320,
                            648,320C624,320,600,320,576,320C552,320,528,320,504,320C480,320,456,320,432,320C408,320,384,320,360,320C336,
                            320,312,320,288,320C264,320,240,320,216,320C192,320,168,320,144,320C120,320,96,320,72,320C48,320,24,320,12,
                            320L0,320Z">
                    </path>
                </svg>

            </div>

        </div>

    </div>


    </div>
    <div class="centro_acerca_del_guaviare">
        <div class="curver">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#41d0fccc" fill-opacity="1"
                    d="M0,288L26.7,245.3C53.3,203,107,117,160,117.3C213.3,117,267,203,320,208C373.3,213,427,139,480,96C533.3,53,587,43,640,53.3C693.3,64,747,96,800,96C853.3,96,907,64,960,90.7C1013.3,117,1067,203,1120,202.7C1173.3,203,1227,117,1280,80C1333.3,43,1387,53,1413,58.7L1440,64L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z">
                </path>
            </svg>
        </div>

        <div id="quienes_somos">
            <div class="curved">
                <div class="row">
                    <div class="col-md-6 text-container">
                        <h1> QUIENES SOMOS </h1>
                        <p>Somos un equipo local de San José del Guaviare apasionado por mostrar al mundo la belleza
                            natural
                            y
                            cultural de nuestra región. Con un profundo conocimiento y amor por nuestra tierra, nos
                            dedicamos a
                            brindar experiencias turísticas auténticas y significativas. Nuestro propocito es
                            ofrecer
                            servicios
                            personalizados que respeten y preserven nuestro patrimonio cultural y ambiental,
                            garantizando
                            que
                            cada
                            visita sea única e inolvidable.</p>


                    </div>
                    <div class="col-md-6 video-container">
                        <video width="320" height="250" autoplay controls>
                            <source src="../img/video.mp4" type="video/mp4">
                                <source src="../img/video.ogv" type="video/ogg">
                            
                        </video>



                    </div>

                </div>




                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#41d0fccc" fill-opacity="1" d="M0,288L12,245.3C24,203,48,117,72,96C96,75,120,117,144,165.3C168,213,192,267,216,261.3C240,256,264,
                192,288,165.3C312,139,336,149,360,170.7C384,192,408,224,432,208C456,192,480,128,504,106.7C528,85,552,
                107,576,133.3C600,160,624,192,648,213.3C672,235,696,245,720,229.3C744,213,768,171,792,170.7C816,171,840,
                213,864,234.7C888,256,912,256,936,250.7C960,245,984,235,1008,234.7C1032,235,1056,245,1080,256C1104,267,
                1128,277,1152,256C1176,235,1200,181,1224,138.7C1248,96,1272,64,1296,42.7C1320,21,1344,11,1368,26.7C1392,
                43,1416,85,1428,106.7L1440,128L1440,320L1428,320C1416,320,1392,320,1368,320C1344,320,1320,320,1296,320C1272,
                320,1248,320,1224,320C1200,320,1176,320,1152,320C1128,320,1104,320,1080,320C1056,320,1032,320,1008,320C984,
                320,960,320,936,320C912,320,888,320,864,320C840,320,816,320,792,320C768,320,744,320,720,320C696,320,672,320,
                648,320C624,320,600,320,576,320C552,320,528,320,504,320C480,320,456,320,432,320C408,320,384,320,360,320C336,
                320,312,320,288,320C264,320,240,320,216,320C192,320,168,320,144,320C120,320,96,320,72,320C48,320,24,320,12,
                320L0,320Z">
                    </path>
                </svg>

            </div>

        </div>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3CJNRFC4P8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-3CJNRFC4P8');
    </script>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <script src="../js/sweetalert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>