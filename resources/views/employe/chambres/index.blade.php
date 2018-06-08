@extends('layouts.template')
@section('content')
<!-- __________________ HTML _____________________ -->
<!-- __________ content __________________ -->
<div class="right_col" role="main" id="app"> 
  <!-- ____________ content titre ___________ -->
  <div class="page-title"></div>
    <div style="float: left; font-size: medium;">
      <ol class="breadcrumb" style="background-color: #eee">         
        <li><a href="/home">
          <i class="fa fa-home"></i> Acceuil
        </a></li>
        <li class="active">
          <i class="fa fa-bed"></i> Gestion des Chambres
        </li>  
      </ol>
    </div>
    <div style="float: right; font-size: medium;">
      <a href="{{ route('chambres.create') }}" class="btn btn-success">
        <i class="fa fa-plus"> </i>  Ajouter Une Chambre
      </a>
    </div> 
    <!-- ____________ Button Ajouter Chambre ___________ -->
    <div class="clearfix"></div>        
    <div class="row">
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
              <div class="h3" ><i class="fa fa-bed"></i> Liste Des Chambres </div> 
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-4 col-md-offset-8 " >
                <input class="form-control" style="font-size: 18px" placeholder="Chercher"  type="text" id="mysearch"><br>
              </div>
              <table class="table table-striped table-hover" id="datatable-buttons">
                <thead>
                  <tr style="background-color: #2a3f54; color: white; " >
                    <th>#ID <i class="fa fa-sort"></i></th>
                    <th>Bloc <i class="fa fa-sort"></i></th>
                    <th>Capacité <i class="fa fa-sort"></i></th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($chambres as $chambre)
                    <tr>
                      <td><strong>{{ $chambre->id }}</strong></td>
                      <td><a href="/blocs">{{ $chambre->Bloc['titre'] }}</a></td>
                      <td>{{ $chambre->capacite }}</td>
                      <td>
                        <!-- ____________  button Detail ___________ -->
                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="plus d'informations" href="{{ url('chambres/' .$chambre->id) }}">
                          <i style="color:#5cb85c;" class="fa fa-list-alt fa-lg"></i>
                        </a>&nbsp;&nbsp;&nbsp;
                        <!-- ____________  formulaire supprimer ___________ -->
                        <!-- ____________  button modifier ___________ -->
                        <a  data-toggle="tooltip" data-placement="bottom" data-original-title="modifier" href="{{ url('chambres/' .$chambre->id. '/edit') }}">
                          <i class="fa fa-edit fa-lg "></i>
                        </a>&nbsp;&nbsp;&nbsp;
                        <!-- ____________  formulaire supprimer ___________ -->
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['chambres', $chambre->id  ],
                            'style' => 'display:inline',
                            'id' => $chambre->id,
                        ]) !!}
                        <!-- ____________  button supprimer ___________ -->
                        <a  data-toggle="tooltip" data-placement="bottom" data-original-title="supprimer" onclick="app.blocName='{{ $chambre->id }}'; app.del({{ $chambre->id }}); return false;">
                          <i style="color:tomato;" class="fa fa-trash-o fa-lg" ></i>
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
        <h4>voulez-vous vraiment supprimer cette chambre " ?</h4>
      </modal>
      <!-- ____________  chrgement ___________ -->
      <transition name="modal" v-if="chargement" >
        <div class="loading-mask">
          <div class="loader"></div>      
        </div>
      </transition>
</div>
<!-- ___________________JS_____________________________ -->
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
            blocName: " ",
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
<!-- //____________  data table   ___________ -->
<script>
  var table = $('#datatable-buttons').DataTable({
    "dom": "tp"
  });
  $('#mysearch').keyup(function() {
    table.search($(this).val()).draw();
  })
</script>
@endsection