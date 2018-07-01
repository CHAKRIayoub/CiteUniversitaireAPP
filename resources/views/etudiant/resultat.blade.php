@extends('layouts.template')

@section('content')

<style type="text/css">
    
    .col-md-6 a{
        padding: 50px;
        font-size: 24px;
    }
    .col-md-6 a:hover{
        transition: 2s all ease ;
        background-color: #9cccf5;
        font-size: 25px;
    }
     .panel-body{
       font-size: 20px;
    }
  

</style>


<!-- __________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app" >

    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
        <div class="title_left">
            <h3>Résutat</h3> <br>
        </div>
    </div><br><br><br><br>
   
    

        <br>
    <div class="clearfix"></div>
    <br>

    <div class="row">
        @if ($message = Session::get('ll'))
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h3> <i class="fa fa-exclamation-triangle"></i> <strong>{{ $message }}</strong></h3>
            </div><br><br>
            
        @endif
        @if ($message = Session::get('lp'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h3><i class="fa fa-smile-o"></i> <strong> {{ $message }}</strong></h3>
            </div><br><br>
            <a href="{{ url('/attestation/admission') }}" style="float: right" class="btn btn-success">
                    <i class="fa fa-download"></i> Aattestation d'admission
            </a>
        @endif
         @if ($message = Session::get('la'))
            <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h3><strong> <i class="fa fa-meh-o"> {{ $message }}</strong></h3>
            </div>
        @endif
         @if ($message = Session::get('lr'))
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h3><strong> <i class="fa fa-frown-o"> {{ $message }}</strong></h3>
            </div>
        @endif


        @isset($chambre)

            <div class="col-md-8 col-md-offset-2" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4> Vous étes parmi nos interns </h4>
                    </div>
                    <div class="panel-body">

                        <ul class="nav nav-tabs">
                             <li class="active"><a data-toggle="tab" href="#chambre" class="text-success"><i class="fa fa-building"></i>  Information sur votre Logement</a></li>
                       
                        </ul>


    <div class="tab-content">
        <div id="chambre" class="tab-pane fade in active">
            <div class="table-responsive panel">
                <table class="table">
                    <tbody>
                         <tr>
                            <td class="text-success"><i class="fa fa-"></i>  Chambre Numéro : </td>
                            <td>{{ $chambre->id }}</td>
                         </tr>
                         <tr>
                            <td class="text-success"><i class="fa fa-"></i> Capacité : </td>
                            <td>{{ $chambre->capacite }}</td>
                        </tr>
                        <tr>
                             <td class="text-success"><i class="fa fa-"></i> bloc : </td>
                            <td>{{ $chambre->bloc->titre }} {{ $chambre->bloc->genre }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

                        
                    </div>
                </div>

            <a href="{{ url('/attestation/residence') }}" style="float: right" class="btn btn-success">  
                <i class="fa fa-download"> </i>   Attestation de Résidence
            </a>

            @endisset





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