@extends('layouts.template')
@section('content')

<style type="text/css">
	
	.inputerror { box-shadow : 0px 0px 3px 1px red; }
	form div div div span {  font-size: 11px; color: red; float: none;" }


</style>

<!-- __________________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main">

    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
        <div class="title_left">
            <h3>Dossier d'inscription </h3> 
        </div>
    </div>
        
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
            <form id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('dossier.update') }}">{{ csrf_field() }}{{ method_field('PATCH') }}

                <!-- ____________  chrgement ___________ -->
                <transition name="modal" v-if="chargement" >
                    <div class="loading-mask">    
                        <div class="loader"></div>  
                    </div>
                </transition>























                <!-- ____________  form panel   ___________ -->
                <div class="panel panel-success">    
                    <div class="panel-heading">
                        <h2>Information personnel :</h2>
                    </div>
                    <div class="panel-body" ><br>
                    	<p></p>


                        <!--______________ nom champ _______________-->

                        <!-- cne label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Nom * : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ nom Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('nom')}" class="form-control"
                            		 type="text" name="nom"  
                                   v-model="nom" v-validate="'required|alpha_spaces|min:3|max:14'">
                            <span v-show="errors.has('nom')">
                            	Veuillez fournir un Nom Valide (au moin 3 lettres, maximum 14) ?
                            </span>
                            
                        </div><br><br><br><br>



  						<!--______________ prenom champ _______________-->

                        <!-- cne label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Prenom * : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ prenom Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('prenom')}" size="30"  class="form-control" type="text" name="prenom"  
                                   v-model="prenom" v-validate="'required|alpha_spaces|min:3|max:14'">
                            <!-- _____________ prenom error _________ -->
                            <span v-show="errors.has('prenom')">Veuillez fournir un Prenom Valide (au moin 3 lettres, maximum 14)?
                            </span>
                            
                        </div><br><br><br><br>



			
			        	<!--______________ CNE champ _______________-->

                        <!-- cne label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cne">
                            CNE * : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _______________________ cne Input ______________________ -->
                            <input v-bind:class="{inputerror : errors.has('cne')}" class="form-control" type="number" name="cne"  
                                   v-model="cne" v-validate="'required|numeric|min:10|max:12'">
                            <!-- _____________ cne error _________ -->
                            <span v-show="errors.has('cne')" >
                                Veuillez fournir un Code Nationale de l'Etudiant Valide (10 chiffres)?
                            </span>
                        </div><br><br><br><br>





                        <!--______________ CIN champ _______________-->

                        <!-- cin label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cin">
                            CIN * : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _______________________ cin Input ______________________ -->
                            <input v-bind:class="{inputerror : errors.has('cin')}" class="form-control" type="text" name="cin"  
                                  v-model="cin" v-validate="'required|alpha_num|min:5|max:10'">
                            <!-- _____________ cin error _________ -->
                            <span v-show="errors.has('cin')" >
                                Veuillez fournir un CIN Valide (au moin 5 lettres ou chiffres, maximum 10) ?
                            </span>
                        </div><br><br><br><br>





                        <!--______________ lieu_naissance champ _______________-->

                        <!-- cne label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Lieu De Naissance * : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ lieu_naissance Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('lieu_naissance')}" list="listville" class="form-control" type="text" name="lieu_naissance"  
                               v-model="lieu_naissance" v-validate="'required|alpha_spaces|min:3|max:14'">
                            <!-- _____________ lieu_naissance error _________ -->
                            <span v-show="errors.has('lieu_naissance')" >Veuillez fournir un lieu Valide (au moin 3 lettres, maximum 14)?
                            </span>
                        </div><br><br><br><br>






                        <!--______________ date_naissance champ _______________-->

                        <!-- cne label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Date De Naissance * : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ date_naissance Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('date_naissance')}" class="form-control" type="date" name="date_naissance"  
                                   v-model="date_naissance" v-validate="'required'">
                            <!-- _____________ date_naissance error _________ -->
                            <span v-show="errors.has('date_naissance')" >Veuillez fournir un Date Valide ?
                            </span>
                        </div><br><br><br><br>




                        <!--______________ telephone champ _______________-->

                        <!-- telephone label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            telephone * : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ telephone Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('telephone')}" class="form-control" type="text" name="telephone"  
                             v-model="telephone" v-validate="'required|numeric|min:10|max:10'">
                            <!-- _____________ telephone error _________ -->
                            <span v-show="errors.has('telephone')" >Veuillez fournir un Date Valide (10 chiffres) ?
                            </span>
                        </div><br><br><br><br>





						<!--_________________ radio genre _______________-->
                        <div class="form-group">
                            <br>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genre">
                                Genre * : <span class="required"></span>
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
                        </div><br>





						<!--_________________ radio handicape _______________-->
                        <div class="form-group">
                            <br>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="handicape">
                                Handicape * : <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left: 20px;" >
                                <label class="radio">
                                    <input checked=""  type="radio" name="handicape" value="oui">
                                    oui
                                </label>
                              
                                <label class="radio">
                                    <input type="radio" name="handicape"  value="non" >
                                    non
                                </label>
                            </div>
                        </div><br>









  						 <div class="form-group">
                            <br>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="maladie">
                                maladie chronique * : <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left: 20px;" >
                                <label class="radio">
                                    <input checked=""  type="radio" name="maladie" value="oui">
                                    oui
                                </label>
                              
                                <label class="radio">
                                    <input type="radio" name="maladie"  value="non" >
                                    non
                                </label>
                            </div>
                        </div><br><br><br>
                    </div>
                </div>

































                <div class="panel panel-success">    
                    <div class="panel-heading">
                        <h2>Votre Localisation :</h2>
                    </div>
                    <div class="panel-body" ><br>
                        <p></p>
                        



  						<!--______________ adresse champ _______________-->

                        <!-- adresse label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            adresse : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ adresse Input _______________ -->
                            <textarea v-bind:class="{inputerror : errors.has('adresse')}" class="form-control" type="text" name="adresse"  
                                   v-model="adresse" v-validate="'required|min:5'"></textarea>
                            <!-- _____________ adresse error _________ -->
                            <span v-show="errors.has('adresse')">Veuillez fournir une Adresse Valide ?
                            </span>
                        </div><br><br><br><br><br><br>






  						<!--______________ ville champ _______________-->

                        <!-- ville label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            ville : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ ville Input _______________ -->
                            <select class="form-control" name="ville_id" v-model="ville" >
                                
                                @foreach ($villes as $ville)
                                
                        <option value="{{ $ville->id }}">{{ $ville->ville }}</option>

                                @endforeach
                            
                            </select> 
                        </div><br><br><br><br>








                    </div>
                </div>

































			  	<div class="panel panel-success">    
                    <div class="panel-heading">
                        <h2>Votre Etude :</h2>
                    </div>
                    <div class="panel-body" ><br>
                        <p></p>


  						<!--______________ annee_bac champ _______________-->

                        <!-- annee_bac label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Année bac : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ annee_bac Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('annee_bac')}" class="form-control" type="number" name="annee_bac"  
                                   v-model="annee_bac" v-validate="'required|numeric|max_value:2017|min_value:2000'">
                            <!-- _____________ annee_bac error _________ -->
                            <span v-show="errors.has('annee_bac')" >Veuillez fournir une Année Valide (4 chiffres) ?
                            </span>
                        </div><br><br><br><br>





  						<!--______________ note_bac champ _______________-->

                        <!-- note_bac label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Mention de bac : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <select  class="form-control" name="mention"  >
	                        	<option selected value="passable"> Passable </option>
	                        	<option value="assez bien"> Assez Bien </option>
	                        	<option value="bien"> Bien </option>
	                        	<option value="tres bien">Très Bien</option>
	                        </select>

                        </div><br><br><br><br>
                    </div>
                </div>





































 				<div class="panel panel-success">    
                    <div class="panel-heading">
                        <h2>Votre Inscription Universitaire :</h2>
                    </div>
                    <div class="panel-body" ><br>
                        <p></p>



  						<!--______________ etablissement champ _______________-->

                        <!-- etablissement label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Etablissement : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _____________ etablissement error _________ -->
	                        <select  class="form-control" name="etablissement"  >
	                        	<option value="EST">EST</option>
	                        	<option selected value="FS">FS</option>
	                        	<option value="ENSA">ENSA</option>
	                        	<option value="FM">FM</option>
	                        	<option value="FST">FST</option>
	                        	<option value="ENS">ENS</option>
	                        	<option value="FSJES">FSJES</option>
	                        	<option value="FP">FP</option>
	                        	<option value="ENCG">ENCG</option>
	                        	<option value="FPD">FPD</option>
	                        </select>
                        </div><br><br><br><br>

                       



						<!--______________ universite champ _______________-->

                        <!-- universite label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Cycle d'etude : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ universite Input _______________ -->
                           	<select  class="form-control" name="cycle"  >
	                        	<option selected value="Licence">Licence</option>
	                        	<option value="préparatoire">préparatoire</option>
	                        	<option value="ingenieur">ingénieur</option>
	                        	<option value="Master">Master</option>
	                        	<option value="Doctorat">Doctorat</option>
	                        </select>
                        </div><br><br><br><br>

                    </div>
                </div>











































 				<div class="panel panel-success">    
                    <div class="panel-heading">
                        <h2>Information des parents :</h2>
                    </div>
                    <div class="panel-body" ><br>
                        <p></p>




  						<!--______________ nom_pere champ _______________-->

                        <!-- nom_pere label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Nom et Prénom du pére : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ nom_pere Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('nom_pere')}" class="form-control" type="text" name="nom_pere" v-model="nom_pere" v-validate="'required|alpha_spaces|min:6|max:30'">
                            <!-- _____________ nom_pere error _________ -->
                            <span v-show="errors.has('nom_pere')" >Veuillez fournir un Nom Valide (au moin 3 lettres, maximum 14) ?
                            </span>
                        </div><br><br><br><br>







  						<!--______________ cin_pere champ _______________-->

                        <!-- cne label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            CIN du pére : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ cin_pere Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('cin_pere')}" class="form-control" type="text" name="cin_pere"  
                                  v-model="cin_pere" v-validate="'required|alpha_num|min:5|max:10'">
                            <!-- _____________ cin_pere error _________ -->
                            <span v-show="errors.has('cin_pere')"  >
								Veuillez fournir un CIN Valide (au moin 5 lettres ou chiffres, maximum 10) ?
                            </span>
                        </div><br><br><br><br>





  						<!--______________ nom_mere champ _______________-->

                        <!-- nom_mere label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Nom et Prénom du mère : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ nom_mere Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('nom_mere')}" class="form-control" type="text" name="nom_mere"  
                               v-model="nom_mere" v-validate="'required|alpha_spaces|min:6|max:30'">
                            <!-- _____________ nom_mere error _________ -->
                            <span v-show="errors.has('nom_mere')"  >Veuillez fournir un Nom Valide (au moin 3 lettres, maximum 14) ?
                            </span>
                        </div><br><br><br><br>





  						<!--______________ cin_mere champ _______________-->

                        <!-- cin_mere label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            CIN du mère : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ cin_mere Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('cin_mere')}" class="form-control" type="text" name="cin_mere"  
                                  v-model="cin_mere" v-validate="'required|alpha_num|min:5|max:10'">
                            <!-- _____________ cin_mere error _________ -->
                            <span v-show="errors.has('cin_mere')" >Veuillez fournir un CIN Valide (au moin 5 lettres ou chiffres, maximum 10) ?
                            </span>
                        </div><br><br><br><br>





  						<!--______________ revenue champ _______________-->

                        <!-- revenue label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Revenue en DH (année) : <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ revenue Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('revenue')}" class="form-control" type="number" name="revenue"  
                                   v-model="revenue" v-validate="'required|numeric|min:1'">
                            <!-- _____________ revenue error _________ -->
                            <span v-show="errors.has('revenue')"> Veuillez fournir un Revenu Valide ?
                            </span>
                        </div><br><br><br><br>





  						<!--______________ nb_enfants champ _______________-->

                        <!-- nb_enfants label -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lieu_naisse">
                            Nombre des enfants: <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- _________________ nb_enfants Input _______________ -->
                            <input v-bind:class="{inputerror : errors.has('nb_enfants')}"          class="form-control" type="number" name="nb_enfants"  
                                   v-model="nb_enfants" v-validate="'required|numeric|min:1'">
                            <!-- _____________ nb_enfants error _________ -->
                            <span v-show="errors.has('nb_enfants')"  >Veuillez fournir un Nombre Valide ?
                            </span>
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
	            cne:'',
				cin:'',
				lieu_naissance:'',
				date_naissance:'',
				genre:'',
				nom:'',
				prenom:'',
				adresse:'',
				ville:'',
				distance:'',
				telephone:'',
				annee_bac:'',
				note_bac:'',
				universite:'',
				etablissement:'',
				handicape:'',
				etat:'',
				maladie:'',
				nom_pere:'',
				cin_pere:'',
				nom_mere:'',
				cin_mere:'',
				revenue:'',
				impots:'',
				nb_enfants:'',
				note_dossier:'',
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