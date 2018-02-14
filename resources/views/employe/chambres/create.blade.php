@extends('layouts.template')

@section('content')

<!-- __________________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main">

    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
        <div class="title_left">
            <h3>Gestion des Chambres</h3> 
        </div>
    </div>

    <!-- ____________________ bouton précedent ________________________ -->    
    <a href="{{ route('chambres.index') }}" style="float: right" class="btn btn-info">
        <i class="fa fa-arrow-left"></i> Precedent
    </a>
        
    <div class="clearfix"></div>
        
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

        <!-- ____________  fomr div ___________ -->
        <div class="col-md-6 col-md-offset-3 ">

            <!-- ____________  form ___________ -->
            <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('chambres.store') }}">{{ csrf_field() }}

                <!-- ____________  chrgement ___________ -->
                <transition name="modal" v-if="chargement" >
                    <div class="loading-mask">    
                        <div class="loader"></div>  
                    </div>
                </transition>

                <!-- ____________  form panel ___________ -->
                <div class="panel panel-success">    
                    <div class="panel-heading">
                        <h2>Ajouter Un Chambre</h2>
                    </div>
                    <div class="panel-body" ><br>
                        <p>veillez remplire tous les champs, pour ajouter un nouveau Chambre.</p>
                        <br><br>


                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="capacite">
                            capacité : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _______________________ capacite Input ______________________ -->
                            <input class="form-control" type="number" name="capacite"  
                                   v-model="capacite" v-validate="'required'">

                            <span v-show="errors.has('Chambre')" style="color: red; float: right;" >
                                Capacite incorrecte
                            </span>
                        </div><br><br>




         <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Bloc : </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_group form-control" name="bloc" >

                          <optgroup label="Masculin">
                            @foreach ($blocs as $bloc)
                                @if($bloc->genre=='masculin')
                                     <option value="{{ $bloc->id }} ">{{ $bloc->titre }}  </option>
                                @endif
                            @endforeach

                          </optgroup>

                          <optgroup label="Feminin">

                            @foreach ($blocs as $bloc)
                                @if($bloc->genre=='feminin')
                                     <option value="{{ $bloc->id }}">{{ $bloc->titre }}</option>
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
                                
                                <!--______________ form buttons _____________ -->
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

<!-- __________________________________JS_____________________________________________ -->

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