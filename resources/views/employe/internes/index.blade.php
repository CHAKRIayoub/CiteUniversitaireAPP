@extends('layouts.template')
@section('content')
<style type="text/css"> 
</style>
<!-- __________________________________ HTML _____________________________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app">
  <!-- ____________ content titre ___________ -->
  <div class="page-title">
    <div style="float: left; font-size: medium; width: 100%">
      <ol class="breadcrumb" style="background-color: #eee">         
        <li><a href="/home">
          <i class="fa fa-home"></i> Acceuil
        </a></li>
        <li class="active">
          <i class="fa fa-users"></i> Gestion des Internes
        </li>  
      </ol>
    </div>
  </div>
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
      <div class="x_panel">  
        <div class="x_title">
          <div class="h3" ><i class="fa fa-bed"></i> Liste Des Internes </div> 
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="panel panel-body" >
            <div class="col-md-4 col-md-offset-8 " >
              <input class="form-control" style="font-size: 18px" placeholder="Chercher"  type="text" id="mysearch"><br>
            </div>
            <!-- ____________  table liste des blocs ___________ -->
            <table id="datatable-buttons" class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>#ID <i class="fa fa-sort"></i></th>
                  <th>Nom <i class="fa fa-sort"></i></th>
                  <th>Prenom <i class="fa fa-sort"></i></th>
                  <th>CNE <i class="fa fa-sort"></i></th>
                  <th>CIN <i class="fa fa-sort"></i></th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dossiers as $dossier)
                <tr>
                  <td>{{ $dossier->id }}</td>
                  <td>{{ $dossier->nom }}</td>
                  <td>{{ $dossier->prenom }}</td>
                  <td>{{ $dossier->cne }}</td>
                  <td>{{ $dossier->cin }}</td>
                  <td>
                    <a  data-toggle="tooltip" 
                      data-placement="bottom" 
                      data-original-title="plus d'informations" 
                      href="/internes/{{ $dossier->user_id }}">
                    <i style="color:#5cb85c;" class="fa fa-eye" ></i>
                    </a>&nbsp;&nbsp;&nbsp;
                    <!-- ___________  formulaire supprimer _________ -->
                    {!! Form::open([
                    'method' => 'DELETE',
                    'url' => ['internes', $dossier->id  ],
                    'style' => 'display:inline',
                    'id' => $dossier->id,
                    ]) !!}
                    <a data-toggle="tooltip" 
                      data-placement="bottom" 
                      data-original-title="supprimer" 
                      onclick=" app.del({{ $dossier->id }}); return false;">
                    <i style="color: tomato" class="fa fa-trash-o"></i>
                    </a>
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <br><br><br><br>
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
<!-- ________________________JS___________________________________ -->
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
<script>
  var table = $('#datatable-buttons').DataTable({
    "dom": "tp"
  });
  $('#mysearch').keyup(function() {
    table.search($(this).val()).draw();
  })
</script>
@endsection