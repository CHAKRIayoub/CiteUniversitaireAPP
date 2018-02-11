@extends('layouts.template')

@section('content')


<!-- __________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app" >

    <!-- ____________________ content Titre ________________________ -->    
    <div class="page-title">
        <div class="title_left">
            <h3>Dossier</h3> <br>
        </div>
    </div><br><br>
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <strong>{{ $message }}</strong> 
        </div>
        @endif

        <br>
    <div class="clearfix"></div>
    <br>

    <div class="row">
        <h1> Bonjour Cher Employée </h1>
        <hr>
    </div>




    <!-- ____________  chrgement ___________ -->
    <transition name="modal" v-if="chargement" >
        <div class="loading-mask">    
            <div class="loader"></div>  
        </div>
    </transition>
   
</div>

<!-- __________________________________JS_____________________________________________ -->

<!-- ____________  required files  ___________ -->
        
<script src="{{ asset("js/vue.js")}}"></script>

<!-- ____________  Vue Formulaire Instance   ___________ -->
<script type="text/javascript">
  
    new Vue({  
        el : '#app',
        data() {
            return{
                chargement: true
            }
        },
        methods: {
            
        },
        mounted: function () {    
            this.chargement = false;
            $('.row').addClass('animated fadeInUp');
        }
    })

</script>

@endsection