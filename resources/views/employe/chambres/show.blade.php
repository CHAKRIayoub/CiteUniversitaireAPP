@extends('layouts.template')
@section('content')
<!-- ______________________HTML___________________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app">
  <modal :show="show" @close="show = false" @confirm="deleteBloc" @cancel="cancelDel">
  <h4>voulez-vous vraiment supprimer ce dossier ?</h4>
  </modal>
  <div class="">
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
            <i class="fa fa-address-book"></i> Informations d'une Chambre
          </li>  
        </ol>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:700px;">
          <div class="x_title">
            <h3><i class="fa fa-bed"> </i> chambre N° :  {{ $chambre->id}}</h3>
            <div class="clearfix"></div>
          </div>
          <div class="row">
            <!--  area : titre de Blace -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-dot-circle-o"></i>
                </div>
                <div class="count"> {{ $chambre->Bloc['titre'] }}</div>
                <br>
                <h3>genre : {{ $chambre->Bloc['genre']  }}</h3>
                <br>
              </div>
            </div>
            <!--  area : Capacité chambre  -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i>
                </div>
                <div class="count">{{ $chambre->capacite  }}</div>
                <br>
                <h3>Capacité</h3>
                <br>
              </div>
            </div>
            <!--  area : place Occupé  -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-flag"></i>
                </div>
                <div class="count">{{ $hebergementsCount  }} </div>
                <br>
                <h3>Place occupé</h3>
                <br>
              </div>
            </div>
            <!--  area : place Disponible  -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-flag-o"></i>
                </div>
                <div class="count"> {{ $chambre->capacite - $hebergementsCount}} </div>
                <br>
                <h3>Place disponible</h3>
                <br>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-users"></i> Liste des étudiants <small>dans cette chambre</small></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th class="column-title">
                        <h4>CIN </h4>
                      </th>
                      <th class="column-title">
                        <h4>Nom </h4>
                      </th>
                      <th class="column-title">
                        <h4>Prenom</h4>
                      </th>
                      <th class="column-title">
                        <h4>Tele </h4>
                      </th>
                      <th class="column-title">
                        <h4>Date naissance</h4>
                      </th>
                      <th class="column-title">
                        <h4>Actions</h4>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if( $hebergementsCount!=0 )
                    @foreach ( $hebergs as $heberg )
                    <tr class="even pointer">
                      <td class=" "> {{ $heberg->User->Dossier['cin'] }} </td>
                      <td class=" "> {{ $heberg->User->Dossier['nom'] }}  </td>
                      <td class=" ">{{ $heberg->User->Dossier['prenom'] }} </td>
                      <td class=" "><i class="success fa fa-phone"></i>
                        {{ $heberg->User->Dossier['telephone'] }} 
                      </td>
                      <td class=" ">{{ $heberg->User->Dossier['date_naissance'] }} </td>

                      <td>
                      <a  data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="plus d'informations" 
                        href="/internes/{{ $heberg->User->Dossier->user_id }}">
                      <i style="color:#5cb85c;" class="fa fa-eye" ></i>
                      </a>&nbsp;&nbsp;&nbsp;
                      <!-- ___________  formulaire supprimer _________ -->
                      {!! Form::open([
                      'method' => 'DELETE',
                      'url' => ['internes', $heberg->User->Dossier->id  ],
                      'style' => 'display:inline',
                      'id' => $heberg->User->Dossier->id,
                      ]) !!}
                      <a data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="supprimer" 
                        onclick=" app.del({{ $heberg->User->Dossier->id }}); return false;">
                      <i style="color: tomato" class="fa fa-trash-o"></i>
                      </a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a  data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="Transfert" 
                        href="/transfert/{{ $heberg->User->Dossier->user_id }}">
                      <i style="color:#4444FF;" class="fa fa-exchange" ></i>
                      </a>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <a data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="Permutation" 
                        href="/permutation/{{ $heberg->User->Dossier->user_id }}">
                      <i style="color:#000;" class="fa fa-handshake-o" ></i>
                      </a>
                      {!! Form::close() !!}
                      
                    </td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /footer content -->
</div>
<
<!-- ____________________JS_________________________________________ -->

<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/vue.js")}}"></script>
<script type="text/x-template" id="modal-template">
  <transition name="modal">
      <div class="modal-mask" @click="closeM()" v-show="show">
          <div class="modal-container" @click.stop >
              <!-- ____________  titre modal  ___________ -->
              <div class="modal-header"> Confirmez votre choix </div>
              <!-- ____________  body modal  ___________ --> 
              <div class="modal-body"><slot></slot></div>
              <!-- ____________  footer modal  ___________ -->
              <div>
                  <!-- ____________  button confirmer  ___________ -->
                  <button style="float: right;" class="btn btn-danger" @click="sendConfirm" >
                      <i class="fa fa-trash-o" aria-hidden="true"></i> supprimer
                  </button>
  
                  <!-- ____________  button annuler  ___________ -->
                  <button class="btn btn-success" @click="sendCancel" >
                    <i class="fa fa-arrow-left"></i> annler
                  </button>
              </div> 
            </div>
          </div>
      </div>
  </transition>
</script>
<script type="text/javascript">
  //____________  modal component  ___________ -->
  Vue.component('modal', {
      template: '#modal-template',
      props: ['show'],
      methods: {
          closeM: function () {      
              this.$emit('close');
          },
          sendConfirm: function () {      
              this.$emit('confirm');
          },
          sendCancel: function () {      
              this.$emit('cancel');
          }
      },
      mounted: function () {  
          document.addEventListener("keydown", (e) => {        
              if (this.show && e.keyCode == 27) {            
                  this.closeM();
              }    
          });
      }
  });
  
  var app = new Vue({    
      el : '#app',
      data : {
          show: false, 
          delvar: false,
          idtodel: '',
          id : '{{ $chambre->id }}',
          chargement : true
      },
      methods: {
          del : function(id, l){
              //this.blocName = l;
              this.show = true;
              this.idtodel = id;
          },
          deleteBloc : function (btn) {
              $('#'+this.idtodel).submit();
          },
          cancelDel:function (btn) {
              this.show = false;
              this.idtodel = '';
          }
      },
      mounted: function () {
            this.chargement = false;
            $('.row').addClass('animated fadeInUp');
  
      }
  })
</script>
@endsection