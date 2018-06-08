@extends('layouts.template')
@section('content')
<!-- _______________ HTML ______________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app"> 
  <!-- ____________ content titre ___________ -->
  <div class="page-title">
    <div style="float: left; font-size: medium;">
      <ol class="breadcrumb" style="background-color: #eee">         
        <li><a href="/home">
          <i class="fa fa-home"></i> Acceuil
        </a></li>
        <li class="active">
          <i class="fa fa-building"></i> Gestion des Blocs
        </li>  
      </ol>
    </div>
    <div style="float: right; font-size: medium;">
        <a style="float: right;" href="{{ route('blocs.create') }}" class="btn btn-success" >
          <i class="fa fa-plus"> </i> </i> Ajouter Un Bloc
        </a>
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
          <div class="h3"><i class="fa fa-building-o"></i> Liste Des Blocs </div>   
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-4 col-md-offset-8 " >
            <input class="form-control" style="font-size: 18px" placeholder="Chercher"  type="text" id="mysearch"><br>
          </div>
            <!-- ____________  table liste des blocs ___________ -->
          <table id="datatable-buttons" class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th>#ID <i class="fa fa-sort"></i></th>
                      <th>Titre <i class="fa fa-sort"></i></th>
                      <th>Genre <i class="fa fa-sort"></i></th>
                      <th>Date <i class="fa fa-sort"></i></th>
                      <th>Nombres des chambres <i class="fa fa-sort"></i></th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($blocs as $bloc)
                      <tr>
                          <td>{{ $bloc->id }}</td>
                          <td>{{ $bloc->titre }}</td>
                          <td>{{ $bloc->genre }}</td>
                          <td>{{ $bloc->created_at }}</td>
                          <td>{{ $bloc->chambres_count }}</td>
                          <td>
                              <!-- ____________  button modifier ___________ -->
                              <a  data-toggle="tooltip" 
                                  data-placement="bottom" 
                                  data-original-title="modifier"
                                  href="{{ url('blocs/' .$bloc->id. '/edit') }}" 
                                  >
                                  <i class="fa fa-edit fa-lg"></i>
                              </a>&nbsp;&nbsp;
                              
                              <!-- ____________  formulaire supprimer ___________ -->
                              {!! Form::open([
                                  'method' => 'DELETE',
                                  'url' => ['blocs', $bloc->id  ],
                                  'style' => 'display:inline',
                                  'id' => $bloc->id,
                              ]) !!}

                                  <!-- ____________  button supprimer ___________ -->
                                  <a  data-toggle="tooltip" 
                                      data-placement="bottom" 
                                      data-original-title="supprimer"
                                      onclick="app.blocName='{{ $bloc->titre }}';
                                              app.del({{ $bloc->id }});
                                                   return false;">

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
    <h4>voulez-vous vraiment supprimer le bloc "<strong>@{{ blocName }}</strong>" ?</h4>
  </modal>
  <!-- ____________  chrgement ___________ -->
  <transition name="modal" v-if="chargement" >
      <div class="loading-mask">
          <div class="loader"></div>      
      </div>
  </transition>
</div>
<!-- ________________JS___________________________ -->
<!-- ____________  required files  ___________ -->
<script src="{{asset("js/datatables/jquery.dataTables.min.js")}}"></script>
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
<!-- //____________  data table and buttons  ___________ -->
<script>
  var table = $('#datatable-buttons').DataTable({
    "dom": "tp",
  });
  $('#mysearch').keyup(function() {
    table.search($(this).val()).draw();
  })
  // var handleDataTableButtons = function() {
  //     "use strict";
  //     0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
  //       dom: "t",
  //       buttons: [{
  //         extend: "excel",
  //         text:'<i class="fa fa-file-excel-o"></i> pdf',
  //         className: "btn btn-success btn-lg",
  //         exportOptions: {
  //               columns: [0,1,2,3,4] 
  //         },
  //         title: "liste_blocs"
  //       }, {
  //         extend: "pdf",
  //         text:      '<i class="fa fa-file-pdf-o"></i> Excel',
  //         className: "btn btn-danger btn-lg",
  //         exportOptions: {
  //               columns: [0,1,2,3,4] 
  //         },
  //         title: "liste_blocs"
  //       }],
  //       responsive: !0
  //     })
  //   },
  //   TableManageButtons = function() {
  //     "use strict";
  //     return {
  //       init: function() {
  //         handleDataTableButtons()
  //       }
  //     }
  //   }();
</script>
<script type="text/javascript">
  // $(document).ready(function() {
  //   $('#datatable-keytable').DataTable({
  //     keys: true
  //   });
  //    $('#datatable-responsive').DataTable();
  //   $('#datatable-scroller').DataTable({
  //     ajax: "js/datatables/json/scroller-demo.json",
  //     deferRender: true,
  //     scrollY: 380,
  //     scrollCollapse: true,
  //     scroller: true
  //   });
  //   var table = $('#datatable-fixed-header').DataTable({
  //     fixedHeader: true
  //   });
  // });
  // TableManageButtons.init();
</script>
@endsection