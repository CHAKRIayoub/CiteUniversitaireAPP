@extends('layouts.template')
@section('content')
<!-- _______________________HTML____________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main">
  <!-- ____________________ content Titre ________________________ -->    
  <div class="page-title">
    <div style="float: left; font-size: medium; width: 100%">
      <ol class="breadcrumb" style="background-color: #eee">         
        <li><a href="/home">
          <i class="fa fa-home"></i> Acceuil
        </a></li>
        <li><a href="/blocs">
          <i class="fa fa-building"></i> Gestion des Blocs
        </a></li>
        <li class="active">
          <i class="fa fa-plus"></i> Ajouter un Bloc
        </li>  
      </ol>
    </div>
  </div>
  <!-- ____________________ bouton précedent ________________________ -->      
  <div class="clearfix"></div>      
  <!-- ____________________ content body ________________________ -->    
  <div class="row">
    <!-- ____________  errors ___________ -->
    @if (count($errors) < 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with<br><br>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>
    @endif 
      <!-- ____________  form panel ___________ -->
    <div class="x_panel">    
      <div class="x_title">
        <div class="h3">
          <i class="fa fa-plus"></i> Ajouter Un Bloc
        </div>
      </div>
      <div class="x_content"><br>
        <div class="col-md-10 col-xs-12 col-md-offset-1 ">
          <!-- ____________  form ___________ -->
          <form id="form" class="form-horizontal form-label-left" method="POST"action="{{ route('blocs.store') }}">
            {{ csrf_field() }}
            <!-- ____________  chrgement ___________ -->
            <transition name="modal" v-if="chargement" >
              <div class="loading-mask">    
                <div class="loader"></div>  
              </div>
            </transition>
            <!--______________ titre champ _______________-->
            <!-- titre label -->
            <label class="control-label col-md-4 col-sm-2 col-xs-12">
              Libellé : <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <!-- _________________ titre Input __________________ -->
              <input class="form-control" type="text" name="titre" v-model="titre" v-validate="'required|alpha_spaces'">
              <!-- _____________ titre error _________ -->
              <span v-show="errors.has('titre')" style="color: red; float: right;">
                titre incorrecte
              </span>
            </div><br><br><br>
            <label class="control-label col-md-4 col-sm-2 col-xs-12">
              Nombre des chambres : <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <input class="form-control" type="number" name="nbch">
            </div><br><br><br>
            <label class="control-label col-md-4 col-sm-2 col-xs-12">
              Capacité de chaque chambres : <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-12 col-xs-12">  
              <input class="form-control" type="number" name="cpch"> 
            </div><br><br><br>
            <!-- radio genre -->
            <div class="form-group">
              <br>
              <label class="control-label col-md-4 col-sm-2 col-xs-12">
                Genre : <span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-12 col-xs-12" style="margin-left: 20px;">
                <label class="radio">
                  <input checked="" type="radio" name="genre" value="masculin">
                  Masculin
                </label>
                <label class="radio">
                  <input type="radio" name="genre"  value="feminin" >
                  feminin
                </label>
              </div>
            </div>
          </form>
          <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-9" >
            <!--______________ form buttons _____________ -->
            <button style="margin-top: 15px" :disabled="errors.any()" style="float: right;" type="submit" class="btn btn-success" v-on:click="submitForm" >
                <i class="fa fa-plus"></i>  Ajouter
            </button>
          </div>
        </div>
      </div>
    </div>    
  </div> 
</div>
<!-- _______________________JS_____________________________ -->
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