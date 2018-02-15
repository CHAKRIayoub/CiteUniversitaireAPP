@extends('layouts.template')

@section('content')

<!-- __________________________________ HTML _____________________________________________ -->

<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app"> 
  
    <!-- ____________ content titre ___________ -->
    <div class="page-title">
        <div class="title_left">
            <h3 style="color: red" >Période d'inscription</h3> 
        </div>
    </div>

   

    <div class="clearfix"></div>        

    <!-- ____________ content body ___________ -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2" >
        <img src="{{ asset("images/error.jpg") }}" width="100%" >
      </div>
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


<!-- ____________  Vue Script (loading..., delete modal)  ___________ -->
<script>
   
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


@endsection