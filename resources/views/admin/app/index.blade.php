@extends('layouts.template')

@section('content')

<style type="text/css">
    table{
        width: 100%;
        border: none;
    }
    table td {
        padding: 30px; 
    }

</style>


<!-- __________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app" >

    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
        <div class="title_left">
            <h3>Gestion d'application</h3> <br>
        </div>
    </div>
      
    <div class="clearfix"></div>
    <ul>
         
    </ul>
  

    <br>

    
    <!-- ____________________ content body ________________________ -->
    <div class="row">

         <!-- ____________  alert ___________ -->
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
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif <br><br>
        
        <br><br>
        
        <!-- ____________  fomr div ___________ -->
        <div class="col-md-6 col-md-offset-3 ">

            <!-- ____________  fomr ___________ -->
            <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('app.update',0 ) }}">

                {{ method_field('PATCH') }} {{ csrf_field() }}

                <!-- ____________  chrgement ___________ -->
                <transition name="modal" v-if="chargement" >
                    <div class="loading-mask">
                        <div class="loader"></div>      
                    </div>
                </transition>

                <!-- ____________  form panel ___________ -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Gestion des Dates d'inscription :</h4>
                    </div>
                    <div class="panel-body">
                        
                        <table class="table">
                            <thead>
                                <th> Clé </th>
                                <th> Valeur </th>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Date de Début d'inscription :</td>
                                    <td>
                                        
                                        <input class="form-control" type="date" name="ddi" value="{{ $dates['debut_inscription'] }}" >

                                    </td>
                                </tr>

                                <tr>
                                    <td>Date de fin d'inscription :</td>
                                    <td>
                                        
                                        <input class="form-control" type="date" name="dfi" 
                                        value="{{ $dates['fin_inscription'] }}" >

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" >
                        <br>
                        <!--______________ form buttons _____________ -->
                        <button v-on:click="enabletosend()" style="float: right;" type="submit" class="btn btn-success" >
                            <i class="fa fa-save" ></i> Appliquer 
                        </button>

                        <button style="float: right;" type="reset" class="btn btn-primary">
                            Annuler
                        </button>

                        <br><br><br><br><br><br><br>

                    </div>
            </div>
                        
            </form>
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