@extends('layouts.template')

@section('content')

<!-- __________________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main">

    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
        <div class="title_left">
            <h3>Importer les Données</h3> 
        </div>
    </div> <br><br><br><br><br>

    @if ($message = Session::get('periode_inscr'))
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>   
        <h3><strong>{{ $message }}</strong></h3>
    </div>
    @else
        
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
        <div class="col-md-10 col-md-offset-1 ">
            <!-- ____________  form ___________ -->
            <form onsubmit="

                if( $('input[type=file]').val() != '' ) return true; 
                else {
                    alert('Uploader le fichier pdf !!!');
                    return false; 
                }" 

            id="form" class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="/import">{{ csrf_field() }}

                <!-- ____________  chrgement ___________ -->
                <transition name="modal" v-if="chargement" >
                    <div class="loading-mask">    
                        <div class="loader"></div>  
                    </div>
                </transition>


                <div class="panel panel-success">    
                    <div class="panel-heading">
                        <h2>Importer Une Base de Données</h2>
                    </div>
                    <div class="panel-body" ><br>
                        <p> veuillez selectioner une base de données  
                        </p>


                        <!--______________ pdf champ _______________-->

                        <!-- pdf label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Uploader le fichier  : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _____________ universite Input _______________ -->
                            <input name="papers" type="file" class="form-control" >
                             
                          
                        </div><br><br><br><br>

                    </div>
                </div>

                <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" >
                            <span v-show="errors.any()" style="color: red; float: right;" >
                            	veuillez s' assurer des champs au dessus
                            </span><br>
                            <!--______________ form buttons _____________ -->
                            <button :disabled="errors.any()" style="float: right;" type="submit" class="btn btn-success" v-on:click="submitForm" >
                                Enregistrer 
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

        @endif
</div>

<!-- __________________________________JS_____________________________________________ -->

<!-- ____________  required files  ___________ -->
        
<script src="{{ asset("js/vue.js")}}"></script>
<script src="{{ asset("js/vee-validate.js")}}"></script>


<!-- ____________  Vue Formulaire Instance   ___________ -->
<script type="text/javascript">

    Vue.use(VeeValidate);
  
    new Vue({  
        el : '#form',
        data() {
            return{
	           
                papers:'',
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