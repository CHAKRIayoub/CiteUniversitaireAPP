@extends('layouts.template')

@section('content')



<!-- __________________________________HTML_____________________________________________ -->

<!-- ____________________ content ________________________ -->


      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
            
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:700px;">
                <div class="x_title">
                  <a href="{{ route('chambres.index') }}" style="float: right" class="btn btn-info" > <i class="fa fa-arrow-left"> </i>  Precedent</a>
                  <h3><i class="fa fa-home"> </i> chambre N° :  {{ $chambre->id}}</h3>
                 
                  <div class="clearfix"></div>

                </div>

                  <div class="row">
                    

                       <!--  area : titre de Blace -->
                     <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-dot-circle-o"></i>
                        </div>
                        <div class="count"> {{ $chambre->Bloc['titre'] }}</div>
                        <br>
                        <h3>genre : {{ $chambre->Bloc['genre']  }}</h3>
                        <br>
                      </div>
                    </div>

                     <!--  area : Capacité chambre  -->
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-users"></i>
                        </div>
                        <div class="count">{{ $chambre->capacite  }}</div>
                        <br>
                        <h3>Capacité du chambre</h3>
                        <br>
                                              </div>
                    </div>

                  

                  <!--  area : place Occupé  -->
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-flag"></i>
                        </div>
                        <div class="count">{{ $hebergementsCount  }} </div>
                        <br>
                        <h3>Place occupé</h3>
                        <br>
                      </div>
                    </div>


                  <!--  area : place Disponible  -->
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-flag-o"></i>
                        </div>
                        <div class="count"> {{ $chambre->capacite - $hebergementsCount}} </div>
                        <br>
                        <h3>Place disponible</h3>
                        <br>
                      </div>
                    </div>
                  </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                  <h2>Liste des étudiants <small>dans cette chambre</small></h2>
                
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

                  

                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                       
                        <th class="column-title"><h4>CIN </h4></th>
                        <th class="column-title"><h4>Nom </h4> </th>
                        <th class="column-title"><h4>Prenom</h4></th>
                        <th class="column-title"><h4>Tele </h4></th>
                        <th class="column-title"><h4>Date naissance</h4></th>

                      </tr>
                    </thead>

                    <tbody>

                      @if( $hebergementsCount!=0 )
                    
                          @foreach ( $hebergs as $heberg )

                        <tr class="even pointer">
                          
                          <td class=" "> {{ $heberg->User->Dossier['cin'] }} </td>
                          <td class=" "> {{ $heberg->User->Dossier['nom'] }}  </td>
                          <td class=" ">{{ $heberg->User->Dossier['prenom'] }} </td>
                          <td class=" "><i class="success fa fa-phone"></i>
                            {{ $heberg->User->Dossier['telephone'] }} </td>
                                 
                          <td class=" ">{{ $heberg->User->Dossier['date_naissance'] }} </td>

                        </tr>

                          @endforeach

                      @endif

                   
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>

       
        <!-- /footer content -->

      </div>
<
<!-- __________________________________JS_____________________________________________ -->

<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/vue.js")}}"></script>
<script src="{{ asset("js/vee-validate.js")}}"></script>


<!-- ____________  Vue Form Instance  ___________ -->
<script type="text/javascript">

    Vue.use(VeeValidate);
    //v-validate="{ rules: { regex:  /.[0-9]{3,}$/} }"
  
    new Vue({    
        el : '#form',
        data : {
            id : '{{ $chambre->id }}',
            chargement : true
        },
        methods: {
            submitForm() {
                this.$validator.validateAll().then(res=>{
                    if(res) {
                        return true;
                    } else {
                        alert('veuillez remplire les champs nécessaire');
                        return false;
                    }
                })
            }
        },
        mounted: function () {
              this.chargement = false;
              $('.row').addClass('animated fadeInUp');

        }
    })
</script>

@endsection