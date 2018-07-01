@extends('layouts.template')
@section('content')
<!-- ___________________HTML_________________________________ -->
<!-- ______________ content ___________________ -->
<div class="right_col" role="main">
  <div class="">
    <!-- ____________________ content Titre ________________________ -->
    <div class="page-title">
      <div style="float: left; font-size: medium; width: 100%">
        <ol class="breadcrumb" style="background-color: #eee">         
          <li><a href="/home">
            <i class="fa fa-home"></i> Acceuil
          </a></li>
          <li><a href="/chambres">
            <i class="fa fa-bed"></i> Gestion des Chambres
          </a></li>
          <li class="active">
            <i class="fa fa-edit"></i> Modifier une Chambre
          </li>  
        </ol>
      </div>
    </div>    
  <div class="clearfix"></div>  
  <!-- ____________________ bouton précedent ________________________ 
  <a href="{{ route('blocs.index') }}" style="float: right" class="btn btn-info"> <i class="fa fa-arrow-left"> </i> Precedent</a>-->
  <div class="clearfix"></div>
  <!-- ____________________ content body ________________________ -->
  <div class="row">
    <!-- ____________  errors ___________ -->
    @if (count($errors) < 0) 
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.
      <br>
      <br>
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
          <i class="fa fa-edit"></i> Modfier Une Chambre
        </div>
      </div>
      <div class="col-md-10 col-xs-12 col-md-offset-1">
        <!-- ____________  fomr ___________ -->
        <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('chambres.update', $chambre->id ) }}">
          {{ method_field('PATCH') }} {{ csrf_field() }}
          <!-- ____________  chrgement ___________ -->
          <transition name="modal" v-if="chargement">
            <div class="loading-mask">
              <div class="loader"></div>
            </div>
          </transition><br>
          <!-- titre champ -->
          <label class="control-label col-md-4 col-sm-2 col-xs-12" for="titre">Capacité : <span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <input v-bind:class="{inputerror : errors.has('capacite')}" class="form-control" type="number" name="capacite" v-model="capacite" v-validate="'required|numeric|min:{{count($chambre->hebergements)}}'" value="{{$chambre->capacite}}" min="{{count($chambre->hebergements)}}">
            <span v-show="errors.has('capacite')" style="color: red; float: right;">
                Capacité incorrecte
            </span>
          </div><br><br><br>
          <!-----------  Select nouveau bloc   ------------>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-2 col-xs-12">Bloc :</label>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <select class="select2_group form-control" name="bloc">
                <optgroup label="Masculin">
                  @foreach ($blocs as $bloc) 
                    @if($bloc->genre=='masculin')
                      <option 
                        @if ($bloc->id == $chambre->bloc_id) selected @endif 
                        value="{{ $bloc->id }}">{{ $bloc->titre }}
                      </option>
                    @endif
                  @endforeach
                </optgroup>
                <optgroup label="Feminin">
                  @foreach ($blocs as $bloc) 
                    @if($bloc->genre=='feminin')
                      <option @if ($bloc->id == $chambre->bloc_id) selected @endif value="{{ $bloc->id }}">{{ $bloc->titre }}
                      </option>
                    @endif 
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div><br>
          <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-9">
            <!--___________ buttons ________________-->
            <button :disabled="errors.any()" style="float;right;margin-top:15px;" type="submit" class="btn btn-success" v-on:click="submitForm">
              <i class="fa fa-save"></i> Enregistrer
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- _________________________JS_____________________________________ -->
<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/vue.js")}}"></script>
<script src="{{ asset("js/vee-validate.js")}}"></script>
<!-- ____________  Vue Form Instance  ___________ -->
<script type="text/javascript">
  Vue.use(VeeValidate);
  //v-validate="{ rules: { regex:  /.[0-9]{3,}$/} }"
  new Vue({    
      el : '#form',
      data : {
          capacite : '{{ $chambre->capacite }}',
          min: '{{ count($chambre->hebergements) }}',
          chargement : true
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