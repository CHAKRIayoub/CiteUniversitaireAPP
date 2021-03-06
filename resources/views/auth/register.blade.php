<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Connexion</title>

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
          <form method="POST" action="/fakeregister" >
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


                          <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <select class="form-control" name="role">
                                    <option value="admin" selected >administrateur</option>
                                    <option value="employe">employée</option>
                                    <option value="etudiant  ">etudiant</option>
                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                              </div>

<br>
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
                Vous avez un Compte ? <a  href="/login" class="">Connexion</a>

              </p>
              <div class="clearfix"></div>
              <br />
            
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
     
    </div>
  </div>

</body>

</html>