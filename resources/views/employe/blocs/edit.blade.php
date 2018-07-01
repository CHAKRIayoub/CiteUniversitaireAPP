@extends('layouts.template')
@section('content')
<!-- ________________HTML________________________________ -->
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
          <i class="fa fa-edit"></i> Modifier un Bloc
        </li>  
      </ol>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    @if (count($errors) < 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br>
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
          <i class="fa fa-edit"></i> Modifier "  {{ $bloc->titre }}  "
        </div>
      </div>
      <div class="x_content"><br>
        <div class="col-md-10 col-xs-12 col-md-offset-1 ">
          <!-- ____________  fomr ___________ -->
          <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('blocs.update', $bloc->id ) }}">
            {{ method_field('PATCH') }} {{ csrf_field() }}
            <!-- ____________  chrgement ___________ -->
            <transition name="modal" v-if="chargement" >
                <div class="loading-mask">
                    <div class="loader"></div>      
                </div>
            </transition><br>
            <!-- titre champ -->
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">
                Libellé : <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input class="form-control" type="text" name="titre" v-model="titre" v-validate="'required|alpha_spaces'" value="{{ $bloc->titre }}">
              <span v-show="errors.has('titre')" style="color: red; float: right;">
                titre incorrecte
              </span>
            </div><br><br><br>
            <!-- radio genre -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">
                Genre : <span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left: 20px;" >
                <label class="radio">
                  <input type="radio" name="genre" value="masculin" 
                    @if ($bloc->genre == "masculin" ) 
                        checked
                    @endif
                  >Masculin
                </label>
                <label class="radio">
                  <input type="radio" name="genre"  value="feminin" 
                    @if ($bloc->genre == "feminin" ) 
                      checked
                    @endif
                  >feminin
                </label>
              </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" >
                <!--___________ buttons ________________-->                   
                <button :disabled="errors.any()" style="float: right;" type="submit" class="btn btn-success" v-on:click="submitForm" >
                    <i class="fa fa-save"></i> Enregistrer
                </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ______________JS_____________________________________________ -->
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
            titre : '{{ $bloc->titre }}',
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