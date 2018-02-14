@extends('layouts.template')

@section('content')



<!-- __________________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main">
    <div class="">

        <!-- ____________________ content Titre ________________________ -->    
        <div class="page-title">
            <div class="title_left">
                <h3>Modifier Un Blocs</h3> 
            </div>
        </div>
        
        <!-- ____________________ bouton précedent ________________________ -->
        <a href="{{ route('blocs.index') }}" style="float: right" class="btn btn-info" > <i class="fa fa-arrow-left"> </i>  Precedent</a>
        
        <div class="clearfix"></div><br><br>

        <!-- ____________________ content body ________________________ -->
        <div class="row">

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
                <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('chambres.update', $chambre->id ) }}">

                    {{ method_field('PATCH') }} {{ csrf_field() }}

                    <!-- ____________  chrgement ___________ -->
                    <transition name="modal" v-if="chargement" >
                        <div class="loading-mask">
                            <div class="loader"></div>      
                        </div>
                    </transition>

                    <!-- ____________  form panel ___________ -->
                    <div class="panel panel-success">
                
                        <div class="panel-heading">
                            <h2>Modifier la chambre ID : {{ $chambre->id }}</h2>
                        </div>
                    
                        <div class="panel-body" >
                            <br><p>
                                veillez modifier tous les champs, pour modifier cette Chambre :.
                            </p><br><br>
                        
                            <!-- titre champ -->
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">
                                Capacité  : <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control" type="number" name="capacite"  
                                       v-model="capacite" v-validate="'required'"
                                       value="{{ $chambre->id }}">
                                
                            </div><br><br>

        
                            
                            <!-----------  Select nouveau bloc   ------------>    

                 <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Bloc : </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_group form-control" name="bloc" >

                          <optgroup label="Masculin">
                            @foreach ($blocs as $bloc)
                                @if($bloc->genre=='masculin')
                                     <option @if ($bloc->id == $chambre->bloc_id) selected @endif value="{{ $bloc->id }}">{{ $bloc->titre }}</option>                                    
                                @endif

                            @endforeach

                          </optgroup>

                          <optgroup label="Feminin">

                            @foreach ($blocs as $bloc)
                                @if($bloc->genre=='feminin')
                                     <option @if ($bloc->id == $chambre->bloc_id) selected @endif value="{{ $bloc->id }}">{{ $bloc->titre }}</option>
                                @endif
                            @endforeach                          

                          </optgroup>
                         
                        </select>
                      </div>
                    </div>
                    <br><br>

                        </div>
                    
                        <div class="panel-footer" >
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" >
                                    
                                    <!--___________ buttons ________________-->                   
                                    <button :disabled="errors.any()" style="float: right;" type="submit" class="btn btn-success" v-on:click="submitForm" >
                                        Enregistrer
                                    </button>

                                    <button style="float: right;" type="reset" class="btn btn-primary">
                                        Annuler
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- __________________________________JS_____________________________________________ -->

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
            id : '{{ $chambre->id }}',
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