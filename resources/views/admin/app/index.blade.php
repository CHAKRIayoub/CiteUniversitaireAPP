@extends('layouts.template')
@section('content')
<!-- __________________________HTML____________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app" >
  <!-- ____________________ content Titre ________________________ -->    
  <div class="page-title">
      <div style="float: left; font-size: medium; width: 100%">
          <ol class="breadcrumb" style="background-color: #eee"  >
            <li><a href="/home">
              <i class="fa fa-home"></i> Acceuil
            </a></li>
            <li class="active">
              <i class="fa fa-calendar"></i> Gestion des Dates d'inscription
            </li>
          </ol>
      </div>
  </div>
  <div class="clearfix"></div>
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
    @endif 
    
    <div class="x_panel" style="height:600px;">
      <div class="x_title">
        <h3> <i class="fa fa-calendar"></i> Période d'inscription</h3>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <!-- ____________  form ___________ -->
        <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('app.update',0 ) }}">

          {{ method_field('PATCH') }} {{ csrf_field() }}

          <!-- ____________  chrgement ___________ -->
          <transition name="modal" v-if="chargement" >
            <div class="loading-mask">
              <div class="loader"></div>      
            </div>
          </transition>

          <!-- ____________  form panel ___________ -->
          <table class="table">
            <thead>
              <th> Clé </th>
              <th> Valeur </th>
            </thead>
            <tbody>
              <tr>
                <td>Date de Début d'inscription :</td>
                <td> 
                      <input class="form-control" type="date" 
                      name="ddi" value="{{ $app->date_d }}" >
                </td>
              </tr>

              <tr>
                <td>Date de fin d'inscription :</td>
                <td>        
                  <input class="form-control" type="date" 
                  name="dfi" value="{{ $app->date_f }}" >
                </td>
              </tr>
            </tbody>
          </table>


          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" >
              <br>
                    <!--______________ form buttons _____________ -->
              <button v-on:click="enabletosend()" style="float: right;" type="submit" class="btn btn-success" >
                <i class="fa fa-save" ></i> &nbsp; Appliquer 
              </button>
            </div>
          </div>          
        </form>
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
<!-- ______________________JS____________________ -->
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