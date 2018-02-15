@extends('layouts.template')

@section('content')

<!-- __________________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="left_col" role="main">

    <!-- ____________________ content Titre ________________________ -->    
   
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
            
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:700px;">
                <div class="x_title">
                  <a href="{{ route('utilisateurs.index') }}" style="float: right" class="btn btn-info" > <i class="fa fa-arrow-left"> </i>  Precedent</a>
                  <h3><i class="fa fa-user">  Gestion des employes</i></h3>
                 
                  <div class="clearfix"></div>

                </div>

                  <div class="row">
        
        <!-- ____________  errors ___________ -->
        @if (count($errors) < 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif <br><br>

        <!-- ____________  fomr div ___________ -->
<div class="">
    
    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="AjouteUser">

          <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('utilisateurs.update', $user->id ) }}">
    {{ csrf_field() }}  {{ method_field('PATCH') }}
            <h1>  <center><i class="fa fa-user"></i><br>Modifie l'employé : {{ $user->name }} </center></h1>
            <br>


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <input placeholder="Nom et Prenom" id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>


        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input placeholder="********" id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                                <input placeholder="********" id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                        </div>

           
            <div>
                                    <button :disabled="errors.any()" style="float: right;" type="submit" class="btn btn-success" v-on:click="submitForm" >
                                        Enregistrer
                                    </button>

                                    <button style="float: right;" type="reset" class="btn btn-primary">
                                        Annuler
                                    </button>           
            </div>
            
            
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
     
    </div>
  </div>

    </div>
   
</div>

<!-- __________________________________JS_____________________________________________ -->

<!-- ____________  required files  ___________ -->
        
<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/vue.js")}}"></script>
<script src="{{ asset("js/vee-validate.js")}}"></script>


<!-- ____________  Vue Form Instance  ___________ -->
<script type="text/javascript">

    Vue.use(VeeValidate);
    //v-validate="{ rules: { regex:  /.[0-9]{3,}$/} }"
  
    new Vue({    
        el : '#form',
        data : {
            id : '{{ $user->id }}',
            chargement : true
        },
        methods: {
            submitForm() {
                this.$validator.validateAll().then(res=>{
                    if(res) {
                        return true;
                    } else {
                        alert('veuillez remplire les champs nécessaire');
                        return false;
                    }
                })
            }
        },
        mounted: function () {
              this.chargement = false;
              $('.row').addClass('animated fadeInUp');

        }
    })
</script>

@endsection