@extends('layouts.template')

@section('content')

<style type="text/css">
    
    .col-md-4 a{
        padding: 30px;
        font-size: 20px;
    }
    .col-md-4 a:hover{
        transition: 2s all ease ;
        background-color: #9cccf5;
        font-size: 25px;
    }
     .btn-sq-lg {
      width: 250px !important;
      height: 250px !important;
      padding: 60px;
      font-size: 17px;
    }

</style>

<!-- __________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app" >

    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
        <div class="title_left">
            <h3>Menu</h3> <br>
        </div>
    </div><br><br>
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

         <div class="col-md-8 col-md-offset-2 ">
          <p>
            <!-- <center> -->

<a class="btn btn-sq-lg btn-primary" href="/blocs" >
    <i class="fa fa-building fa-5x"></i><br/><br>Blocs
</a>

<a class="btn btn-sq-lg btn-success" href="/chambres" >
    <i class="fa fa-home fa-5x"></i><br/><br>Chambres 
</a><br>

 <a class="btn btn-sq-lg btn-info" href="/inscriptions" > 
    <i class="fa fa-file fa-5x"></i><br/><br>Dossiers 
 </a>
  
<a class="btn btn-sq-lg btn-warning" href="/internes" >
    <i class="fa fa-users fa-5x"></i><br/><br>Internes
</a>
            <!-- </center> -->
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