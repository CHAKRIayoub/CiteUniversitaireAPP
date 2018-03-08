@extends('layouts.template')

@section('content')

<!-- __________________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main">

    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
        <div class="title_left">
            <h3>Gestion des Blocs</h3> 
        </div>
    </div>

    <!-- ____________________ bouton précedent ________________________ -->    
    <a href="{{ route('blocs.index') }}" style="float: right" class="btn btn-info">
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
        <div class="col-md-8 col-md-offset-2 ">

            <!-- ____________  form ___________ -->
            <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('blocs.store') }}">{{ csrf_field() }}

                <!-- ____________  chrgement ___________ -->
                <transition name="modal" v-if="chargement" >
                    <div class="loading-mask">    
                        <div class="loader"></div>  
                    </div>
                </transition>

                <!-- ____________  form panel ___________ -->
                <div class="panel panel-success">    
                    <div class="panel-heading">
                        <h2>Ajouter Un Bloc</h2>
                    </div>
                    <div class="panel-body" ><br>
                        <p>veillez remplire tous les champs, pour ajouter un nouveau bloc.</p>
                        <br><br>

                        <!--______________ titre champ _______________-->

                        <!-- titre label -->
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="titre">
                            Libellé : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _______________________ titre Input ______________________ -->
                            <input class="form-control" type="text" name="titre"  
                                   v-model="titre" v-validate="'required|alpha_spaces'">
                            <!-- _____________ titre error _________ -->
                            <span v-show="errors.has('titre')" style="color: red; float: right;" >
                                titre incorrecte
                            </span>
                        </div><br><br><br>

                       


                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="titre">
                            Nombre des chambres : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <input class="form-control" type="number" name="nbch">
                           
                        </div><br><br><br>


                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="titre">
                            Capacité de chaque chambres : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <input class="form-control" type="number" name="cpch">
                           
                        </div><br><br><br>

                        <!-- radio genre -->
                        <div class="form-group">
                            <br>
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="genre">
                                Genre : <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left: 20px;" >
                                <label class="radio">
                                    <input checked=""  type="radio" name="genre" value="masculin">
                                    Masculin
                                </label>
                              
                                <label class="radio">
                                    <input type="radio" name="genre"  value="feminin" >
                                    feminin
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel-footer" >
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" >
                                
                                <!--______________ form buttons _____________ -->
                                <button :disabled="errors.any()" style="float: right;" type="submit" class="btn btn-success" v-on:click="submitForm" >
                                    Ajouter
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