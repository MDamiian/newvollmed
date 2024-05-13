<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vollmed</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- normalize css -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
</head>

<body>


    <!-- header -->
    <header class="header bg-blue">
        <nav class="navbar bg-blue">
            <div class="container flex">
                <a href="#" class="navbar-brand">
                    <h1 class="text-white">Vollmed</h1>
                </a>
                <button type="button" class="navbar-show-btn">
                    <img src="images/ham-menu-icon.png">
                </button>

                <div class="navbar-collapse bg-white">
                    <button type="button" class="navbar-hide-btn">
                        <img src="images/close-icon.png">
                    </button>
                    @if (Route::has('login'))
                    <ul class="navbar-nav">
                        @auth
                        <li>
                            <a href="{{ route('administradores.index') }}" class="nav-link">Dashboard</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log In</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Sign In</a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                    @endif
                </div>
            </div>
        </nav>

        <div class="header-inner text-white text-center">
            <div class="container grid">
                <div class="header-inner-left">
                    <h1>Vollmed</h1>
                    <p class="lead">Los mejores doctores a tu servicio</p>
                    <p class="text text-md">Agenda citas desde la comodidad de tu hogar, evitando así perder tiempo en traslados y largas esperas para obtener una cita médica</p>
                </div>
                <div class="header-inner-right">
                <img src = "images/header.png">
                </div>
            </div>
        </div>
    </header>
    <!-- end of header -->

    <main>
        <!-- about section -->
        <section id="about" class="about py">
            <div class="about-inner">
                <div class="container grid">
                    <div class="about-left text-center">
                        <div class="section-head">
                            <h2>Acerca de nosotros</h2>
                            <div class="border-line"></div>
                        </div>
                        <p class="text text-lg">Nos dedicamos a proporcionar servicios de salud de alta calidad de una manera accesible y
                            conveniente para nuestros pacientes. Nuestra misión es mejorar la experiencia de atención
                            médica al brindar opciones de citas flexibles y tecnología avanzada que permita a los pacientes
                            gestionar su salud desde cualquier lugar y en cualquier momento.</p>
                    </div>
                    <div class="about-right flex">
                        <div class="img">
                            <img src="images/about-img.png">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of about section -->

        <!-- banner one -->
        <section id="banner-one" class="banner-one text-center">
            <div class="container text-white">
                <blockquote class="lead"><i class="fas fa-quote-left"></i> Salud al alcance de tu mano, cuidándote en cada paso. <i class="fas fa-quote-right"></i></blockquote>
                <small class="text text-sm">- Vollmed</small>
            </div>
        </section>
        <!-- end of banner one -->

        <!-- services section -->
        <section id="services" class="services py">
            <div class="container">
                <div class="section-head text-center">
                    <h2 class="lead">Los mejores doctores al alcance de tu mano</h2>
                    <p class="text text-lg">La manera perfecta de monstrar servicios hospitalarios</p>
                    <div class="line-art flex">
                        <div></div>
                        <img src="images/4-dots.png">
                        <div></div>
                    </div>
                </div>
                <div class="services-inner text-center grid">
                    <article class="service-item">
                        <div class="icon">
                            <img src="images/service-icon-1.png">
                        </div>
                        <h3>Monitoreo Cardiovascular</h3>
                        <p class="text text-sm">Seguimiento continuo de la salud del corazón, ayudando a detectar y prevenir problemas cardíacos mediante la observación de sus actividades eléctricas y físicas.</p>
                    </article>

                    <article class="service-item">
                        <div class="icon">
                            <img src="images/service-icon-2.png">
                        </div>
                        <h3>Tratamiento médico</h3>
                        <p class="text text-sm">comprende intervenciones que buscan mejorar la salud y bienestar del paciente, desde medicamentos hasta procedimientos quirúrgicos.</p>
                    </article>

                    <article class="service-item">
                        <div class="icon">
                            <img src="images/service-icon-3.png">
                        </div>
                        <h3>Emergencia Médica</h3>
                        <p class="text text-sm">Asistencia inmediata en situaciones críticas de salud o accidentes.</p>
                    </article>

                    <article class="service-item">
                        <div class="icon">
                            <img src="images/service-icon-4.png">
                        </div>
                        <h3>Primeros Auxilios</h3>
                        <p class="text text-sm">Atención inicial en emergencias para prevenir complicaciones.</p>
                    </article>
                </div>
            </div>
        </section>
        <!-- end of services section -->

        <!-- doctors section -->
        <section id="doc-panel" class="doc-panel py">
            <div class="container">
                <div class="section-head">
                    <h2>Nuestros Doctores</h2>
                </div>

                <div class="doc-panel-inner grid">
                    <div class="doc-panel-item">
                        <div class="img flex">
                            <img src="images/doc-1.png" alt="doctor image">
                            <div class="info text-center bg-blue text-white flex">
                                <p class="lead">Pablo Avelar Armenta</p>
                                <p class="text-lg">Médico</p>
                            </div>
                        </div>
                    </div>

                    <div class="doc-panel-item">
                        <div class="img flex">
                            <img src="images/doc-2.png" alt="doctor image">
                            <div class="info text-center bg-blue text-white flex">
                                <p class="lead">Valentina García</p>
                                <p class="text-lg">Cardiologa</p>
                            </div>
                        </div>
                    </div>

                    <div class="doc-panel-item">
                        <div class="img flex">
                            <img src="images/doc-3.png" alt="doctor image">
                            <div class="info text-center bg-blue text-white flex">
                                <p class="lead">Camila López</p>
                                <p class="text-lg">Medico</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of doctors section -->

    </main>

    <!-- footer  -->
    <footer id="footer" class="footer text-center">
        <div class="container">
            <div class="footer-inner text-white py grid">
                <div class="footer-item">
                    <h3 class="footer-head">Acerca de nosotros</h3>
                    <div class="icon">
                    </div>
                    <p class="text text-md">Proporcionamos atención médica de calidad, accesible y conveniente. Nuestra misión es mejorar
                        la experiencia médica con citas flexibles y tecnología avanzada para el autogestionamiento de la
                        salud.</p>
                </div>

                <div class="footer-item">
                    <h3 class="footer-head">Especialidades</h3>
                    <ul class="tags-list flex">
                        <li>Cardiología</li>
                        <li>Ginecología</li>
                        <li>Neurología</li>
                        <li>Pediatría</li>
                        <li>Urología</li>
                        <li>Otorrinolaringología</li>
                    </ul>
                </div>

                <div class="footer-item">
                    <h3 class="footer-head">Contacto</h3>
                    <p class="text text-md"></p>
                    <ul class="appointment-info">
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>vollmed@gmail.com</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>33 4484 6598</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-links">
                <ul class="flex">
                    <li><a href="#" class="text-white flex"> <i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" class="text-white flex"> <i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- end of footer  -->


    <!-- custom js -->
    <script src = "js/script.js"></script>
</body>

</html>