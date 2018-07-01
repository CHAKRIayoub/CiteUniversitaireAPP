@extends('layouts.template')
@section('content')
<!-- ___________________________ HTML _________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app"> 
  <div class="x_title">
    <div style="float: left; font-size: medium;">
      <ol class="breadcrumb" style="background-color: #eee"  >         
        <li><a href="/home">
          <i class="fa fa-home"></i> Acceuil
        </a></li>
        <li class="active">
          <i class="fa fa-users"></i> Gestion des Utilisateurs
        </li>  
      </ol>
    </div>
    <div style="float: right; font-size: medium;">
      <a href="{{ route('utilisateurs.create') }}" style="float: right" class="btn btn-success">
        <i class="fa fa-user-plus"> </i>  Ajouter un employé
      </a>
    </div> 
  </div> 
  <div class="clearfix"></div>        
  <div class="row">          
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" 
                class="close" 
                data-dismiss="alert" 
                aria-label="Close">
              <span aria-hidden="true">×</span>
        </button>
        <strong>{{ $message }}</strong> 
      </div>
    @endif
    <div class="x_content">
      <div class="x_panel">
        <div class="x_title">
          <div class="h3"><i class="fa fa-users"></i> Liste Des Utilisateurs </div>
          <!-- ____________ Button Ajouter bloc ___________ -->
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><br><br>
          <div class="col-md-4 col-md-offset-8 " >
            <input class="form-control" style="font-size: 18px" placeholder="Chercher"  type="text" id="mysearch"><br>
          </div>
          <table  class="table table-striped table-hover" id="datatable-buttons">
            <thead>
              <tr>
                <th>ID <i class="fa fa-sort"></i> </th>
                <th>Nom <i class="fa fa-sort"></i></th>
                <th>Email <i class="fa fa-sort"></i></th>
                <th>Droits d'accées <i class="fa fa-sort"></i></th>
                <th>Création <i class="fa fa-sort"></i></th>
                <th>Modification <i class="fa fa-sort"></i></th>
                <th>Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($utilisateurs as $user)
                @if ($user->id == Auth::user()->id )
                  @continue
                @endif

                <tr>
                  <td width="50px" ><strong>{{ $user->id }}</strong></td>
                  <td> {{ $user->name }} </td>
                  <td>{{ $user->email }}</td>
                  <td width="300px">
                    @foreach (explode(",", $user->droits) as $droit)
                      <span class="btn btn-success btn-xs">
                        <i class="fa fa-check-square-o"></i> {{ $droit }}
                      </span>
                    @endforeach
                  </td>
                  <td>{{ $user->created_at }}</td>
                  @if(isset($user->updated_at))
                    <td>{{ $user->updated_at }}</td>
                  @else
                    <td>Aucun modification</td>
                  @endif
                  <td>              
                    <a data-toggle="tooltip" data-placement="bottom" data-original-title="modifier" href="{{url('utilisateurs/' .$user->id. '/edit')}}">
                      <i style="color: teal" class="fa fa-edit fa-lg"></i>
                    </a>&nbsp;&nbsp;&nbsp;
                    <!-- ________  formulaire supprimer _____ -->
                    {!! Form::open([
                        'method' => 'DELETE',
                        'url' => ['utilisateurs', $user->id  ],
                        'style' => 'display:inline',
                        'id' => $user->id,
                    ]) !!}
                      <!-- ____________  button supprimer ___________ -->
                      <a onclick="app.blocName='{{ $user->id }}'; app.del({{ $user->id }}); return false;" data-toggle="tooltip" data-placement="bottom" data-original-title="supprimer">
                        <i class="fa fa-trash-o fa-lg" 
                           style="color: tomato" ></i>
                      </a>
                    {!! Form::close() !!}
                  </td>      
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- ____________  modal confirmation supprimer ___________ -->
      <modal  :show="show" @close="show = false" 
              @confirm="deleteUser" @cancel="cancelDel">

          <h4>voulez-vous vraiment supprimer ce Employé " ?</h4>
      
      </modal>
      <!-- ____________  chrgement ___________ -->
      <transition name="modal" v-if="chargement" >
        <div class="loading-mask">
            <div class="loader"></div>      
        </div>
      </transition>
    </div>
  </div>
</div>
<!-- _______________________JS_____________________________ -->
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
            chargement: true,
            colors:['success','primary','info','default','danger','warning'],

        },
        methods:{
            del : function(id, l){
                //this.blocName = l;
                this.show = true;
                this.idtodel = id;
            },
            deleteUser : function (btn) {
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
    "dom": "tp"
  });

  $('#mysearch').keyup(function() {
    table.search($(this).val()).draw();
  })

</script>

@endsection