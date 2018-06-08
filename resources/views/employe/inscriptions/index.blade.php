@extends('layouts.template')
@section('content')
<style type="text/css"></style>
<!-- __________________________________ HTML _____________________________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app">
  <br><br>
  <!-- ____________ content titre ___________ -->
  <div class="page-title">
    <div style="float: left; font-size: medium; width: 100%">
      <ol class="breadcrumb" style="background-color: #eee">         
        <li><a href="/home">
          <i class="fa fa-home"></i> Acceuil
        </a></li>
        <li class="active">
          <i class="fa fa-list-ol"></i> Résultat de Selection
        </li>  
      </ol>
    </div>
  </div>
  <br>
  <div class="clearfix"></div>
  <!-- ____________ content body ___________ -->
  <div class="row">
    <!-- ____________  alert ___________ -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
      </button>
      <strong>{{ $message }}</strong> 
    </div>
    @endif
    <div class="x_content">
      <div class="panel panel-info">
        <div class="panel panel-heading">
          <div style="font-size: 22px" >
            <i class="fa fa-male"></i> Liste Des Etudiants Selectioné
          </div>
        </div>
        <div class="panel panel-body" >
          <div class="col-md-4 col-md-offset-8 " >
            <input class="form-control" style="font-size: 18px" placeholder="Chercher"  type="text" id="mysearch-g"><br>
          </div>
          <!-- ____________  table liste des blocs ___________ -->
          <table id="datatable-buttons-g" class="table table-striped ">
            <thead>
              <tr>
                <th>#ID <i class="fa fa-sort"></th>
                <th>Nom <i class="fa fa-sort"></th>
                <th>Prenom <i class="fa fa-sort"></th>
                <th>CNE <i class="fa fa-sort"></th>
                <th>CIN <i class="fa fa-sort"></th>
                <th>Note <i class="fa fa-sort"></th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dossiers_b as $dossier)
              <tr>
                <td>{{ $dossier->id }}</td>
                <td>{{ $dossier->nom }}</td>
                <td>{{ $dossier->prenom }}</td>
                <td>{{ $dossier->cne }}</td>
                <td>{{ $dossier->cin }}</td>
                <td>{{ $dossier->note_dossier }}</td>
                <td>
                  <a data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-original-title="a payé" 
                    href="/reserver/{{ $dossier->user->id }}">
                  <i style="color:#5cb85c;" class="fa fa-money" ></i>
                  </a> &nbsp;&nbsp;&nbsp;
                  <a data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-original-title="aficher plus" 
                    href="/inscriptions/{{ $dossier->id }}">
                  <i style="color:#3b4f65" class="fa fa-eye"></i>
                  </a> &nbsp;&nbsp;&nbsp;
                  <!-- ___________  formulaire supprimer _________ -->
                  {!! Form::open([
                  'method' => 'DELETE',
                  'url' => ['inscriptions', $dossier->id  ],
                  'style' => 'display:inline',
                  'id' => $dossier->id,
                  ]) !!}
                  <a  data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-original-title="supprimer" 
                    onclick=" app.del({{ $dossier->id }}); return false;">
                  <i style="color:tomato;" class="fa fa-trash-o "></i>
                  </a>
                  {!! Form::close() !!}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <br><br>
      <div class="panel panel-info">
        <div class="panel panel-heading">
          <div style="font-size: 22px" >
            <i class="fa fa-female"></i> Liste Des Etudiantes Selectioné
          </div>
        </div>
        <div class="panel panel-body" >
          <div class="col-md-4 col-md-offset-8 " >
            <input class="form-control" style="font-size: 18px" placeholder="Chercher"  type="text" id="mysearch-f"><br>
          </div>
          <!-- ____________  table liste des blocs ___________ -->
          <table id="datatable-buttons-f" class="table table-striped">
            <thead>
              <tr>
                <th>ID <i class="fa fa-sort"></th>
                <th>Nom <i class="fa fa-sort"></th>
                <th>Prenom <i class="fa fa-sort"></th>
                <th>CNE <i class="fa fa-sort"></th>
                <th>CIN <i class="fa fa-sort"></th>
                <th>Note <i class="fa fa-sort"></th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dossiers_g as $dossier)
              <tr>
                <td>{{ $dossier->id }}</td>
                <td>{{ $dossier->nom }}</td>
                <td>{{ $dossier->prenom }}</td>
                <td>{{ $dossier->cne }}</td>
                <td>{{ $dossier->cin }}</td>
                <td>{{ $dossier->note_dossier }}</td>
                <td>
                  <a  data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-original-title="a payé" 
                    href="/reserver/{{ $dossier->user->id }}">
                  <i style="color:#5cb85c;" class="fa fa-money fa-2x" ></i>
                  </a> &nbsp;&nbsp;&nbsp;
                  <a  data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-original-title="aficher plus" 
                    href="/inscriptions/{{ $dossier->id }}">
                  <i style="color:#3b4f65" class="fa fa-eye fa-2x"></i>
                  </a> &nbsp;&nbsp;&nbsp;
                  <!-- ___________  formulaire supprimer _________ -->
                  {!! Form::open([
                  'method' => 'DELETE',
                  'url' => ['inscriptions', $dossier->id  ],
                  'style' => 'display:inline',
                  'id' => $dossier->id,
                  ]) !!}
                  <a data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-original-title="supprimer" 
                    onclick=" app.del({{ $dossier->id }}); return false;">
                  <i style="color:tomato;" class="fa fa-trash-o fa-2x"></i>
                  </a>
                  {!! Form::close() !!}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- ____________  modal confirmation supprimer ___________ -->
  <modal :show="show" @close="show = false" @confirm="deleteBloc" @cancel="cancelDel">
  <h4>voulez-vous vraiment supprimer ce dossier ?</h4>
  </modal>
  <!-- ____________  chrgement ___________ -->
  <transition name="modal" v-if="chargement" >
    <div class="loading-mask">
      <div class="loader"></div>
    </div>
  </transition>
</div>
<!-- ______________________JS_____________________________ -->
<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset("js/vue.js")}}"></script>
<!-- ____________  template modal confirmez suppresion  ___________ -->
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
<!-- ____________  Vue Script (loading..., delete modal)  ___________ -->
<script>
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
  //____________  Vue instance  ___________ -->
  var app = new Vue({
      el: '#app',
      data: {
          show: false, 
          delvar: false,
          idtodel: '',
          chargement: true
      },
      methods:{
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
  });
</script>
<!-- //____________  data table  ___________ -->
<script type="text/javascript">
  var tableg = $('#datatable-buttons-g').DataTable({
    "dom": "tp"
  });
  
  $('#mysearch-g').keyup(function() {
    tableg.search($(this).val()).draw();
  })
  
  var tablef = $('#datatable-buttons-f').DataTable({
    "dom": "tp"
  });
  
  $('#mysearch-f').keyup(function() {
    tablef.search($(this).val()).draw();
  })
</script>
@endsection