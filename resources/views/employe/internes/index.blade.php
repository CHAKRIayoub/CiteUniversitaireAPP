@extends('layouts.template')
@section('content')
<style type="text/css"> 
</style>
<!-- ________________________ HTML __________________________ -->
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
          <i class="fa fa-users"></i> Gestion des Résidents
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
          <div class="h3" ><i class="fa fa-bed"></i> Liste Des Résident </div> 
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <ul style="border-bottom: none;" class="nav nav-tabs" role="tablist">
            <li class="active" >
              <a data-toggle="tab" href="#boys" role="tab">
                <h5>
                  <i class="fa fa-male"></i> Masculin
                </h5>
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#girls" role="tab" >
                <h5>
                  <i class="fa fa-female"></i> Féminin
                </h5>
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" id="boys" class="tab-pane fade in active bg-white">

              <div class="col-md-4 col-md-offset-8 " >
                <input class="form-control" style="font-size: 18px" placeholder="Chercher"  type="text" id="srch_b"><br>
              </div>
              <!-- ____________  table liste des blocs ___________ -->
              <table id="dtt_b" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#ID <i class="fa fa-sort"></i></th>
                    <th>Nom <i class="fa fa-sort"></i></th>
                    <th>Prenom <i class="fa fa-sort"></i></th>
                    <th>CIN <i class="fa fa-sort"></i></th>
                    <th>Chambre <i class="fa fa-sort"></i></th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dossiers as $dossier)
                  @if ($dossier->genre != 'masculin') @continue @endif
                  <tr>
                    <td>{{ $dossier->id }}</td>
                    <td>{{ $dossier->nom }}</td>
                    <td>{{ $dossier->prenom }}</td>
                    <td>{{ $dossier->cne }}</td>
                    <td>
                      {{ $dossier->chambre->id }}, 
                      {{ $dossier->chambre->bloc->titre }}
                    </td>
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
                      </a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a  data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="Transfert" 
                        href="/transfert/{{ $dossier->user_id }}">
                      <i style="color:#4444FF;" class="fa fa-exchange" ></i>
                      </a>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <a data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="Permutation" 
                        href="/permutation/{{ $dossier->user_id }}">
                      <i style="color:#000;" class="fa fa-handshake-o" ></i>
                      </a>
                      {!! Form::close() !!}
                      
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="col-md-4 drpdn">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-download" ></i> Exporter
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a id="exportpdf_b">
                    <i class="fa fa-file-pdf-o" ></i> PDF
                  </a></li>
                  <li><a id="exportexl_b">
                    <i class="fa fa-file-excel-o" ></i> Excel
                  </a></li>
                </ul>
              </div><br><br><br><br><br>

            </div>
            <div role="tabpanel" id="girls" class="tab-pane fade in bg-white">

              <div class="col-md-4 col-md-offset-8 " >
                <input class="form-control" style="font-size: 18px" placeholder="Chercher"  type="text" id="srch_g"><br>
              </div>
              <!-- ____________  table liste des blocs ___________ -->
              <table width="100%" id="dtt_g" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#ID <i class="fa fa-sort"></i></th>
                    <th>Nom <i class="fa fa-sort"></i></th>
                    <th>Prenom <i class="fa fa-sort"></i></th>
                    <th>CNE <i class="fa fa-sort"></i></th>
                    <th>Chambre <i class="fa fa-sort"></i></th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody >
                  @foreach ($dossiers as $dossier)
                  @if ($dossier->genre == 'masculin') @continue @endif
                  <tr>
                    <td>{{ $dossier->id }}</td>
                    <td>{{ $dossier->nom }}</td>
                    <td>{{ $dossier->prenom }}</td>
                    <td>{{ $dossier->cne }}</td>
                    <td>{{ $dossier->chambre->id }}, 
                        {{ $dossier->chambre->bloc->titre }}</td>
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
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <a  data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="Transfert" 
                        href="/transfert/{{ $dossier->user_id }}">
                      <i style="color:#4444FF;" class="fa fa-exchange" ></i>
                      </a>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <a data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="Permutation" 
                        href="/permutation/{{ $dossier->user_id }}">
                      <i style="color:#000;" class="fa fa-handshake-o" ></i>
                      </a>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="col-md-4 drpdn">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-download" ></i> Exporter
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a id="exportpdf_g">
                    <i class="fa fa-file-pdf-o" ></i> PDF
                  </a></li>
                  <li><a id="exportexl_g">
                    <i class="fa fa-file-excel-o" ></i> Excel
                  </a></li>
                </ul>
              </div><br><br><br><br><br>
            </div>
          </div>
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
<script src="{{ asset("js/excelexportjs.js")}}"></script>
<script src="{{ asset("js/jspdf.min.js")}}"></script>
<script src="{{ asset("js/jspdf.plugin.autotable.js")}}"></script>
<script src="{{ asset("js/functions.js")}}"></script>
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

  var urlimage = "{{ asset("images/header.PNG") }}";
  var data = <?php echo json_encode($dossiers); ?>;
  var boys = [], girls = [];
  data.forEach(element => {
    if(element.genre == 'masculin') boys.push(element)
    else girls.push(element)
  })


  $.fn.tabExcelFormat = function(obj){
    delete obj.user
    delete obj.user_id
    delete obj.ville_id
    obj.chambre = " "+obj.chambre.id+", "+obj.chambre.bloc.titre
    return obj;
  }

  $.fn.dataExcel = function(data){
    list = []
    data.forEach(element => {
      list.push($.fn.tabExcelFormat(element));
    });
    return list
  }

  $.fn.tabPdfFormat = function(tab){
    var item = Object.values(tab);
    item.splice(1,0,item[8])
    item.splice(2,0,item[10])
    item.splice(3,0,item[6])
    item.splice(4,0,item[30].id+", "+item[30].bloc.titre)
    item.splice(5,27,"")

    return item
  }

  $.fn.dataPdf = function(data){
    list = []
    data.forEach(element => {
      list.push($.fn.tabPdfFormat(element));
    });
    return list
  }

 

  var tb = $('#dtt_b').DataTable({"dom": "tp"});
  var tg = $('#dtt_g').DataTable({"dom": "tp"});
  $('#srch_b').keyup(function(){tb.search($(this).val()).draw();})
  $('#srch_g').keyup(function(){tg.search($(this).val()).draw();})

  //excel export events
  $('#exportexl_b').click(function(){
    $.fn.exportExcel($.fn.dataExcel(boys))
  });
  $('#exportexl_g').click(function(){
    $.fn.exportExcel($.fn.dataExcel(girls))
  });

  $('#exportpdf_b').click(function(){
    $.fn.exportPdf(urlimage, "liste_résidents_masculin.pdf", "Liste des Résidents - Masculin", "dtt_b", [0,5], [], $.fn.dataPdf(boys));
  });
  $('#exportpdf_g').click(function(){
    $.fn.exportPdf(urlimage, "liste_résidents_féminin.pdf", "Liste des Résidents - Féminin", "dtt_g", [0,5], [], $.fn.dataPdf(girls));
  });

</script>
@endsection