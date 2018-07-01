@extends('layouts.template')
@section('content')
<style type="text/css">
  #lb, #lg, #la{ padding:5px; box-shadow: 0px 1px 1px 1px #E6E9ED;}
  .nav-tabs { border-bottom: 2px solid #DDD; }
  .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
  .nav-tabs > li > a { border: none; color: #666; }
  .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
  .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
  .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
  .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
  .tab-pane { padding: 15px 0; } 
  .drpdn ul{ font-size: 15px; }
  .drpdn button{ width: 150px; }
</style>
<!-- ____________________ HTML _________________________ -->
<!-- _________ content ________________ -->
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
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-male"></i>
        </div>
        <div class="count">{{ $rtrn_boy['disp'] }}</div>
        <br>
        <h3>Places Disponible</h3>
        <p>Places Disponible, genre Masculin</p>
        <br>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-mars"></i>
        </div>
        <div class="count">{{ count($rtrn_boy['list']) }}</div>
        <br>
        <h3>Inscriptions</h3>
        <p>Nombre des nouveaux inscrits, Masculin</p>
        <br>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-female"></i>
        </div>
        <div class="count">{{ $rtrn_girl['disp'] }}</div>
        <br>
        <h3>Places Disponible</h3>
        <p>Tenant Compte Les Places Occupé</p>
        <br>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-venus"></i>
        </div>
        <div class="count">{{ count($rtrn_girl['list']) }}</div>
        <br>
        <h3>Inscriptions</h3>
        <p>Nombre des nouveaux inscrits, Féminin</p>
        <br>
      </div>
    </div>
    <div class="x_content">
      <ul class="nav nav-tabs" role="tablist">
        <li class="active">
          <a data-toggle="tab" href="#lpbg" aria-controls="home" role="tab" >
            <h4>
              <i class="fa fa-list-ol"></i> Listes Principales
            </h4>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#labg" aria-controls="home" role="tab" >
            <h4>
              <i class="fa fa-list-ul"></i> Listes D'attentes
            </h4>
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div style="padding: 15px;" role="tabpanel" id="lpbg" class="tab-pane fade in bg-white active">
          <br>
          <ul style="border-bottom: none;" class="nav nav-tabs" role="tablist">
            <li class="active" >
              <a data-toggle="tab" href="#lpb" role="tab">
                <h5>
                  <i class="fa fa-male"></i> Masculin
                </h5>
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#lpg" role="tab" >
                <h5>
                  <i class="fa fa-female"></i> Féminin
                </h5>
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" id="lpb" class="tab-pane fade in active bg-white">
              <br>
              <div class="col-md-4 col-md-offset-8">
                <input class="form-control" style="font-size: 18px" placeholder="Chercher"  type="text" id="srch-lpb"><br>
              </div>
              <!-- ____________  table liste des blocs ___________ -->
              <table style="width: 100%" id="dtt-lpb" class="table table-striped ">
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
                  @for ($i = 0; $i < $rtrn_boy['disp']; $i++)
                  @if ($i > count($rtrn_boy['list']) - 1) @break @endif 
                  <tr>
                    <td>{{ $rtrn_boy['list'][$i]->id }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->nom }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->prenom }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->cne }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->cin }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->note_dossier }}</td>
                    <td>
                      @if (!$periode_inscription)
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="valider" href="/reserver/{{ $rtrn_boy['list'][$i]->user->id }}">
                        <i style="color:#5cb85c;" class="fa fa-check-square-o"></i>
                      </a> &nbsp;&nbsp;&nbsp;
                      @endif
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="aficher plus" href="/inscriptions/{{ $rtrn_boy['list'][$i]->id }}">
                        <i style="color:#3b4f65" class="fa fa-eye"></i>
                      </a> &nbsp;&nbsp;&nbsp;
                      <!-- ___________  formulaire supprimer _________ -->
                      {!! Form::open([
                      'method' => 'DELETE',
                      'url' => ['inscriptions', $rtrn_boy['list'][$i]->id  ],
                      'style' => 'display:inline',
                      'id' => $rtrn_boy['list'][$i]->id,
                      ]) !!}
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="supprimer" onclick=" app.del({{ $rtrn_boy['list'][$i]->id }}); return false;">
                        <i style="color:tomato;" class="fa fa-trash-o"></i>
                      </a>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endfor
                </tbody>
              </table><br>
              <div class="col-md-4 drpdn">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-download"></i> Exporter
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a id="exportpdf_lpb" >
                    <i class="fa fa-file-pdf-o" ></i> PDF
                  </a></li>
                  <li><a id="exportexl_lpb">
                    <i class="fa fa-file-excel-o" ></i> Excel
                  </a></li>
                </ul>
              </div><br><br><br><br><br>
            </div>
            <div role="tabpanel" id="lpg" class="tab-pane fade in bg-white">
              <br>
              <div class="col-md-4 col-md-offset-8">
                <input class="form-control" style="font-size: 18px" placeholder="Chercher" type="text" id="srch-lpg"><br>
              </div>
              <!-- ____________  table liste des blocs ___________ -->
              <table style="width: 100%" id="dtt-lpg" class="table table-striped ">
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
                  @for ($i = 0; $i < $rtrn_girl['disp']; $i++)
                  @if ($i > count($rtrn_girl['list']) - 1) @break @endif
                  <tr>
                    <td>{{ $rtrn_girl['list'][$i]->id }}</td>
                    <td>{{ $rtrn_girl['list'][$i]->nom }}</td>
                    <td>{{ $rtrn_girl['list'][$i]->prenom }}</td>
                    <td>{{ $rtrn_girl['list'][$i]->cne }}</td>
                   <td>{{ $rtrn_girl['list'][$i]->cin }}</td>
                    <td>{{ $rtrn_girl['list'][$i]->note_dossier }}</td>
                    <td>
                      @if (!$periode_inscription)
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="valider" href="/reserver/{{ $rtrn_girl['list'][$i]->user->id }}">
                        <i style="color:#5cb85c;" class="fa fa-check-square-o"></i>
                      </a> &nbsp;&nbsp;&nbsp;
                      @endif


                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="aficher plus" href="/inscriptions/{{ $rtrn_girl['list'][$i]->id }}">
                        <i style="color:#3b4f65" class="fa fa-eye"></i>
                      </a> &nbsp;&nbsp;&nbsp;
                      <!-- ___________  formulaire supprimer _________ -->
                      {!! Form::open([
                      'method' => 'DELETE',
                      'url' => ['inscriptions', $rtrn_girl['list'][$i]->id  ],
                      'style' => 'display:inline',
                      'id' => $rtrn_girl['list'][$i]->id,
                      ]) !!}
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="supprimer" onclick=" app.del({{ $rtrn_girl['list'][$i]->id }}); return false;">
                        <i style="color:tomato;" class="fa fa-trash-o"></i>
                      </a>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endfor
                </tbody>
              </table><br><br>
              <div class="col-md-4 drpdn">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-download" ></i> Exporter
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a id="exportpdf_lpg" >
                    <i class="fa fa-file-pdf-o" ></i> PDF
                  </a></li>
                  <li><a id="exportexl_lpg" >
                    <i class="fa fa-file-excel-o" ></i> Excel
                  </a></li>
                </ul>
              </div><br><br><br><br><br>
            </div>
          </div> 
        </div>
        <div style="padding: 15px;" role="tabpanel" id="labg" class="tab-pane fade in bg-white">
          <br>
          <ul style="border-bottom: none;" class="nav nav-tabs" role="tablist">
            <li class="active" >
              <a data-toggle="tab" href="#lab" role="tab">
                <h5>
                  <i class="fa fa-male"></i> Masculin
                </h5>
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#lag" role="tab" >
                <h5>
                  <i class="fa fa-female"></i> Féminin
                </h5>
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" id="lab" class="tab-pane fade in active bg-white">
              <br>
              <div class="col-md-4 col-md-offset-8">
                <input class="form-control" style="font-size: 18px" placeholder="Chercher" type="text" id="srch-lab"><br>
              </div>
              <!-- ____________  table liste des blocs ___________ -->
              <table style="width: 100%" id="dtt-lab" class="table table-striped ">
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
                @for ($i=$rtrn_boy['disp'];$i<count($rtrn_boy['list']);$i++)
                                    <tr>
                    <td>{{ $rtrn_boy['list'][$i]->id }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->nom }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->prenom }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->cne }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->cin }}</td>
                    <td>{{ $rtrn_boy['list'][$i]->note_dossier }}</td>
                    <td>
                     
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="aficher plus" href="/inscriptions/{{ $rtrn_boy['list'][$i]->id }}">
                        <i style="color:#3b4f65" class="fa fa-eye"></i>
                      </a> &nbsp;&nbsp;&nbsp;
                      <!-- ___________  formulaire supprimer _________ -->
                      {!! Form::open([
                      'method' => 'DELETE',
                      'url' => ['inscriptions', $rtrn_boy['list'][$i]->id  ],
                      'style' => 'display:inline',
                      'id' => $rtrn_boy['list'][$i]->id,
                      ]) !!}
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="supprimer" onclick=" app.del({{ $rtrn_boy['list'][$i]->id }}); return false;">
                        <i style="color:tomato;" class="fa fa-trash-o"></i>
                      </a>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endfor
                </tbody>
              </table><br><br>
              <div class="col-md-4 drpdn">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-download" ></i> Exporter
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a id="exportpdf_lab" >
                    <i class="fa fa-file-pdf-o" ></i> PDF
                  </a></li>
                  <li><a id="exportexl_lab">
                    <i class="fa fa-file-excel-o" ></i> Excel
                  </a></li>
                </ul>
              </div><br><br><br><br><br>
            </div>
            <div role="tabpanel" id="lag" class="tab-pane fade in bg-white">
              <br>
              <div class="col-md-4 col-md-offset-8">
                <input class="form-control" style="font-size: 18px" placeholder="Chercher" type="text" id="srch-lag"><br>
              </div>
              <!-- ____________  table liste des blocs ___________ -->
              <table style="width: 100%" id="dtt-lag" class="table table-striped ">
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
                @for ($i=$rtrn_girl['disp'];$i<count($rtrn_girl['list']);$i++)
                  <tr>
                    <td>{{ $rtrn_girl['list'][$i]->id }}</td>
                    <td>{{ $rtrn_girl['list'][$i]->nom }}</td>
                    <td>{{ $rtrn_girl['list'][$i]->prenom }}</td>
                    <td>{{ $rtrn_girl['list'][$i]->cne }}</td>
                   <td>{{ $rtrn_girl['list'][$i]->cin }}</td>
                    <td>{{ $rtrn_girl['list'][$i]->note_dossier }}</td>
                    <td>
                     
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="aficher plus" href="/inscriptions/{{ $rtrn_girl['list'][$i]->id }}">
                        <i style="color:#3b4f65" class="fa fa-eye"></i>
                      </a> &nbsp;&nbsp;&nbsp;
                      <!-- ___________  formulaire supprimer _________ -->
                      {!! Form::open([
                      'method' => 'DELETE',
                      'url' => ['inscriptions', $rtrn_girl['list'][$i]->id  ],
                      'style' => 'display:inline',
                      'id' => $rtrn_girl['list'][$i]->id,
                      ]) !!}
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="supprimer" onclick=" app.del({{ $rtrn_girl['list'][$i]->id }}); return false;">
                        <i style="color:tomato;" class="fa fa-trash-o"></i>
                      </a>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endfor
                <tbody>
                </tbody>
              </table><br><br>
              <div class="col-md-4 drpdn">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-download" ></i> Exporter
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a id="exportpdf_lag" >
                    <i class="fa fa-file-pdf-o" ></i> PDF
                  </a></li>
                  <li><a id="exportexl_lag" >
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
<!-- ______________________JS_____________________________ -->
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
<script type="text/javascript">

 
  list_boy = <?php echo json_encode($rtrn_boy['list']); ?>,
  list_girl = <?php echo json_encode($rtrn_girl['list']); ?>,
  disp_b = <?php echo $rtrn_boy['disp']; ?>,
  disp_g = <?php echo $rtrn_girl['disp']; ?>,
  urlimage = "{{ asset("images/header.PNG") }}";


  $.fn.tabExcelFormat = function(obj){
    delete obj.user
    delete obj.user_id
    delete obj.ville_id
    return obj;
  }


  $.fn.dataExcelPrincipale = function(list, dispo){
    var l = [];
    for(i = 0; i < dispo ;i++){
      if (i > list.length - 1) break;
      l[l.length] = $.fn.tabExcelFormat(list[i]);
    }
    return l;
  }


  $.fn.dataExcelAttente = function(list, dispo){
    var l = [];
    for(i = dispo ; i<list.length ;i++){
      l[l.length] = list[i];
      l[l.length] = $.fn.tabExcelFormat(list[i]);
    }
    return l;
  }


  $.fn.tabPdfFormat = function(tab){
    tab.splice(1,0,tab[8])
    tab.splice(2,0,tab[10])
    tab.splice(3,0,tab[5])
    tab.splice(4,0,tab[7])
    tab.splice(5,0,tab[28])
    tab.splice(6,28,"")
    return tab;
  }


  $.fn.dataPdfPrincipale = function(list, dispo){
    var l = [];
    for(i = 0; i < dispo ;i++){
      if (i > list.length - 1) break;
      l.push($.fn.tabPdfFormat(Object.values(list[i])))
    }
    return l;
  }


  $.fn.dataPdfAttente = function(list, dispo){
    var l = [];
    for(i = dispo ; i<list.length ;i++){
      l.push($.fn.abPdfFormat(Object.values(list[i])))
    }
    return l;
  }


  //init datatables  
  var tables = []
  tables.push( $('#dtt-lpb').DataTable({ "dom": "tp" }) )
  tables.push( $('#dtt-lpg').DataTable({ "dom": "tp" }) )
  tables.push( $('#dtt-lab').DataTable({ "dom": "tp" }) )
  tables.push( $('#dtt-lag').DataTable({ "dom": "tp" }) )
  $('#srch-lpb').keyup(function() { tables[0].search($(this).val()).draw(); })
  $('#srch-lpg').keyup(function() { tables[1].search($(this).val()).draw(); })
  $('#srch-lab').keyup(function() { tables[2].search($(this).val()).draw(); })
  $('#srch-lag').keyup(function() { tables[3].search($(this).val()).draw(); })
 

  //pdf export events
  $('#exportpdf_lpb').click(function(){
    $.fn.exportPdf(urlimage, "liste_principale_masculin.pdf", "Liste Principale - Masculin","dtt-lpb", [0,6], [], $.fn.dataPdfPrincipale(list_boy, disp_b));
  });

  $('#exportpdf_lpg').click(function(){
    $.fn.exportPdf(urlimage, "liste_principale_féminin.pdf", "Liste Principale - Féminin", "dtt-lpg", [0,6], [], $.fn.dataPdfPrincipale(list_girl, disp_g));
  });

  $('#exportpdf_lab').click(function(){
    $.fn.exportPdf(urlimage, "liste_attente_masculin.pdf", "Liste D'attente - Masculin", "dtt-lab", [0,6], [], $.fn.dataPdfAttente(list_boy, disp_b));
  });

  $('#exportpdf_lag').click(function(){
    $.fn.exportPdf(urlimage, "liste_attente_féminin.pdf", "Liste D'attente - Féminin", "dtt-lag", [0,6], [], $.fn.dataPdfAttente(list_girl, disp_g));
  });

  //excel export events
  $('#exportexl_lpb').click(function(){
    $.fn.exportExcel($.fn.dataExcelPrincipale(list_boy, disp_b))
  });
  $('#exportexl_lpg').click(function(){
    $.fn.exportExcel($.fn.dataExcelPrincipale(list_girl, disp_g))
  });
  $('#exportexl_lab').click(function(){ 
    $.fn.exportExcel($.fn.dataExcelAttente(list_boy, disp_b))
  });
  $('#exportexl_lag').click(function(){
    $.fn.exportExcel($.fn.dataExcelAttente(list_girl, disp_g))
  });

</script>
@endsection