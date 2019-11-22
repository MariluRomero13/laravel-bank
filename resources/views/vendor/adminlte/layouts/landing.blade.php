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
                    <li class="active"><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="#desc" class="smoothScroll">{{ trans('adminlte_lang::message.description') }}</a></li>
                    <li><a href="#contact" class="smoothScroll">{{ trans('adminlte_lang::message.contact') }}</a></li>
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
                            <div class="col col-sm-12">
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
                                                <img class="center-block" src="/img/app-bg.png" alt="Los Angeles">
                                            </div>

                                            <div class="item">
                                                <img class="center-block" src="{{ asset('/img/app-bg.png') }}" alt="Chicago">
                                            </div>

                                            <div class="item">
                                                <img class="center-block" src="{{ asset('/img/app-bg.png') }}" alt="New York">
                                            </div>
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="container lmp">
                                <div class="col-md-4 col-sm-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">Lorem</div>
                                        <div class="well">...</div>
                                    </div>
                                </div> 
                                <div class="col-md-4 col-sm-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">Lorem</div>
                                        <div class="well">...</div>
                                    </div>  
                                </div> 
                                <div class="col-md-4 col-sm-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">Lorem</div>
                                        <div class="well">...</div>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ asset('/img/check.png') }}" alt="" style="width:12rem">
                        <h3>Crédito</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ asset('/img/ter.png') }}" alt="" style="width:12rem">
                        <h3>Fácilidad</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <br>
                <hr>
            </div> <!--/ .container -->
            <br>
            <div class="container">
                <div class="jumbotron">
                    <h1>Aqui va info</h1> 
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, iste illum, esse, aliquid laborum iure dolores eos officia nihil impedit commodi iusto optio earum. Ullam voluptate animi ex? Dolore, nisi?</p> 
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
                    <img src="{{ asset('/img/circle.png') }}" alt="Cinque Terre" style="width:10rem">  
                    <br>
                    <br>
                    <p>Lorem</p>
                </div>

                <div class="col-md-4">
                    <img src="{{ asset('/img/circle.png') }}" alt="Cinque Terre" style="width:10rem">  
                    <br>
                    <br>
                    <p>Lorem</p>
                </div>

                <div class="col-md-4">
                    <img src="{{ asset('/img/circle.png') }}" alt="Cinque Terre" style="width:10rem">  
                    <br>
                    <br>
                    <p>Lorem</p>
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
