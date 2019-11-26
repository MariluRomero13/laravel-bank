<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>HSTW BANK</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app" v-cloak>
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>HSTW BANK</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">Inicio</a></li>
                    <li><a href="#desc" class="smoothScroll">Nosotros</a></li>
                    <li><a href="#contact" class="smoothScroll">Contácto</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <section id="home" name="home">
        <div id="headerwrap">
            <div class="container">
                <div class="row centered">
                    <div class="col-md-12">
                        <h1>HSTW BANK</h1>
                    </div>
                    <br>
                    <div class="container fluid">
                        <div class="row">
                            <div class="col col-md-12">
                                <div class="container">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img class="center-block" src="/img/landimg1.jpg" alt="Los Angeles">
                                                <div class="carousel-caption">
                                                    <h1 class="imgc">Solicita tu tarjeta y aprovecha todas las promociones.</h1>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <img class="center-block" src="{{ asset('/img/landimg2.jpg') }}" alt="Chicago">
                                                <div class="carousel-caption">
                                                    <h1 class="imgc">Asegura el futuro de tu familia.</h1>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <img class="center-block" src="{{ asset('/img/landimg3.jpg') }}" alt="New York">
                                                <div class="carousel-caption">
                                                    <h1 class="imgc">Consigue ese préstamo que tanto quieres.</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="container lmp">
                                <div class="col-md-4 col-sm-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body"><strong>Cómo preparar las finanzas de las fiestas decembrinas.</strong></div>
                                        <div class="well"> En esta temporada muchos mexicanos reciben el aguinaldo y otras compensaciones, por lo que mantener el control sobre las compras y gastos se convierte en todo un reto. Aquí se proponen una serie de medidas para llevar a cabo una óptima administración del dinero de cara a la temporada navideña. </div>
                                    </div>
                                </div> 
                                <div class="col-md-4 col-sm-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body"><strong> HSTW México sigue fortaleciendo el uso de ia para mejorar la experiencia del cliente </strong></div>
                                        <div class="well"> Uno de los ejes estratégicos de HSTW en México es poner al cliente en el centro del negocio, mejorando su experiencia y desarrollando servicios que favorezcan un manejo ágil, fácil y seguro de sus finanzas. A través del uso de la Inteligencia Artificial (IA) y mecanismos... <a>Leer más</a></div>
                                    </div>  
                                </div> 
                                <div class="col-md-4 col-sm-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body"><strong> ¿Cómo comenzar a usar codi en la app HSTW México?</strong> </div>
                                        <div class="well"> El pasado 30 de septiembre inició operaciones el programa de Cobro Digital (CoDi), implementado por el Banco de México (Banxico). Se trata de un sistema para realizar pagos, cobros y transferencias por medio de códigos QR y la tecnología NFC. En esta plataforma se pueden... <a>Leer más</a> </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div> <!--/ .container -->
        </div><!--/ #headerwrap -->
    </section>

    <section id="desc" name="desc">
        <!-- INTRO WRAP -->
        <div id="intro">
            <br>
            <br>
            <div class="container">
                <div class="row centered">
                    <div class="col-lg-4">
                        <img src="{{ asset('/img/msecu.png') }}" alt="" style="width:12rem">
                        <h3>Séguridad</h3>
                        <p>Porqué nos importas, ofrecemos seguros de hasta el 100%.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ asset('/img/check.png') }}" alt="" style="width:12rem">
                        <h3>Crédito</h3>
                        <p>Nosotros te damos tu credito fácilmente y con la tasa de interés mas baja.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ asset('/img/ter.png') }}" alt="" style="width:12rem">
                        <h3>Fácilidad</h3>
                        <p>Dispón de efectivo en cualquiera de nuestros cajeros automáticos y paga facilmente en cualquier establecimiento.</p>
                    </div>
                </div>
                <br>
                <hr>
            </div> <!--/ .container -->
            <br>
            <div class="container">
                <div class="jumbotron">
                    <h1 class="jmt">Preservar tu confianza es lo más importante para nosotros.</h1> 
                    <p class="jmtp">HSTW impulsa el comportamiento íntegro mediante nuestro Código de Conducta, que es parte de nuestra cultura corporativa.</p> 
                </div>
            </div>
                <br>
            </div> <!--/ .container -->
        </div><!--/ #introwrap -->

        
    </section>

    <section id="contact" name="contact">
        <div id="footerwrap">
            <br>
            <br>
            <div class="container cam">
                <div class="col-md-4">
                    <img src="{{ asset('/img/place.png') }}" alt="Cinque Terre" style="width:10rem">  
                    <br>
                    <br>
                    <p class="small">Sucursales y cajeros.</p>
                    <p class="small acf"link="">Siempre cerca de ti</p>
                </div>

                <div class="col-md-4">
                    <img src="{{ asset('/img/cont.png') }}" alt="Cinque Terre" style="width:10rem">  
                    <br>
                    <br>
                    <p class="small">Buzón de sugerencias.</p>
                    <p class="small acf"link="">Contacta con nosotros</p>
                </div>

                <div class="col-md-4">
                    <img src="{{ asset('/img/serv.png') }}" alt="Cinque Terre" style="width:10rem">  
                    <br>
                    <br>
                    <p class="small">Servicio al cliente.</p>
                    <p class="small acf"link="">24 horas</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div id="c">
            <div class="container">
                <p>
                    HSTW BANK
                </p>

            </div>
        </div>
    </footer>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
