@extends('layouts.template')

@section('content')
<style type="text/css">
    table{
        width: 100%;
        border: none;
    }
    table td {
        padding: 30px; 
    }

</style>

<!-- __________________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app" >

    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
        <div class="title_left">
            <h3>Dossier</h3> <br>
        </div>
    </div><br><br>
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <strong>{{ $message }}</strong> 
        </div>
        @endif


        


    <!-- ____________________ bouton précedent ________________________ -->    
    <a href="{{ url('dossier/0/edit') }}" style="float: right" class="btn btn-warning">
        <i class="fa fa-edit"></i> Modifier Votre Dossier
    </a>
    <a href="{{ url('/recu') }}" style="float: right" class="btn btn-success">
        <i class="fa fa-print"></i> Imprimer votre reçu
    </a>
        <br>
    <div class="clearfix"></div>
    <br>

    <div class="row  " >
    
        <div class="x_content">

            <div class="flex">
            <ul class="list-inline widget_profile_box bg-blue " style="/*height: 70px;*/" >

               
                <li>
                <img src="images/user.png" alt="..." class="img-circle profile_img" >
                </li>

                <li><h2><strong>{{ Auth::user()->dossier->nom }} {{ Auth::user()->dossier->prenom }}</h2></strong></li>
               
            </ul>
            </div>
            <br><br>
            

            <div class="panel panel-primary" >
                <div class="panel-heading"><h3 class="name ">Information Personnel</h3></div>  
                <table>
                    <tr>
                        <td><h4><i class="fa fa-id-card"></i> 
                        CNE : <strong>{{ Auth::user()->dossier->cne }} </strong> </h4></td>

                        <td><h4><i class="fa fa-vcard-o"></i>
                        CIN : <strong>{{ Auth::user()->dossier->cin }}</strong>  </h4></td>
                        
                        <td><h4><i class="fa fa-map-marker"></i>
                        Lieu de Naissance : <strong>{{ Auth::user()->dossier->lieu_naissance }}</strong></h4></td>
                    </tr>
                    <tr>
                        <td><h4><i class="fa fa-calendar"></i>
                        Date de Naissance : <strong>{{ Auth::user()->dossier->date_naissance }}</strong> </h4></td>
                        
                        <td><h4><i class="fa fa-phone"></i>
                        Telephone : <strong>{{ Auth::user()->dossier->telephone }}</strong> </h4></td>
                        
                        <td><h4><i class="fa fa-intersex"></i>
                        Sexe : <strong>{{ Auth::user()->dossier->genre }}</strong> </h4></td>                        
                    </tr>
                    <tr>
                         
                        <td><h4><i class="fa fa-bed"></i>
                        Maladie chronique : <strong>{{ Auth::user()->dossier->maladie }}</strong> </h4></td>
                
                        <td><h4><i class="fa fa-wheelchair"></i>
                        handicapé : <strong>{{ Auth::user()->dossier->handicape }}</strong> </h4></td>
                    </tr>
                </table>
               
              
            </div><br><br>




            <div class=" panel panel-primary ">
            <div class="panel-heading "><h3 class="name ">Votre Localisation :</h3></div>   
            <table>
                <tr>
                    <td><h4><i class="fa fa-map-marker"> </i>
                         Adresse :  <strong>{{ Auth::user()->dossier->adresse }} </strong>  </h4></td>
                </tr>
                <tr>
                    <td><h4><i class="fa fa-map"></i>
                        Ville : <strong>{{ Auth::user()->dossier->ville->ville }}</strong>  </h4></td>
                   
                </tr>
            </table>

            </div><br><br>



            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="name ">Votre Etude en Bac </h3></div>  

                <table>
                    <tr>
                        <td><h4><i class="fa fa-calendar"></i>
                        Année d'obtention du Bac : <strong>{{ Auth::user()->dossier->annee_bac }} </strong></h4></td>
                        <td><h4><i class="fa fa-graduation-cap"></i>
                        Mention : <strong>{{ Auth::user()->dossier->mention }}</strong> </h4></td>
                    </tr>
                </table>

            </div><br><br>



            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="name ">Votre Inscription Universitaire</h3></div>  
                <table>
                    <tr>
                        <td><h4><i class="fa fa-university"></i>
                        Etablissement :  <strong>{{ Auth::user()->dossier->etablissement }} </strong>  </h4></td>
                        <td> <h4><i class="fa fa-graduation-cap"></i>
                        Cycle : <strong>{{ Auth::user()->dossier->cycle }}</strong>  </h4></td>
                    </tr>
                </table>
 
            </ul>
            </div><br><br>

            
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="name ">Information des parents</h3></div>  

                <table>
                    <tr>
                        <td> <h4 ><i class="fa fa-user"></i>
                        Nom et Prenom du Père  :  <strong>{{ Auth::user()->dossier->nom_pere }} </strong> </h4>  </td>
                        <td> <h4 ><i class="fa fa-user"></i>
                        Nom et Prenom du Mère : <strong>{{ Auth::user()->dossier->nom_mere }}</strong> </h4></td>
                    </tr>
                    <tr>
                        <td><h4><i class="fa fa-id-card"></i>
                        CIN du Père :  <strong>{{ Auth::user()->dossier->cin_pere }} </strong> </h4></td>
                        <td><h4><i class="fa fa-id-card"></i>
                        CIN du Mère : <strong>{{ Auth::user()->dossier->cin_mere }}</strong> </h4></td>
                    </tr>
                    <tr>
                        <td><h4><i class="fa fa-usd"></i>
                        Revenue : <strong>{{ Auth::user()->dossier->revenue }} </strong> DH </h4></td>
                        <td><h4><i class="fa fa-users"></i>
                        Nombre des Enfants :  <strong>{{ Auth::user()->dossier->nb_enfants }} </strong> </h4></td>
                    </tr>
                </table>

            
            </div><br><br>


             <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="name ">Dossier Format PDF</h3></div>  
               
               <embed src="papers/{{ Auth::user()->id }}.pdf" width="100%" height="1000px" />
 
            </ul>
            </div><br><br>









            <br><br><br><p>
            <!-- signature n'oublié pas de attacher ce reçu avec votre dossier -->
            </p>
        </div>
    
    </div>


    <!-- ____________  chrgement ___________ -->
    <transition name="modal" v-if="chargement" >
        <div class="loading-mask">    
            <div class="loader"></div>  
        </div>
    </transition>

   
</div>

<!-- __________________________________JS_____________________________________________ -->

<!-- ____________  required files  ___________ -->
        
<script src="{{ asset("js/vue.js")}}"></script>

<!-- ____________  Vue Formulaire Instance   ___________ -->
<script type="text/javascript">
  
    new Vue({  
        el : '#app',
        data() {
            return{
                chargement: true
            }
        },
        methods: {
            
        },
        mounted: function () {    
            this.chargement = false;
            $('.row').addClass('animated fadeInUp');
        }
    })

</script>

@endsection