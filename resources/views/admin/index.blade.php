@extends('layouts.template')
@section('content')
<style type="text/css">
  .btn-sq-lg:hover{
    transition: 1s all ease ;
    background-color: #2196F3;  
    color: black;
    box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
  }
  .btn-sq-lg {
    transition: 1s all ease ; 
    width:250px !important;
    height: 200px !important;
    /*padding: 25px;*/
    font-size: 15px;
    margin: 15px;
    font-size: 17px;
    border: 0px solid #000;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);    
    transition: box-shadow 0.3s cubic-bezier(.25,.8,.25,1);
    border-radius: 0%;
    background-color: #1976D2;
    color:white;
  }
</style>
<!-- __________________________HTML_____________________________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app" >
  <!-- ____________________ content Titre ________________________ -->    
  <div class="page-title">
    <div style="float: left; font-size: medium; width: 100%">
      <ol class="breadcrumb" style="background-color: #eee"  >
        <li class="active">
          <i class="fa fa-home"></i> Acceuil
        </li>
      </ol>
    </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    <strong>{{ $message }}</strong> 
  </div>
  @endif
  <div class="clearfix"></div>
  <div class="row">
    <!--<a href="/dossier" class="btn btn-sq-lg btn-primary">
      <i class="fa fa-file fa-5x"></i><br/><br>
      <b>Dossier</b> <br> imprimer, modifier...
      </a>
      <a href="/resultat" class="btn btn-sq-lg btn-success">
      <i class="fa fa-bell fa-5x"></i><br/><br>
      <b>Resultat</b> <br> afficher, imprimer...
      </a> -->
    <div class="col-lg-12 ">
      <p>
      <center>
        <a class="btn btn-sq-lg btn-default" href="/blocs" 
          style="background-color:#1976D2;" > <br>
        <i class="fa fa-building fa-4x"></i><br/><br>Gestion des Blocs
        </a>
        <a class="btn btn-sq-lg btn-default" href="/inscriptions" 
          style="background-color:#ff3d00;" > <br>
        <i class="fa fa-files-o fa-4x"></i><br/><br>Gestion des Dossiers 
        </a>
        <a class="btn btn-sq-lg btn-default" href="/chambres" 
          style="background-color:#009688;" ><br>
        <i class="fa fa-bed fa-4x"></i><br/><br>Gestion des Chambres 
        </a><br>
        <a class="btn btn-sq-lg btn-default" href="/regles" 
          style="background-color:#c51162;" ><br>
        <i class="fa fa-balance-scale fa-4x"></i><br/><br>Gestion des Régles
        </a>        
        <a class="btn btn-sq-lg btn-default" href="/app" 
         style="background-color:#00c853;" ><br>
        <i class="fa fa-calendar fa-4x"></i><br/><br>Gestion des Dates
        </a>
        <a class="btn btn-sq-lg btn-default" href="/utilisateurs" 
          style="background-color:#ffab00;" ><br>
        <i class="fa fa-users fa-4x"></i><br/><br>Gestion des utilisateurs
        </a>
      </center>
      </p>
    </div>
  </div>
  <!-- ____________  chrgement ___________ -->
  <transition name="modal" v-if="chargement" >
    <div class="loading-mask">
      <div class="loader"></div>
    </div>
  </transition>
</div>
<!-- __________________________________JS_____________________________________________ -->
<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/vue.js")}}"></script>
<!-- ____________  Vue Formulaire Instance   ___________ -->
<script type="text/javascript">
  new Vue({  
      el : '#app',
      data() {
          return{
              chargement: true
          }
      },
      methods: {
          
      },
      mounted: function () {    
          this.chargement = false;
          $('.row').addClass('animated fadeInUp');
      }
  })
  
</script>
@endsection