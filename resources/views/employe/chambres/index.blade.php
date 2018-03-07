@extends('layouts.template')

@section('content')

<!-- __________________________________ HTML _____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app"> 
  
    <!-- ____________ content titre ___________ -->
    <div class="page-title">
        <div class="title_left">
            <h3>Gestion des Chambres</h3> 
        </div>
    </div>

    <!-- ____________ Button Ajouter Chambre ___________ -->
    <a href="{{ route('chambres.create') }}" style="float: right" class="btn btn-success" >
        <i class="fa fa-plus"> </i>  Ajouter Un Chambre
    </a>

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
<br><br>


            <table class="table table-striped table-bordered" id="example" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bloc</th>
                        <th>Capacité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chambres as $chambre)
                        <tr>
                            <td style='text-align:center;'><strong>
                              {{ $chambre->id }}</strong>
                            </td>
                            
                            <td style='text-align:center;'> <a href="/blocs" >
                              {{ $chambre->Bloc['titre'] }}
                            </a> </td>

                            <td style='text-align:center;'>{{ $chambre->capacite }}</td>
                            
                            <td style='text-align:center;'>

                              <!-- ____________  button Detail ___________ -->
                                <a href="{{ url('chambres/' .$chambre->id) }}" 
                                   class="btn btn-success" >
                                    <i class="fa fa-list-alt"></i> Detail
                                </a>
                                
                                <!-- ____________  formulaire supprimer ___________ -->

                                <!-- ____________  button modifier ___________ -->
                                <a href="{{ url('chambres/' .$chambre->id. '/edit') }}" 
                                   class="btn btn-primary" >
                                    <i class="fa fa-edit"></i> Modifier
                                </a>
                                
                                <!-- ____________  formulaire supprimer ___________ -->

                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['chambres', $chambre->id  ],
                                    'style' => 'display:inline',
                                    'id' => $chambre->id,
                                ]) !!}

                                    <!-- ____________  button supprimer ___________ -->
                                    <button type="submit" class="btn btn-danger" 
                                            onclick="app.blocName='{{ $chambre->id }}';
                                                     app.del({{ $chambre->id }});
                                                     return false;">

                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer
                                    
                                    </button>
                                   
                                {!! Form::close() !!}
                            </td>      
                        </tr>
                    @endforeach
                </tbody>
            </table>

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

<!-- __________________________________JS_____________________________________________ -->

<!-- ____________  required files  ___________ -->

<script src="{{ asset("js/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset("js/datatables/dataTables.bootstrap.js")}}"></script>
<script src="{{ asset("js/datatables/dataTables.buttons.min.js")}}"></script>
<script src="{{ asset("js/datatables/buttons.bootstrap.min.js")}}"></script>
<script src="{{ asset("js/datatables/jszip.min.js")}}"></script>
<script src="{{ asset("js/datatables/pdfmake.min.js")}}"></script>
<script src="{{ asset("js/datatables/vfs_fonts.js")}}"></script>
<script src="{{ asset("js/datatables/buttons.html5.min.js")}}"></script>
<script src="{{ asset("js/datatables/buttons.print.min.js")}}"></script>
<script src="{{ asset("js/datatables/dataTables.fixedHeader.min.js")}}"></script>
<script src="{{ asset("js/datatables/dataTables.keyTable.min.js")}}"></script>
<script src="{{ asset("js/datatables/dataTables.responsive.min.js")}}"></script>
<script src="{{ asset("js/datatables/responsive.bootstrap.min.js")}}"></script>
<script src="{{ asset("js/datatables/dataTables.scroller.min.js")}}"></script>
<script src="{{ asset("js/vue.js")}}"></script>
<script src="{{ asset("js/axios.js")}}"></script>

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
  var handleDataTableButtons = function() {
      "use strict";
      0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
        dom: "Bfrtip",
        buttons: [{
          extend: "copy",
          className: "btn btn-info",
          exportOptions: {
                columns: [0,1,2,3,4] 
          },
          title: "liste_chambres"
        }, {
          extend: "csv",
          className: "btn btn-info",
          exportOptions: {
                columns: [0,1,2,3,4] 
          },
          title: "liste_blocs"
        }, {
          extend: "excel",
          className: "btn btn-info",
          exportOptions: {
                columns: [0,1,2,3,4] 
          },
          title: "liste_blocs"
        }, {
          extend: "pdf",
          className: "btn btn-info",
          exportOptions: {
                columns: [0,1,2,3,4] 
          },
          title: "liste_blocs"
        }, {
          extend: "print",
          className: "btn btn-info",
          exportOptions: {
                columns: [0,1,2,3,4] 
          },
          title: "liste_blocs"
        }],
        responsive: !0
      })
    },
    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons()
        }
      }
    }();
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
      keys: true
    });
    $('#datatable-responsive').DataTable();
    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });
    var table = $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });
  });
  TableManageButtons.init();
</script>
<script type="text/javascript">

$(document).ready(function (){
    var table = $('#example').DataTable({
       dom: 'lrtip'
    });
    
    $('#table-filter').on('change', function(){
       table.search(this.value).draw();   
    });
    $('#table-filter-bloc').on('change', function(){
       table.search(this.value).draw();   
    });
});

</script>

@endsection