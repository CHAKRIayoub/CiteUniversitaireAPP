@extends('layouts.template')
@section('content')
<style type="text/css">
</style>
<!-- _____________________HTML________________________ -->
<!-- ____________ content __________________ -->
<div class="right_col" role="main">
  <!-- ____________________ content Titre ________________________ -->    
  <div class="page-title">
    <div style="float: left; font-size: medium; width: 100%">
      <ol class="breadcrumb" style="background-color: #eee"  >         
        <li><a href="/home">
          <i class="fa fa-home"></i> Acceuil
        </a></li>
        <li><a href="/utilisateurs">
          <i class="fa fa-users"></i> Gestion des Utilisateurs
        </a></li>
        <li class="active">
          <i class="fa fa-edit"></i> Modifier un Utilisateur
        </li>  
      </ol>
    </div>    
  </div>    
  <div class="clearfix"></div>      
    <!-- ____________________ content body ________________________ -->    
  <div class="row">
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong>{{ $message }}</strong> 
      </div>
    @endif 
    <!-- ____________  errors ___________ -->
    @if (count($errors) < 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif 
    <div class="x_panel">
      <div class="x_title">
          <div class="h3">
            <i class="fa fa-edit"></i> Modifier l'employée N°
          </div>
          <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <!-- ____________  fomr div ___________ -->
        <div class="col-md-10 col-xs-12 col-md-offset-1 ">
          <!-- ____________  form ___________ -->
          <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('utilisateurs.update', $user->id) }}">
            {{ csrf_field() }} {{ method_field('PATCH') }}
            <!-- ____________  chrgement ___________ -->
            <transition name="modal" v-if="chargement" >
              <div class="loading-mask">    
                <div class="loader"></div>  
              </div>
            </transition>
            <!-- ____________  form panel ___________ -->
            <br><br>
            
            <label class="control-label col-md-2 col-sm-2 col-xs-12">
              Nom et Prenom * <span class="required"></span>
            </label>
            <div class="col-md-8 col-sm-12 col-xs-12">  
                <input value="{{ $user->name }}" class="form-control" type="text" name="name">
            </div><br><br><br>
            
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >
              E-mail * <span class="required"></span>
            </label>
            <div class="col-md-8 col-sm-12 col-xs-12">
              <input value="{{ $user->email }}" class="form-control" type="email" name="email">
            </div><br><br><br>

            <label class="control-label col-md-2  col-sm-2 col-xs-12">
              Mot de Passe * <span class="required"></span>
            </label>
            <div class="col-md-8 col-sm-12 col-xs-12">  
              <input class="form-control" type="password" name="password">
            </div><br><br><br>

            <label class="control-label col-md-2 col-sm-2 col-xs-12">
              Droits d'accées * <span class="required"></span>
            </label>
            <div class="col-md-8 col-sm-12 col-xs-12">
              <select class="form-control" name="droits[]" multiple="multiple">
                                <option value="gestion des blocs">
                  Gestion des Blocs
                </option>
                <option value="gestion des chambres">
                  Gestion des Chambres
                </option>
                <option value="gestion des dossiers">  
                  Gestion des Dossiers
                </option>
                <option value="gestion des residents">
                  Gestion des Internes
                </option>
                <option value="gestion des regles">
                  Gestion des Régles
                </option>
                <option value="gestion des dates">
                  Gestion des Dates
                </option>
              </select>
            </div>
            <br><!--______________ form buttons _____________ -->
            <div class="col-md-2 col-sm-12 col-xs-12 col-md-offset-8" >
              <button style="margin-top: 15px" :disabled="errors.any()" type="submit" class="btn btn-success btn-block" v-on:click="submitForm" >
                <i class="fa fa-save"></i> Enregistrer
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>  
</div>
<!-- _________________________JS____________________________ -->
<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/vue.js")}}"></script>
<script src="{{ asset("js/vee-validate.js")}}"></script>
<!-- ____________  Vue Formulaire Instance   ___________ -->
<script type="text/javascript">
    Vue.use(VeeValidate);
    //v-validate="{ rules: { regex:  /.[0-9]{3,}$/} }"
    new Vue({  
        el : '#form',
        data() {
            return{
                titre : '',
                chargement: true
            }
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