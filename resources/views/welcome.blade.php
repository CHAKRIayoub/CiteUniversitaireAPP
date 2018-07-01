<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>
<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Cité Universitaire</title>
    <meta name="description" content="Cité Universitaire">
    <meta name="" content="">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400' rel='stylesheet' type='text/css'>
    <!-- Library CSS -->
  <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet"/>
  <link href="{{ asset("css/bootstrap.min.css")}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset("css/css/bootstrap-theme.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/css/bootstrap-modal-carousel.css") }}">
    <link rel="stylesheet" href="{{ asset("fonts/et-line-font/etline.css") }}">
    <link rel="stylesheet" href="{{ asset("css/css/animations.css") }}>
    <link rel="stylesheet" href="{{ asset("css/css/owl.carousel.css") }} >
    <link rel="stylesheet" href="{{ asset("css/css/YTPlayer.css") }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset("css/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/css/component.css") }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset("css/css/theme-responsive.css") }}">

    <!-- Favicons -->
    <script src="{{ asset("js/js/modernizr.custom.js") }}"></script>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target="#navigation" data-offset="75">
<!-- Preloader Start -->
<div class="page-mask">
    <div class="page-loader">
        <div class="loading">
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
        </div>
    </div>
</div>
<!-- Preloader End -->
<!-- Wrapper Start -->
<div class="wrap">


    <header id="home">
        <!-- Image Background Start -->
        <div class="image-section">

            <div class="color-overlay"></div>

            <div class="container js-full-height">

                <div class="hero-content">
                    <div class="hero-text">
                        <div class="big-title">
                            <h2 class="wow fadeInUp" data-wow-delay="300ms">Cité Universitaire</h2>

                            @auth

                            @else

                            <p class="wow fadeInUp" data-wow-delay="300ms">Faire une demande de logement </p>

                            @endauth
                        </div>

                        
                        <div class="app-store-btn">
                               
                                <p data-wow-delay="300ms" style="color:white;">
                                    @auth

                                    @else
                                        <a href="/login#toregister"  class="btn btn-4 btn-4c" href="">Inscription</a>
                                    @endauth
                                </p>
                        </div>
                        
                        <div class="go-down-icon">
                                
                            <a href="#how-it-works" class="hidden-xs"><i class="sht sht-down-arrow-icon"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Image Background End -->
    </header>
    <!-- client logo section Start-->

    <!-- /client logo section Start-->
    <div class="modal fade modal-fullscreen force-fullscreen" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="modal-close">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <section class="header-nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo-brand" style="float: left">
                        <h1><a id="logo" href="#"><img src="{{ asset("images/img/aa.png") }}" alt="logo"></a></h1>

                    </div>
                </div>
                <div class="col-sm-9" >
                    <div class="top-nav">
                        <nav>
                            <style type="text/css">
                            a:hover, a:active, a:visited, a:focus{
                                text-decoration: none;
                                transition: all 1s ease;
                                color: #fff;
                            }</style>
                            <div class="menu-barr"  style="float: right; padding-top: 20px;">

                                 <a href="#how-it-works" class="menu-text" style="color: #E8E8E8;">Comment ça marche</a>&emsp;&emsp;

                                <a href="#you-love" class="menu-text" style="color: #E8E8E8;">CARACTÉRISTIQUES </a>&emsp;&emsp;
                               
                                <a href="#download-our-app" class="menu-text" style="color: #E8E8E8;">Trouvez Nous</a>&emsp;&emsp;

                                 @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/home') }}" class="menu-text" style="color: #E8E8E8;">Accueil</a>&emsp;&emsp;
                                    
                                    @else
                                        <a href="{{ url('/login') }}" class="menu-text" style="color: #E8E8E8;" ><span>Connexion</span></a>
                                    @endauth

                                @endif

                            </div>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Feature-0 Start-->
  
    <!-- Feature-0 End-->

    <!-- Feature Dope-bg Section Start-->
    
    <!-- Feature Dope-bg Section End-->

    <!-- How it works Section Start -->
    <section id="how-it-works" class="working-steps padding-top100 padding-bottom115">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInUp" data-wow-delay="300ms">
                        <h2 class="title wow fadeInUp" data-wow-delay="300ms">Comment ça marche?</h2>

                        <p class="wow sub_title fadeInUp" data-wow-delay="300ms">
                            étapes trés simple</p>
                    </div>
                </div>
            </div>
            <div class="row padding-top100">
                <div class="work-step-container wow fadeIn">
                    <div class="col-md-4 col-sm-4">
                        <div class="work-step-box text-center">
                            <span class="step-no">1</span>
                            <i class="sht sht-download-icon-alt"></i>
                            <h4>inscrivez-vous</h4>

                            <p>
                                Crée un compte
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="work-step-box text-center">
                            <span class="step-no">2</span>
                            <i class="sht sht-install-icon"></i>
                            <h4>remplir le formulaire</h4>

                            <p>
                                Remplir le formulaire et upload les fichiers
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="work-step-box text-center">
                            <span class="step-no">3</span>
                            <i class="sht sht-play-icon"></i>
                            <h4>Résultat</h4>

                            <p>
                                Attendre le résultat Puis Payment 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How it works Section End -->
    <!-- Stats Section Start -->
   
    <!-- Stats Section End -->
    <!-- cHouse-timeline Start -->
   
    <!-- cHouse-timeline End -->
    <!-- Beautiful Design Section Start -->
   


    <!-- Beautiful Design Section End -->
    <!-- Share The Love Section Start -->
    
    <!-- Share The Love Section END -->
    <!--  Features You Will Love Start -->
    <section id="you-love" class="features-love-wrapper padding-top100 padding-bottom30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInUp" data-wow-delay="300ms">
                        <h2 class="title wow fadeInUp" data-wow-delay="300ms">Caractéristiques que vous allez aimer</h2>

                        <p class="wow sub_title fadeInUp" data-wow-delay="300ms">
                            Notre Cité universitaire contient plusieurs caractéristiques qui sont 
                            <br>vraiment utile pour vous.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row padding-top50">
                <div class="col-md-10 col-md-offset-1">
                    <div class="features-love-inner">
                        <div class="row" data-wow-duration="1.5s" data-wow-delay="1.5s">
                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class=" icon icon-desktop"></span>
                                    <h4>TV</h4>

                                    <p>
                                        tv.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class=" icon icon-book-open"></span>
                                    <h4>Biblio</h4>

                                    <p>
                                        Biblio
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class="icon icon-cloud"></span>
                                    <h4>Internet</h4>

                                    <p>
                                        Internet avec bonne débit.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class="fa fa-futbol-o fa-5x"></span>
                                    <h4>Terrains de Sport</h4>

                                    <p>
                                        Terrains Foot - Basket - HandBall - Tennis.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class="fa fa-shower fa-5x"></span>
                                    <h4>douche</h4>

                                    <p>
                                        douche.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class="fa fa-cutlery fa-5x"></span>
                                    <h4>Restaurant.</h4>

                                    <p>
                                        Restaurant.
                                    </p>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--  Features You Will Love End -->
    <!-- Testimonial Section Start -->
    
    <!-- Testimonial Section End -->

    <section id="download-our-app" class="download-our-app ">
        <div class="container">
                <div class="section-title text-center">
                        <h2 class="wow fadeInUp title" data-wow-delay="300ms">Trouvez Nous</h2>
                        
                        
                        
                    </div>
                <div class="mapouter text-center"><div class="gmap_canvas">
                        <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=ENSA de Avenue de la Palestine Mhanech I، Tétouan BP 2222&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <style>.mapouter{text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
                </div>
                </div>
    </section>


    <!-- Email Update Section Start -->
   
    <!-- Email Update Section End -->
   
    <footer id="main-footer" class="padding-top30 padding-bottom30">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                    <nav class="footer-nav">
                        <ul class="footer-nav-inner">
                            <li>
                                <a href="#how-it-works">Comment ça marche</a>
                            </li>

                            <li><a href="#you-love">CARACTÉRISTIQUES</a></li>
                           
                            <li><a href="#download-our-app">Trouvez Nous</a></li>

                             @if (Route::has('login'))
                                @auth
                                    <li>
                                        <a href="{{ url('/home') }}">Accueil</a>
                                    </li>
                                
                                @else
                                    <li>
                                        <a href="{{ url('/login') }}" >
                                            Connexion
                                        </a>
                                    </li>
                                @endauth

                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-sm-12 text-center">
                        <div class="footer-brand padding-top30 padding-bottom30">
                            <img src="images/img/logo-footer.png" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-sm-12 text-center">
                        <div class="footer-copyright">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="footer-social text-center">
                        <ul class="footer-social-links">
                            <li class="facebook"><a href="#"><span class="icon icon-facebook"></span></a></li>
                            <li class="twitter"><a href="#"><span class="icon icon-twitter"></span></a></li>
                            <li class="google-plus"><a href="#"><span class="icon icon-googleplus"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="scrollup hidden-xs" style="display: inline;"><i class="sht sht-arrow_up-icon"></i></a>
</div>
<!-- Wrapper End -->
<script src="{{ asset("js/js/jquery.min.js") }}"></script>
<script src="{{ asset("js/js/jquery-ui.js") }}"></script>
<script src="{{ asset("js/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.ajaxchimp.min.js") }}"></script>
<script src="{{ asset("js/js/modernizr.js") }}"></script>
<script src="{{ asset("js/js/classie.js") }}"></script>
<script src="{{ asset("js/js/fappear.js") }}"></script>
<script src="{{ asset("js/js/jquery.hoverIntent.minified.js") }}"></script>
<script src="{{ asset("js/js/TweenMax.min.js") }}"></script>
<script src="{{ asset("js/js/owl.carousel.js") }}"></script>
<script src="{{ asset("js/js/waypoints.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.countTo.js") }}"></script>
<script src="{{ asset("js/js/wow.js") }}"></script>
<script src="{{ asset("js/js/jquery.waitforimages.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.nicescroll.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/js/jquery.scrollTo.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.localScroll.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.parallax.js") }}"></script>
<script src="{{ asset("js/js/jquery.mb.YTPlayer.min.js") }}"></script>
<script src="{{ asset("js/js/custom.js") }}"></script>

</body>
</html>