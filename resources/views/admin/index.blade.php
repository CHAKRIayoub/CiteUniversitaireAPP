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

        <br>
    <div class="clearfix"></div>
    <br>

    <div class="row">
       
        <div class="row" >
        
        <div class="col-md-4" >
            <a class="btn btn-primary btn-lg btn-block btn-huge" href="/blocs" >
                <i class="fa fa-building"></i> gestion des Blocs
            </a>
        </div>

        <div class="col-md-4">
            <a class="btn btn-primary btn-lg btn-block btn-huge" href="/chambres" >
                <i class="fa fa-home"></i> gestion des chambres 
            </a>
        </div>

        <div class="col-md-4">
         <a class="btn btn-primary btn-lg btn-block btn-huge" href="/inscriptions" > 
            <i class="fa fa-file"></i> gestion des dossiers 
         </a>
        </div>

    </div>


    <div class="row" >
    
        <div class="col-md-4" >
            <a class="btn btn-primary btn-lg btn-block btn-huge" href="/regles" >
                <i class="fa fa-balance-scale"></i> gestion des régles
            </a>        
        </div>

        <div class="col-md-4">
            <a class="btn btn-primary btn-lg btn-block btn-huge" href="/app" >
                <i class="fa fa-cogs"></i> gestion d'application
            </a>
        </div>

        <div class="col-md-4">
          <a class="btn btn-primary btn-lg btn-block btn-huge" href="/utilisateurs" >
                <i class="fa fa-users"></i> gestion des utilisateurs
          </a>
        </div>

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