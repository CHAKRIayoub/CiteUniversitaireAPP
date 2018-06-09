<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Connexion</title>

  <style type="text/css">
      
  </style>

  <!-- Bootstrap core CSS -->

  <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
  <link href="{{ asset("fonts/css/font-awesome.min.css") }}" rel="stylesheet">
  <link href="{{ asset("css/animate.min.css") }}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{ asset("css/custom.css") }}" rel="stylesheet">
  <link href="{{ asset("css/icheck/flat/green.css") }}" rel="stylesheet">


  <script src="{{ asset("js/jquery.min.js") }}"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form method="POST" action="{{ route('login') }}" >
            {{ csrf_field() }}
            <h1>Cité Universitaire</h1>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
              <input class="form-control  " placeholder="Email" id="email" type="email" 
              name="email" value="{{ old('email') }}" required autofocus />

               @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" >
              <input  class="form-control" placeholder="*******" id="password" type="password" name="password" required />

                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>

                    <div style="float: left" class="form-group">
                            
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                    
                        </div>

            <div>
              <input style="float: right" type="submit" class="btn btn-success" value="Connexion" ></input>
              
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <p class="change_link">
                <a style="float: right;"  href="#toregister" class=""> crée un compte </a>
                <a style="float: left" class="" href="#">Mot de passe oublié</a>

              </p>
              <div class="clearfix"></div>
              <br />
            
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>

         

      <div id="register" class="animate form">

 <!-- @if((strtotime(date('y-m-d')) >= strtotime($app->date_d)) && (strtotime($app->date_f) >= strtotime(date('y-m-d'))) )   -->
        <section class="login_content">
          
           <form method="POST" action="{{ route('register') }}" >
            {{ csrf_field() }}
            <h1>Cité Universitaire</h1>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <input placeholder="Nom et Prenom" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input placeholder="********" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                                <input placeholder="********" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

           
            <div>
              <input style="float: none; margin-left: 0px" type="submit" class="btn btn-success" value="Inscription" ></input>
              
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <p class="change_link">
                Vous avez un Compte ? <a  href="#tologin" class="">Connexion</a>

              </p>
              <div class="clearfix"></div>
              <br />
            
            </div>
          </form>
           
        </section>


        <!-- content 
         @else

<img src="{{ asset("images/error.jpg") }}" width="350px" >
<!- <div class="panel panel-default">
  <div class="panel-body" >
    <h2 style=" font-family: calibri light; color: red; " >la délai (entre le {{ $app->date_d}} et le {{ $app->date_f }} ) d'inscription était expiré </h2>
    </div>
</div> 
<p class="change_link">
  Vous avez un Compte ? <a  href="#tologin" class="">Connexion</a>
</p>


        @endif-->
      </div>

      
   
    </div>
  </div>

</body>

</html>