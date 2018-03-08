@extends('layouts.template')

@section('content')

<style type="text/css">
    
    .col-md-6 a{
        padding: 50px 50px 50px 50px;
        font-size: 24px;
    }
    .col-md-6 a:hover{
        transition: 2s all ease ;
        background-color: #9cccf5;
        font-size: 25px;
    }
    .btn-sq-lg {
      width: 250px !important;
      height: 250px !important;
      padding: 60px;
      font-size: 17px;
      margin-top: 90px;
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
        <div class="col-md-8 col-md-offset-2">
          <p>
            <center>
            <a href="/dossier" class="btn btn-sq-lg btn-primary">
                <i class="fa fa-file fa-5x"></i><br/><br>
                <b>Dossier</b> <br> imprimer, modifier...
            </a>
            <a href="/resultat" class="btn btn-sq-lg btn-success">
              <i class="fa fa-bell fa-5x"></i><br/><br>
              <b>Resultat</b> <br> afficher, imprimer...
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