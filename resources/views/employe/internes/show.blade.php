@extends('layouts.template')
@section('content')
<style type="text/css">
  #app{
  font-size: 17px;
  }
</style>
<!-- _____________________HTML_________________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main">
  <div class="">
    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
      <div style="float: left; font-size: medium; width: 100%">
        <ol class="breadcrumb" style="background-color: #eee">         
          <li><a href="/home">
            <i class="fa fa-home"></i> Acceuil
          </a></li>
          <li><a href="/internes">
            <i class="fa fa-users"></i> gestion des Internes
          </a></li>
          <li class="active">
            <i class="fa fa-user"></i> Information d'un étudiant
          </li>  
        </ol>
      </div>
    </div>
   
    <div class="clearfix"></div>
    <!-- ____________________ content body ________________________ -->
    <div class="row" id="app">
      <div class="x_content">
        <div class="x_panel">  
          <div class="x_title">
            <div class="h3" ><i class="fa fa-book"></i> Dossier N°: {{ $dossier->id }} </div> 
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-lg-3 col-md-3">
              <center>
                <span class="text-left">
                  @if ($dossier->genre == 'masculin')
                    <img src="{{ asset("images/boy.png") }}"  class="img-responsive">
                  @else
                    <img src="{{ asset("images/girl.png") }}"  class="img-responsive">
                  @endif
                </span>
              </center>
              <div class="table-responsive panel">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="text-center">
                        <h2>{{ $dossier->nom }} {{ $dossier->prenom }}</h2>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-9 col-md-9">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#PersonnelInfo" class="text-success"><i class="fa fa-indent"></i> Personnel</a></li>
                <li><a data-toggle="tab" href="#BacInfos" class="text-success"><i class="fa fa-graduation-cap"></i> étude</a></li>
                <li><a data-toggle="tab" href="#Address" class="text-success"><i class="fa fa-home"></i> Address</a></li>
                <li><a data-toggle="tab" href="#Parent" class="text-success"><i class="fa fa-users"></i> Famille </a></li>
                <li><a data-toggle="tab" href="#chambre" class="text-success"><i class="fa fa-bed"></i> Chambre </a></li>
                <li><a data-toggle="tab" href="#papers" class="text-success"><i class="fa fa-file"></i> Dossier PDF </a></li>
              </ul>
              <div class="tab-content">
                <div id="PersonnelInfo" class="tab-pane fade in active">
                  <div class="table-responsive panel">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-success"><i class="fa fa-id-card"></i> CNE </td>
                          <td>{{ $dossier->cne }}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-id-card"></i> CIN</td>
                          <td>{{$dossier->cin}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-user"></i> Nom Complet</td>
                          <td>{{ $dossier->nom }} {{ $dossier->prenom }}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-map-marker"></i> Lieu Naissance</td>
                          <td>{{$dossier->lieu_naissance}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-calendar"></i> Date Naissance</td>
                          <td>{{$dossier->date_naissance}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-phone"></i> Numero Telephone</td>
                          <td>{{$dossier->telephone}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-at"></i> Email</td>
                          <td>{{ $dossier->user->email }} </td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-transgender"></i> Genre</td>
                          <td>        {{$dossier->genre}}                      </td>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div id="Address" class="tab-pane fade">
                  <div class="table-responsive panel">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-success"><i class="fa fa-home"></i> Addresse </td>
                          <td>
                            <address>
                              {{$dossier->adresse}}  <br>
                              <strong > {{$dossier->ville->ville}} </strong ><br>
                            </address>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div id="BacInfos" class="tab-pane fade">
                  <div class="table-responsive panel">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-success"><i class="fa fa-calendar"></i> Année de bacaluriat</td>
                          <td><a href="mailto:****@pawanmall.net?subject=Email from &amp;body=Hello, Viddhyut Mall">{{$dossier->annee_bac}}</a></td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-list-ol"></i> Mention de bac</td>
                          <td>{{$dossier->mention}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-university"></i> Etablissement</td>
                          <td>{{$dossier->etablissement}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-graduation-cap"></i> Cycle d'etude</td>
                          <td>{{$dossier->cycle}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div id="Parent" class="tab-pane fade">
                  <div class="table-responsive panel">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-success"><i class="fa fa-male"></i> Nom Père </td>
                          <td>{{$dossier->nom_pere}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-id-card"></i> Cin Père</td>
                          <td>{{$dossier->cin_pere}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-female"></i> Nom Mère</td>
                          <td>{{$dossier->nom_mere}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-id-card"></i> Cin Mère</td>
                          <td>{{$dossier->cin_mere}}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-money"></i> Revenue</td>
                          <td>{{ $dossier->revenue }} DH</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-users"></i> Nombre de frères et sœurs</td>
                          <td>{{ $dossier->nb_enfants }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div id="chambre" class="tab-pane fade in">
                  <div class="table-responsive panel">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-success"><i class="fa fa-"></i>  Chambre Numéro : </td>
                          <td>{{ $chambre->id }}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-"></i> Capacité : </td>
                          <td>{{ $chambre->capacite }}</td>
                        </tr>
                        <tr>
                          <td class="text-success"><i class="fa fa-"></i> bloc : </td>
                          <td>{{ $chambre->bloc->titre }} {{ $dossier->genre }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div id="papers" class="tab-pane fade">
                  <div class="table-responsive panel">
                    <embed src="/papers/{{ $dossier->user->id }}.pdf" width="100%" height="1000px" />
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
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ______________________JS______________________________ -->
<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/vue.js")}}"></script>
<!-- ____________  Vue Form Instance  ___________ -->
<script type="text/javascript">
  //v-validate="{ rules: { regex:  /.[0-9]{3,}$/} }"
  new Vue({    
      el : '#app',
      data : {
          chargement : true
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