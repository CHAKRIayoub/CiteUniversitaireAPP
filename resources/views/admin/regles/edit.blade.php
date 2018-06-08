@extends('layouts.template')
@section('content')
<!-- ______________________________HTML_________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main">
  <!-- ___________ content Titre ____________ -->    
  <div class="page-title">
    <div style="float: left; font-size: medium; width: 100%">
      <ol class="breadcrumb" style="background-color: #eef"  >
        <li><a href="/home">
          <i class="fa fa-home"></i> Acceuil
        </a></li>
        <li class="active">
          <i class="fa fa-balance-scale"></i> Gestion des Régles</li>
      </ol>
    </div>
  </div>
  <div class="clearfix"></div>
  <!-- ____________________ content body ________________________ -->
  <div class="row">
    <!-- ____________  alert ___________ -->
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade in" 
      role="alert">
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
    <!-- ____________  fomr div ___________ -->
    <div class="x_panel" style="height:600px;">
      <div class="x_title">
        <h3> <i class="fa fa-balance-scale"></i> Gestion des Régles</h3>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <!-- ____________  form ___________ -->
        <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('regles.update',0 ) }}">
          {{ method_field('PATCH') }} {{ csrf_field() }}
          <!-- ____________  chrgement ___________ -->
          <transition name="modal" v-if="chargement" >
            <div class="loading-mask">
              <div class="loader"></div>      
            </div>
          </transition>   
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Règle</th>
                <th>Facteur</th>
                <th>Etat</th>
              </tr>
            </thead>
            <tbody>
              @foreach($regles as $regle )
                <tr>
                  <td> {{ $regle->id }} </td>
                  <td>
                    @if($regle->nom == 'nb_enfants') 
                      Nombres des frères @else {{ ucfirst($regle->nom) }}
                    @endif 
                  </td>
                  <td> 
                    <input id="{{ $regle->id }}"  
                      @if($regle->factor == 0) disabled @endif
                      class="form-control" style="width:70px;" 
                      type="number" min="0" max="10" name="factor[]" 
                      value="{{ $regle->factor }}">
                  </td>
                  <td> 
                    <select id="sel{{ $regle->id }}" 
                      v-on:change="check({{ $regle->id }})" 
                      class="form-control" name="etat[]">
                      <option value="1" 
                      @if(! $regle->factor == 0) selected @endif>
                        activé
                      </option>
                      <option value="0" 
                      @if( $regle->factor == 0) selected @endif >
                        désactivé
                      </option>
                    </select>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <br>
              <!--___________ form buttons ___________ -->
              <button v-on:click="enabletosend()" style="float: right;" type="submit" class="btn btn-success" >
                <i class="fa fa-save" ></i> &nbsp; Appliquer 
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- __________________JS______________________ -->
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
            chargement : true,
            etat : '@if(! $regle->factor == 0) 0 @else 1 @endif'
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
            },
            check(id){
                if( $('#sel'+id).val() == "0" ){
                    $('#'+id).prop('value', 0);
                    $('#'+id).prop('disabled', true);
                }else if( $('#sel'+id).val() == "1" ){
                    $('#'+id).prop('disabled', false);
                    $('#'+id).prop('value', 1);
                }
            },
            enabletosend(){
                for(i = 0; i < 6; i++){
                    $('#'+i).prop('disabled', false);
                }
            }
        },
        mounted: function () {
              this.chargement = false;
              $('.row').addClass('animated fadeInUp');
        },
        computed:{} 
    })
</script>
@endsection