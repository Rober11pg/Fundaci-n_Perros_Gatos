

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Refugio de Animales</title>
    <!--<link rel="shortcut icon" href="img/alexcgdesign.png" type="image/x-icon">-->
    <link rel="stylesheet" href="../View/Style/estilospagprin.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .hola{
            color: #ffffff;
            text-align:end;
            padding-right: 60px;
        }
    </style>
</head>
<body>
    <header>
        <br>
        <div class="hola">
            <?php
                include_once(__DIR__."/../Model/ClassConsultasBD.php");
                session_start(); // Iniciar la sesión si no está iniciada

                if (!isset($_SESSION['usuario'])) {
                    include_once(__DIR__."/VLogin.php");
                    exit();
                }

                $usuario = $_SESSION['usuario'];    
                echo "Bienvenido(a), " . $usuario->getNombre() . " " . $usuario->getApellido();
            ?>
        </div>
        
        <nav >
            <form method="post" action="./../index.html">
                <a href="./../Controller/controlador.php?var=7" style="color: #ffffff;">Adoptar/Comprar Mascota</a>
                <button type="submit" name="cerrarsesion">Cerrar sesión</button>
            </form>
        </nav>
        <section class="textos-header">
            <h1>Fundación CanRiño</h1>
            <h2>Brindar protección y bienestar a los animales, con el apoyo de voluntarios y sin ánimo de lucro.</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 80" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #ffffff;"></path>
            </svg>
        </div>
    </header>

    <main>
        <section class="contenedor sobre-nosotros" id="sobre-nosotros">
            <h2 class="titulo">Misión y Visión</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="../View/img/ilustracion2.svg" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <a href="#inicio"><h3><span>1</span></a>Misión</h3>
                    <p>En CanRiño, nuestra misión es rescatar, 
                       rehabilitar y encontrar hogares amorosos para perros y gatos en situación de abandono o maltrato. 
                       Nos dedicamos a promover la adopción responsable y educar a la comunidad sobre el bienestar animal.</p>
                    <a href="#inicio"><h3><span>2</span></a>Visión</h3>
                    <p>En CanRiño, aspiramos a un mundo donde cada mascota reciba amor, 
                        cuidado y un hogar para siempre. Trabajamos incansablemente para crear conciencia y 
                        fomentar una cultura de respeto y compasión hacia todos los animales.</p>
                </div>
            </div>
        </section>


        <section class="clientes contenedor" id="clientes">
            <h2 class="titulo">Que dicen nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <a href="#inicio"><img src="../View/img/face1.jpg" alt=""></a>
                    <div class="contenido-texto-card">
                        <center><h4>Mayra Palacios</h4>
                            <p>¡Mi gatito es simplemente adorable! Gracias a la fundación por proporcionar una experiencia de compra tan fácil y amorosa.</p>
                        </center>    
                    </div>
                </div>
                <div class="card">
                    <a href="#inicio"><img src="../View/img/face2.jpg" alt=""></a>
                    <div class="contenido-texto-card">
                        <center><h4>Luis Maldonado</h4>
                            <p>¡Adoptar a mi perrito de esta fundación fue una experiencia increíble! Estaba bien cuidado y ahora es el miembro más querido de la familia. ¡Gracias por hacer posible esta conexión!</p>
                        </center>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-services" id="servicios">
            <div class="contenedor">
                <h2 class="titulo">Nuestros servicios</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <a href="../Fundacion_Grupo5/View/VAcompra-adopción.php"><img src="../View/img/ilustracion1.svg" alt="" width="175" height="175"></a>
                        <h3>Adopción</h3>
                        <p>Adoptar es más que una decisión, es un acto de amor y responsabilidad que cambia vidas.</p>
                    </div>
                    <div class="servicio-ind">
                        <a href="../Fundacion_Grupo5/View/VAcompra-adopción.php"><img src="../View/img/ilustracion4.svg" alt="" width="175" height="175"></a>
                        <h3>Compra</h3>
                        <p>Somos una fundación comprometida con la compra ética de animales, se prioriza el bienestar de los animales por encima de todo.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>099 986 8985</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>fundaciónCanRiño@gmail.com</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <div class="elementos">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63810.108597559796!2d-78.69921910638564!3d-1.6659953726560397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d3078aaebfb5a7%3A0xfa2beac9c33467a3!2sHOTEL%20CHIMBORAZO%20Internacional!5e0!3m2!1ses-419!2sec!4v1707703749085!5m2!1ses-419!2sec" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <h2 class="titulo-final">&copy; Aplicaciones Informáticas | Grupo 5</h2>
    </footer>
</body>
</html>

