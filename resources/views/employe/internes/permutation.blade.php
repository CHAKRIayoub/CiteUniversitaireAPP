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
        <li><a href="/internes">
          <i class="fa fa-users"></i> Gestion des Résidents
        </a></li>
        <li class="active">
          <i class="fa fa-handshake-o"></i> Permutation des Résidents 
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
          <div class="h3" ><i class="fa fa-handshake-o"></i> Permutation des Résidents</div> 
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
                      <a href="/permutation?id2={{$dossier->user_id}}&id1={{$id}}"data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="selectionner" >
                      <i style="color: green" class="fa fa-check-square"></i>
                      </a> &nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
             

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
                  @if ($dossier->genre == 'masculin' ) @continue @endif
                  <tr>
                    <td>{{ $dossier->id }}</td>
                    <td>{{ $dossier->nom }}</td>
                    <td>{{ $dossier->prenom }}</td>
                    <td>{{ $dossier->cne }}</td>
                    <td>{{ $dossier->chambre->id }}, 
                      {{ $dossier->chambre->bloc->titre }}</td>
                    <td>
                      <a href="/permutation?id2={{$dossier->user_id}}&id1={{$id}}"data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-original-title="selectionner" >
                      <i style="color: green" class="fa fa-check-square"></i>
                      </a> &nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              
            </div>
          </div>
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
<!-- ________________________JS___________________________________ -->
<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset("js/vue.js")}}"></script>

<!-- ____________  template modal confirmez suppresion  ___________ -->

<!-- ____________  Vue Script (loading..., delete modal)  ___________ -->
<script>
  //____________  Vue instance  ___________ -->
  var app = new Vue({
      el: '#app',
      data: {

          chargement: true
      },
      methods:{
         
      },
      mounted: function () {  
          this.chargement = false;
          $('.row').addClass('animated fadeInUp');
      }
  });
</script>
<!-- //____________  data table  ___________ -->
<script>
  var tb = $('#dtt_b').DataTable({"dom": "tp"});
  var tg = $('#dtt_g').DataTable({"dom": "tp"});
  $('#srch_b').keyup(function(){tb.search($(this).val()).draw();})
  $('#srch_g').keyup(function(){tg.search($(this).val()).draw();})

</script>
@endsection