<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" />


        <title>Cité Universitaire</title>

    </head>


    <style type="text/css">
      

            html, body {
                background-image: url(' {{ asset("images/bg.jpg") }} ');
                color: #fff;
                font-family: calibri light;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            a:link {
                text-decoration: none;
            }

            a:visited {
                text-decoration: none;
            }

            a:hover {
                text-decoration: none;
            }

            a:active {
                text-decoration: none;
            }

            a{

                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                color: #fff;
                
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 100px;
            }

            .links > a {
                color: #636b6f;
                padding: 10 30px;
                font-size: 22px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .my-btn{
                border: 1px solid #fff;
                padding: 10px 30px;
                background-color: #0871f3;
                border-radius: 3%;
                transition: all 2s;
            }
            .my-btn:hover{
                background-color: rgba(255, 255, 255, 0.8);
                color: #fff;
                transition: all 1s;
            }

            

    </style>


    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right">
                    @auth
                        <a href="{{ url('/home') }}">accueil</a>
                    @else
                        <a href="{{ url('/login') }}">Connexion</a>
                        <!-- <a href="{{ route('register') }}">Register</a> -->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" >
                    Cité Universitaire
                </div>

                <div class="links">
                    @auth

                    @else
                        <H1><strong>Faire une demande de logemen</strong> </H1><br><br>
                        <a style="color: #fff;"  href="/login#toregister"   class="my-btn" href="">Inscription</a>
                    @endauth
                </div>
              
            </div>
        </div>
    </body>
    


</html>
