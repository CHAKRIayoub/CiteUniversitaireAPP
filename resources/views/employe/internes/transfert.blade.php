@extends('layouts.template')
@section('content')
<style type="text/css"> 
</style>
<!-- __________________________________ HTML _____________________________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app">
  <!-- ____________ content titre ___________ -->
  <div class="page-title">
    <div style="float: left; font-size: medium; width: 100%">
      <ol class="breadcrumb" style="background-color: #eee">         
        <li><a href="/home">
          <i class="fa fa-home"></i> Acceuil
        </a></li>
        <li><a href="/internes">
          <i class="fa fa-users"></i> Gestion des Résidents
        </a></li>
        <li class="active">
          <i class="fa fa-exchange"></i> Transfert des Résidents 
        </li>  
      </ol>
    </div>
  </div>
  <div class="clearfix"></div>
  <!-- ____________ content body ___________ -->
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
    <div class="x_content">
      <div class="x_panel">  
        <div class="x_title">
          <div class="h3" ><i class="fa fa-exchange"></i> Transfert Un Résident</div> 
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-10 col-xs-12 col-md-offset-1">
            <!-- ____________  form ___________ -->
            <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('transfert.update', $dossier->user_id) }}">{{ csrf_field() }} {{ method_field('PATCH') }}
              <div class="form-group"><br><br>
                <label class="control-label col-md-4 col-sm-2 col-xs-12">
                  Transférer le Résident : 
                </label>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <input readonly class="form-control" type="text" value="{{ $dossier->nom }} {{ $dossier->prenom }} ({{ $dossier->cin }})" >
                   
                </div>
              </div>
              <div class="form-group"><br>
                <label class="control-label col-md-4 col-sm-2 col-xs-12">
                  du Chambre : 
                </label>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <input readonly class="form-control" type="text" value="{{ $chambre->id }} , {{ $chambre->bloc->titre }}" >
                   
                </div>
              </div>
              <div class="form-group"><br>
                <label class="control-label col-md-4 col-sm-2 col-xs-12">
                  liste des blocs {{ $dossier->genre }} : 
                </label>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <select v-bind:class="{inputerror : errors.has('bloc')}"  v-validate="'required'" v-model="bloc" class="select2_group form-control" name="bloc">
                    @foreach ($blocs as $bloc)
                      <option value="{{ $bloc->id }}">
                        {{ $bloc->titre }}  
                      </option>
                    @endforeach
                  </select>
                  <span v-show="errors.has('bloc')" style="color: red; float: right;">
                    veuillez selectionnez un bloc
                  </span>
                </div>
              </div>
              <div class="form-group"><br>
                <label class="control-label col-md-4 col-sm-2 col-xs-12">
                   Liste des chambres vide : 
                </label>
                <div class="col-md-6 col-sm-12 col-xs-12">
                   <select v-model="chambre" v-bind:class="{inputerror : errors.has('chambre')}"  v-validate="'required'" class="select2_group form-control" name="chambre">
                      <option v-for="c in chambres" >
                        @{{ c.id }}  
                      </option>
                  </select>
                  <span v-show="errors.has('chambre')" style="color: red; float: right;">
                    veuillez selectionnez une chambres
                  </span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-9" >
            <!--______________ form buttons _____________ -->
                <button :disabled="errors.any()" style="float;right;margin-top:15px;" type="submit" class="btn btn-success" v-on:click="submitForm">
                    <i class="fa fa-exchange"></i> Transférer
                </button>
              </div>
            </form>
          </div>
        </div>
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
<!-- ________________________JS___________________________________ -->
<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/vue.js")}}"></script>
<script src="{{ asset("js/vee-validate.js")}}"></script>
<script src="{{ asset("js/jspdf.min.js")}}"></script>
<script src="{{ asset("js/jspdf.plugin.autotable.js")}}"></script>
<script src="{{ asset("js/functions.js")}}"></script>
<!-- ____________  template modal confirmez suppresion  ___________ -->

<!-- ____________  Vue Script (loading..., delete modal)  ___________ -->
<script>
  Vue.use(VeeValidate);

  //____________  Vue instance  ___________ -->
  var app = new Vue({
      el: '#app',
      data: {
        blocs: @json($blocs),
        bloc: '',
        chambre: '',
        chambres: '',
        chargement: true
      },
      watch: {
        bloc: function (val) {
          this.chambres = this.blocs.find(x => x.id == this.bloc).chambres;
        },
        
      },
      methods:{
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
  });
</script>
<!-- //____________  data table  ___________ -->
<script>

</script>
@endsection