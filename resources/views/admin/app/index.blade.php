@extends('layouts.template')
@section('content')
<!-- __________________________HTML____________________________ -->
<!-- ____________________ content ________________________ -->
<div class="right_col" role="main" id="app" >
  <!-- ____________________ content Titre ________________________ -->    
  <div class="page-title">
      <div style="float: left; font-size: medium; width: 100%">
          <ol class="breadcrumb" style="background-color: #eee"  >
            <li><a href="/home">
              <i class="fa fa-home"></i> Acceuil
            </a></li>
            <li class="active">
              <i class="fa fa-calendar"></i> Gestion des Dates d'inscription
            </li>
          </ol>
      </div>
  </div>
  <div class="clearfix"></div>
  <!-- ____________________ content body ________________________ -->
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
    <!-- ____________  errors ___________ -->
    @if (count($errors) < 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif 

    <div class="x_panel" style="height:600px;">
      <div class="x_title">
        <h3> <i class="fa fa-calendar"></i> Période d'inscription Actuelle</h3>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="col-md-6 col-md-offset-3"><center>
          <v-calendar :theme-styles='themeStyles' is-expanded
     v-show="!form" :attributes='attrs'></v-calendar><br><br>
          <button v-on:click="showEdit" v-show="!form" class="btn btn-primary">
            <i class="fa fa-pencil"></i> Modifier cette Période
          </button>
          <button v-on:click="showNew" v-show="!form" class="btn btn-success">
            <i class="fa fa-calendar-plus-o"></i> Nouvelle Période
          </button>

        </center></div><br>

       
        <!-- ____________  form ___________ -->
        <form v-show="form" id="form" class="form-horizontal form-label-left" method="POST" action="{{ route('app.update',0 ) }}">

          {{ method_field('PATCH') }} {{ csrf_field() }}

          <input style="display: none;" type="text" v-model="whatToDo"  name="todo">

          <!-- ____________  chrgement ___________ -->
          <transition name="modal" v-if="chargement" >
            <div class="loading-mask">
              <div class="loader"></div>      
            </div>
          </transition>

          <!-- ____________  form panel ___________ -->
          <table class="table">
            <thead>
              <th> Clé </th>
              <th> Valeur </th>
            </thead>
            <tbody>
              <tr>
                <td>Date de Début d'inscription :</td>
                <td> 
                  <input v-model="ddi" v-validate="'required|date_format:YYYY-MM-DD'" 
                      class="form-control" type="date" 
                      name="ddi" v-bind:class="{inputerror : errors.has('ddi')}"
                      v-bind:min="nn" v-bind:max="dfi">
                  <span v-show="errors.has('ddi')" >Veuillez fournir un Date Valide ?</span>
                </td>
              </tr>

              <tr>
                <td>Date de fin d'inscription :</td>
                <td>        
                  <input v-model="dfi" v-validate="'required|date_format:YYYY-MM-DD'"
                   class="form-control" type="date" 
                   v-bind:min="ddi"
                   v-bind:class="{inputerror : errors.has('dfi')}"
                  name="dfi" >
                  <span v-show="errors.has('dfi')" >Veuillez fournir un Date Valide ?
                            </span>
                </td>
              </tr>
            </tbody>
          </table>


          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" >
               <br>
                    <!--______________ form buttons _____________ -->
              <button v-show="add" :disabled="errors.any()"
v-on:click="submitForm" style="float: right;" type="submit" class="btn btn-success" >
                <i class="fa fa-calendar" ></i> &nbsp;Nouvelle Période d'inscription 
              </button>

              <button v-show="!add" :disabled="errors.any()"
v-on:click="submitForm" style="float: right;" type="submit" class="btn btn-success" >
                <i class="fa fa-calendar" ></i> &nbsp; Enregistrer 
              </button>

              <button
v-on:click.prevent="form=false;" style="float: right;" class="btn btn-deafault" >
                <i class="fa fa-arrow-left" ></i> &nbsp; Annuler 
              </button>



            </div>
          </div>          
        </form>
      </div>
    </div><br><br><br><br>
  </div>
  <!-- ____________  chrgement ___________ -->
  <transition name="modal" v-if="chargement" >
    <div class="loading-mask">    
      <div class="loader"></div>  
    </div>
  </transition>
</div>
<!-- ______________________JS____________________ -->
<!-- ____________  required files  ___________ -->
<script src="{{ asset("js/vue.js")}}"></script>
<script src="{{ asset("js/vee-validate.js")}}"></script>
<script src="{{ asset("js/v-calendar.min.js")}}"></script>

<!-- ____________  Vue Formulaire Instance   ___________ -->
<script type="text/javascript">
    Vue.use(VeeValidate);

    new Vue({  
        el : '#app',
        data() {
          return{
            whatToDo:'',
            form: false,
            add: false,
            dfi: '<?php echo $app->date_f ?>',
            ddi: '<?php echo $app->date_d ?>',
            nn: new Date().toISOString().split('T')[0],
            chargement: true,
            themeStyles: {
              wrapper: {
                background: '#fff',
                color: '#000',
                border: '0',
                borderRadius: '5px',
                boxShadow: '0 4px 8px 0 rgba(0, 0, 0, 0.14), 0 6px 20px 0 rgba(0, 0, 0, 0.13)'
              },
              header: {
                padding: `20px 15px`,
              },
              headerHorizontalDivider: {
                borderTop: 'solid rgba(0, 0, 0, 0.2) 1px',
                width: '93%',
              },
              weekdays: {
                color: '#6eded1', // New color
                fontWeight: '600', // And bolder font weight
                padding: `20px 15px 5px 15px`,
                fontSize: '1.9rem'
              },
              weeks: {
                padding: `0 15px 15px 15px`,
              },
              dayContent: {
                fontSize: '1.5rem'
              },
              dayCellNotInMonth: {
                opacity: 0,
              }
            },
            attrs: [
              {
                key:'today',
                dates: {
                  start: new Date("<?php echo $app->date_d ?>"),
                  end: new Date("<?php echo $app->date_f ?>")
                },
                highlight: {
                  backgroundColor: '#304ffe',
                  height:'2.8rem',
                },
                contentStyle: {
                  fontSize: '1.9rem',
                  color: '#fff'
                },
                popover: {
                  label: 'Période d\' inscription',
                }
              },
            ],
          }   
        },
        methods: {
          submitForm() {
                this.$validator.validateAll().then(res=>{
                    if(res) {

                        return true;
                    } else if (Date(this.dfi) <= Date(this.ddi) && Date(this.ddi) < Date()) {
                        alert('veuillez vérifié les dates');
                        return false;
                    }
                })
            },
            showNew(){
              this.form = true
              this.add = true
              this.whatToDo = 'new'

            },
            showEdit(){
              this.form = true
              this.add = false
              this.whatToDo = 'edit'

            }
            
        },
        mounted: function () {    
            this.chargement = false;
            $('.row').addClass('animated fadeInUp');
        }
    })
</script>

<style>
  @-webkit-keyframes scaleEnter-data-v-bc55024c{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@keyframes scaleEnter-data-v-bc55024c{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@-webkit-keyframes scaleLeave-data-v-bc55024c{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@keyframes scaleLeave-data-v-bc55024c{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@-webkit-keyframes slideRightScaleEnter-data-v-bc55024c{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideRightScaleEnter-data-v-bc55024c{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideRightTranslateEnter-data-v-bc55024c{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@keyframes slideRightTranslateEnter-data-v-bc55024c{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@-webkit-keyframes slideLeftScaleEnter-data-v-bc55024c{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideLeftScaleEnter-data-v-bc55024c{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideLeftTranslateEnter-data-v-bc55024c{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}@keyframes slideLeftTranslateEnter-data-v-bc55024c{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}.c-pane-container[data-v-bc55024c]{-ms-flex-negative:1;flex-shrink:1;display:-webkit-inline-box;display:-ms-inline-flexbox;display:inline-flex;font-family:BlinkMacSystemFont,-apple-system,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;font-weight:400;line-height:1.5;color:#393d46;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;box-sizing:border-box}.c-pane-container.is-expanded[data-v-bc55024c]{width:100%}.c-pane-container.is-vertical[data-v-bc55024c]{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.c-pane-container[data-v-bc55024c] *{box-sizing:inherit}.c-pane-container[data-v-bc55024c] :focus{outline:none}.c-pane-divider[data-v-bc55024c]{width:1px;border:1px inset;border-color:#fafafa}@-webkit-keyframes scaleEnter-data-v-2083cb72{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@-webkit-keyframes scaleLeave-data-v-2083cb72{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@-webkit-keyframes slideRightScaleEnter-data-v-2083cb72{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideRightTranslateEnter-data-v-2083cb72{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@-webkit-keyframes slideLeftScaleEnter-data-v-2083cb72{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideLeftTranslateEnter-data-v-2083cb72{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}@keyframes scaleEnter-data-v-2083cb72{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@keyframes scaleLeave-data-v-2083cb72{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@keyframes slideRightScaleEnter-data-v-2083cb72{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideRightTranslateEnter-data-v-2083cb72{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@keyframes slideLeftScaleEnter-data-v-2083cb72{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideLeftTranslateEnter-data-v-2083cb72{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}.c-pane[data-v-2083cb72]{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;-ms-flex-negative:1;flex-shrink:1;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch}.c-horizontal-divider[data-v-2083cb72]{-ms-flex-item-align:center;align-self:center}.c-header[data-v-2083cb72]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;padding:10px}.c-header .c-arrow-layout[data-v-2083cb72]{min-width:26px}.c-header .c-arrow-layout .c-arrow[data-v-2083cb72],.c-header .c-arrow-layout[data-v-2083cb72]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0;padding:0}.c-header .c-arrow-layout .c-arrow[data-v-2083cb72]{font-size:1.6rem;transition:fill-opacity .3s ease-in-out;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.c-header .c-arrow-layout .c-arrow[data-v-2083cb72]:hover{fill-opacity:.5}.c-header .c-title-layout[data-v-2083cb72]{display:-webkit-inline-box;display:-ms-inline-flexbox;display:inline-flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1}.c-header .c-title-layout .c-title-popover .c-title-anchor[data-v-2083cb72],.c-header .c-title-layout .c-title-popover[data-v-2083cb72]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:inherit;-ms-flex-pack:inherit;justify-content:inherit}.c-header .c-title-layout .c-title-popover .c-title-anchor .c-title[data-v-2083cb72]{font-weight:400;font-size:1.15rem;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;white-space:nowrap}.c-header .c-title-layout.align-left[data-v-2083cb72]{-webkit-box-ordinal-group:0;-ms-flex-order:-1;order:-1;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.c-header .c-title-layout.align-right[data-v-2083cb72]{-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.c-header .c-arrow.c-disabled[data-v-2083cb72]{cursor:not-allowed;pointer-events:none;opacity:.2}.c-weekdays[data-v-2083cb72]{display:-webkit-box;display:-ms-flexbox;display:flex;padding:0 5px;color:#9499a8;font-size:.9rem;font-weight:500}.c-weekday[data-v-2083cb72]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0;padding:0;-webkit-box-flex:1;-ms-flex:1;flex:1;cursor:default}.c-weeks[data-v-2083cb72]{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;padding:5px 5px 7px}.c-weeks-rows-wrapper[data-v-2083cb72]{position:relative}.c-weeks-rows[data-v-2083cb72]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;width:100%}.title-fade-enter-active[data-v-2083cb72],.title-fade-leave-active[data-v-2083cb72],.title-slide-down-enter-active[data-v-2083cb72],.title-slide-down-leave-active[data-v-2083cb72],.title-slide-left-enter-active[data-v-2083cb72],.title-slide-left-leave-active[data-v-2083cb72],.title-slide-right-enter-active[data-v-2083cb72],.title-slide-right-leave-active[data-v-2083cb72],.title-slide-up-enter-active[data-v-2083cb72],.title-slide-up-leave-active[data-v-2083cb72]{transition:all .25s ease-in-out}.title-fade-leave-active[data-v-2083cb72],.title-none-leave-active[data-v-2083cb72],.title-slide-down-leave-active[data-v-2083cb72],.title-slide-left-leave-active[data-v-2083cb72],.title-slide-right-leave-active[data-v-2083cb72],.title-slide-up-leave-active[data-v-2083cb72]{position:absolute}.title-none-enter-active[data-v-2083cb72],.title-none-leave-active[data-v-2083cb72]{transition-duration:0s}.title-slide-left-enter[data-v-2083cb72],.title-slide-right-leave-to[data-v-2083cb72]{opacity:0;-webkit-transform:translateX(25px);transform:translateX(25px)}.title-slide-left-leave-to[data-v-2083cb72],.title-slide-right-enter[data-v-2083cb72]{opacity:0;-webkit-transform:translateX(-25px);transform:translateX(-25px)}.title-slide-down-leave-to[data-v-2083cb72],.title-slide-up-enter[data-v-2083cb72]{opacity:0;-webkit-transform:translateY(20px);transform:translateY(20px)}.title-slide-down-enter[data-v-2083cb72],.title-slide-up-leave-to[data-v-2083cb72]{opacity:0;-webkit-transform:translateY(-20px);transform:translateY(-20px)}.weeks-fade-enter-active[data-v-2083cb72],.weeks-fade-leave-active[data-v-2083cb72],.weeks-slide-down-enter-active[data-v-2083cb72],.weeks-slide-down-leave-active[data-v-2083cb72],.weeks-slide-left-enter-active[data-v-2083cb72],.weeks-slide-left-leave-active[data-v-2083cb72],.weeks-slide-right-enter-active[data-v-2083cb72],.weeks-slide-right-leave-active[data-v-2083cb72],.weeks-slide-up-enter-active[data-v-2083cb72],.weeks-slide-up-leave-active[data-v-2083cb72]{transition:all .25s ease-in-out}.weeks-fade-leave-active[data-v-2083cb72],.weeks-none-leave-active[data-v-2083cb72],.weeks-slide-down-leave-active[data-v-2083cb72],.weeks-slide-left-leave-active[data-v-2083cb72],.weeks-slide-right-leave-active[data-v-2083cb72],.weeks-slide-up-leave-active[data-v-2083cb72]{position:absolute}.weeks-none-enter-active[data-v-2083cb72],.weeks-none-leave-active[data-v-2083cb72]{transition-duration:0s}.weeks-slide-left-enter[data-v-2083cb72],.weeks-slide-right-leave-to[data-v-2083cb72]{opacity:0;-webkit-transform:translateX(20px);transform:translateX(20px)}.weeks-slide-left-leave-to[data-v-2083cb72],.weeks-slide-right-enter[data-v-2083cb72]{opacity:0;-webkit-transform:translateX(-20px);transform:translateX(-20px)}.weeks-slide-down-leave-to[data-v-2083cb72],.weeks-slide-up-enter[data-v-2083cb72]{opacity:0;-webkit-transform:translateY(20px);transform:translateY(20px)}.weeks-slide-down-enter[data-v-2083cb72],.weeks-slide-up-leave-to[data-v-2083cb72]{opacity:0;-webkit-transform:translateY(-20px);transform:translateY(-20px)}.title-fade-enter[data-v-2083cb72],.title-fade-leave-to[data-v-2083cb72],.title-none-enter[data-v-2083cb72],.title-none-leave-to[data-v-2083cb72],.weeks-fade-enter[data-v-2083cb72],.weeks-fade-leave-to[data-v-2083cb72],.weeks-none-enter[data-v-2083cb72],.weeks-none-leave-to[data-v-2083cb72]{opacity:0}@-webkit-keyframes scaleEnter-data-v-1ad2436f{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@keyframes scaleEnter-data-v-1ad2436f{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@-webkit-keyframes scaleLeave-data-v-1ad2436f{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@keyframes scaleLeave-data-v-1ad2436f{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@-webkit-keyframes slideRightScaleEnter-data-v-1ad2436f{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideRightScaleEnter-data-v-1ad2436f{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideRightTranslateEnter-data-v-1ad2436f{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@keyframes slideRightTranslateEnter-data-v-1ad2436f{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@-webkit-keyframes slideLeftScaleEnter-data-v-1ad2436f{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideLeftScaleEnter-data-v-1ad2436f{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideLeftTranslateEnter-data-v-1ad2436f{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}@keyframes slideLeftTranslateEnter-data-v-1ad2436f{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}.popover-container[data-v-1ad2436f]{position:relative;outline:none}.popover-container.expanded[data-v-1ad2436f]{display:block}.popover-origin[data-v-1ad2436f]{position:absolute;-webkit-transform-origin:top center;transform-origin:top center;z-index:10;pointer-events:none}.popover-origin.direction-top[data-v-1ad2436f]{bottom:100%}.popover-origin.direction-bottom[data-v-1ad2436f]{top:100%}.popover-origin.direction-left[data-v-1ad2436f]{top:0;right:100%}.popover-origin.direction-right[data-v-1ad2436f]{top:0;left:100%}.popover-origin.direction-bottom.align-left[data-v-1ad2436f],.popover-origin.direction-top.align-left[data-v-1ad2436f]{left:0}.popover-origin.direction-bottom.align-center[data-v-1ad2436f],.popover-origin.direction-top.align-center[data-v-1ad2436f]{left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}.popover-origin.direction-bottom.align-right[data-v-1ad2436f],.popover-origin.direction-top.align-right[data-v-1ad2436f]{right:0}.popover-origin.direction-left.align-top[data-v-1ad2436f],.popover-origin.direction-right.align-top[data-v-1ad2436f]{top:0}.popover-origin.direction-left.align-middle[data-v-1ad2436f],.popover-origin.direction-right.align-middle[data-v-1ad2436f]{top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%)}.popover-origin.direction-left.align-bottom[data-v-1ad2436f],.popover-origin.direction-right.align-bottom[data-v-1ad2436f]{top:auto;bottom:0}.popover-origin .popover-content-wrapper[data-v-1ad2436f]{position:relative;outline:none}.popover-origin .popover-content-wrapper.interactive[data-v-1ad2436f]{pointer-events:all}.popover-origin .popover-content-wrapper .popover-content[data-v-1ad2436f]{position:relative;background-color:#fafafa;border:1px solid rgba(34,36,38,.15);border-radius:5px;box-shadow:0 1px 2px 0 rgba(34,36,38,.15);padding:4px}.popover-origin .popover-content-wrapper .popover-content[data-v-1ad2436f]:after{display:block;position:absolute;background:inherit;border:inherit;border-width:1px 1px 0 0;width:12px;height:12px;content:""}.popover-origin .popover-content-wrapper .popover-content.direction-bottom[data-v-1ad2436f]:after{top:0;border-width:1px 1px 0 0}.popover-origin .popover-content-wrapper .popover-content.direction-top[data-v-1ad2436f]:after{top:100%;border-width:0 0 1px 1px}.popover-origin .popover-content-wrapper .popover-content.direction-left[data-v-1ad2436f]:after{left:100%;border-width:0 1px 1px 0}.popover-origin .popover-content-wrapper .popover-content.direction-right[data-v-1ad2436f]:after{left:0;border-width:1px 0 0 1px}.popover-origin .popover-content-wrapper .popover-content.align-left[data-v-1ad2436f]:after{left:20px;-webkit-transform:translateY(-50%) translateX(-50%) rotate(-45deg);transform:translateY(-50%) translateX(-50%) rotate(-45deg)}.popover-origin .popover-content-wrapper .popover-content.align-right[data-v-1ad2436f]:after{right:20px;-webkit-transform:translateY(-50%) translateX(50%) rotate(-45deg);transform:translateY(-50%) translateX(50%) rotate(-45deg)}.popover-origin .popover-content-wrapper .popover-content.align-center[data-v-1ad2436f]:after{left:50%;-webkit-transform:translateY(-50%) translateX(-50%) rotate(-45deg);transform:translateY(-50%) translateX(-50%) rotate(-45deg)}.popover-origin .popover-content-wrapper .popover-content.align-top[data-v-1ad2436f]:after{top:18px;-webkit-transform:translateY(-50%) translateX(-50%) rotate(-45deg);transform:translateY(-50%) translateX(-50%) rotate(-45deg)}.popover-origin .popover-content-wrapper .popover-content.align-middle[data-v-1ad2436f]:after{top:50%;-webkit-transform:translateY(-50%) translateX(-50%) rotate(-45deg);transform:translateY(-50%) translateX(-50%) rotate(-45deg)}.popover-origin .popover-content-wrapper .popover-content.align-bottom[data-v-1ad2436f]:after{bottom:18px;-webkit-transform:translateY(50%) translateX(-50%) rotate(-45deg);transform:translateY(50%) translateX(-50%) rotate(-45deg)}.fade-enter-active[data-v-1ad2436f],.fade-leave-active[data-v-1ad2436f],.slide-fade-enter-active[data-v-1ad2436f],.slide-fade-leave-active[data-v-1ad2436f]{transition:all .14s ease-in-out}.fade-enter[data-v-1ad2436f],.fade-leave-to[data-v-1ad2436f],.slide-fade-enter[data-v-1ad2436f],.slide-fade-leave-to[data-v-1ad2436f]{opacity:0}.slide-fade-enter.direction-bottom[data-v-1ad2436f],.slide-fade-leave-to.direction-bottom[data-v-1ad2436f]{-webkit-transform:translateY(-15px);transform:translateY(-15px)}.slide-fade-enter.direction-top[data-v-1ad2436f],.slide-fade-leave-to.direction-top[data-v-1ad2436f]{-webkit-transform:translateY(15px);transform:translateY(15px)}.slide-fade-enter.direction-left[data-v-1ad2436f],.slide-fade-leave-to.direction-left[data-v-1ad2436f]{-webkit-transform:translateX(15px);transform:translateX(15px)}.slide-fade-enter.direction-right[data-v-1ad2436f],.slide-fade-leave-to.direction-right[data-v-1ad2436f]{-webkit-transform:translateX(-15px);transform:translateX(-15px)}.c-week[data-v-28896542]{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;display:-webkit-box;display:-ms-flexbox;display:flex}@-webkit-keyframes scaleEnter-data-v-3db80f80{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@-webkit-keyframes scaleLeave-data-v-3db80f80{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@-webkit-keyframes slideRightScaleEnter-data-v-3db80f80{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideRightTranslateEnter-data-v-3db80f80{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@-webkit-keyframes slideLeftScaleEnter-data-v-3db80f80{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideLeftTranslateEnter-data-v-3db80f80{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}@keyframes scaleEnter-data-v-3db80f80{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@keyframes scaleLeave-data-v-3db80f80{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@keyframes slideRightScaleEnter-data-v-3db80f80{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideRightTranslateEnter-data-v-3db80f80{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@keyframes slideLeftScaleEnter-data-v-3db80f80{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideLeftTranslateEnter-data-v-3db80f80{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}.c-day-popover[data-v-3db80f80]{-webkit-box-flex:1;-ms-flex:1;flex:1}.c-day[data-v-3db80f80]{position:relative;min-height:28px;z-index:1}.c-day-layer[data-v-3db80f80]{position:absolute;left:0;right:0;top:0;bottom:0;pointer-events:none}.c-day-box-center-center[data-v-3db80f80]{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-transform-origin:50% 50%;transform-origin:50% 50%}.c-day-box-center-center[data-v-3db80f80],.c-day-box-left-center[data-v-3db80f80]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0;padding:0;height:100%}.c-day-box-left-center[data-v-3db80f80]{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;-webkit-transform-origin:0 50%;transform-origin:0 50%}.c-day-box-right-center[data-v-3db80f80]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0;padding:0;height:100%;-webkit-transform-origin:100% 50%;transform-origin:100% 50%}.c-day-box-center-bottom[data-v-3db80f80]{-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;margin:0;padding:0}.c-day-box-center-bottom[data-v-3db80f80],.c-day-content-wrapper[data-v-3db80f80]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.c-day-content-wrapper[data-v-3db80f80]{-webkit-box-align:center;-ms-flex-align:center;align-items:center;pointer-events:all;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default}.c-day-content[data-v-3db80f80]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:1.8rem;height:1.8rem;font-size:.9rem;font-weight:400;line-height:1;border-radius:50%;transition:all .18s ease-in-out;margin:.1rem .08rem}.c-day-backgrounds[data-v-3db80f80]{overflow:hidden;pointer-events:none;z-index:-1;-webkit-backface-visibility:hidden;backface-visibility:hidden}.c-day-background[data-v-3db80f80]{transition:height .13s ease-in-out,background-color .13s ease-in-out}.shift-left[data-v-3db80f80]{margin-left:-1px}.shift-right[data-v-3db80f80]{margin-right:-1px}.shift-left-right[data-v-3db80f80]{margin:0 -1px}.c-day-dots[data-v-3db80f80]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0;padding:0}.c-day-dot[data-v-3db80f80]{width:5px;height:5px;border-radius:50%;background-color:#66b3cc;transition:all .18s ease-in-out}.c-day-dot[data-v-3db80f80]:not(:last-child){margin-right:3px}.c-day-bars[data-v-3db80f80]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0;padding:0;width:75%}.c-day-bar[data-v-3db80f80]{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;height:3px;background-color:#66b3cc;transition:all .18s ease-in-out}.c-day-popover-content[data-v-3db80f80]{font-size:.8rem;font-weight:400}.background-enter-active.c-day-fade-enter[data-v-3db80f80]{transition:opacity .2s ease-in-out}.background-enter-active.c-day-slide-right-scale-enter[data-v-3db80f80]{-webkit-animation:slideRightScaleEnter-data-v-3db80f80 .16s ease-in-out;animation:slideRightScaleEnter-data-v-3db80f80 .16s ease-in-out}.background-enter-active.c-day-slide-right-translate-enter[data-v-3db80f80]{-webkit-animation:slideRightTranslateEnter-data-v-3db80f80 .16s ease-in-out;animation:slideRightTranslateEnter-data-v-3db80f80 .16s ease-in-out}.background-enter-active.c-day-slide-left-scale-enter[data-v-3db80f80]{-webkit-animation:slideLeftScaleEnter-data-v-3db80f80 .16s ease-in-out;animation:slideLeftScaleEnter-data-v-3db80f80 .16s ease-in-out}.background-enter-active.c-day-slide-left-translate-enter[data-v-3db80f80]{-webkit-animation:slideLeftTranslateEnter-data-v-3db80f80 .16s ease-in-out;animation:slideLeftTranslateEnter-data-v-3db80f80 .16s ease-in-out}.background-enter-active.c-day-scale-enter[data-v-3db80f80]{-webkit-animation:scaleEnter-data-v-3db80f80 .16s ease-in-out;animation:scaleEnter-data-v-3db80f80 .16s ease-in-out}.background-leave-active.c-day-fade-leave[data-v-3db80f80]{transition:opacity .2s ease-in-out}.background-leave-active.c-day-scale-leave[data-v-3db80f80]{-webkit-animation:scaleLeave-data-v-3db80f80 .2s ease-in-out;animation:scaleLeave-data-v-3db80f80 .2s ease-in-out}.background-enter.c-day-fade-enter[data-v-3db80f80],.background-leave-to.c-day-fade-leave[data-v-3db80f80]{opacity:0}@-webkit-keyframes scaleEnter-data-v-54b1f93b{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@keyframes scaleEnter-data-v-54b1f93b{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@-webkit-keyframes scaleLeave-data-v-54b1f93b{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@keyframes scaleLeave-data-v-54b1f93b{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@-webkit-keyframes slideRightScaleEnter-data-v-54b1f93b{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideRightScaleEnter-data-v-54b1f93b{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideRightTranslateEnter-data-v-54b1f93b{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@keyframes slideRightTranslateEnter-data-v-54b1f93b{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@-webkit-keyframes slideLeftScaleEnter-data-v-54b1f93b{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideLeftScaleEnter-data-v-54b1f93b{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideLeftTranslateEnter-data-v-54b1f93b{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}@keyframes slideLeftTranslateEnter-data-v-54b1f93b{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}.c-day-popover-row[data-v-54b1f93b]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:2px 5px;transition:all .18s ease-in-out}.c-day-popover-row.selectable[data-v-54b1f93b]{cursor:pointer}.c-day-popover-row.selectable[data-v-54b1f93b]:hover{background-color:rgba(0,0,0,.1)}.c-day-popover-row[data-v-54b1f93b]:not(:first-child){margin-top:3px}.c-day-popover-row .c-day-popover-indicator[data-v-54b1f93b]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-flex:0;-ms-flex-positive:0;flex-grow:0;width:15px;margin-right:3px}.c-day-popover-row .c-day-popover-indicator span[data-v-54b1f93b]{transition:all .18s ease-in-out}.c-day-popover-row .c-day-popover-content[data-v-54b1f93b]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-ms-flex-wrap:none;flex-wrap:none;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;transition:all .18s ease-in-out}@-webkit-keyframes scaleEnter-data-v-81948efe{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@-webkit-keyframes scaleLeave-data-v-81948efe{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@-webkit-keyframes slideRightScaleEnter-data-v-81948efe{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideRightTranslateEnter-data-v-81948efe{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@-webkit-keyframes slideLeftScaleEnter-data-v-81948efe{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@-webkit-keyframes slideLeftTranslateEnter-data-v-81948efe{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}@keyframes scaleEnter-data-v-81948efe{0%{-webkit-transform:scaleX(.7) scaleY(.7);transform:scaleX(.7) scaleY(.7);opacity:.3}90%{-webkit-transform:scaleX(1.1) scaleY(1.1);transform:scaleX(1.1) scaleY(1.1)}95%{-webkit-transform:scaleX(.95) scaleY(.95);transform:scaleX(.95) scaleY(.95)}to{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1);opacity:1}}@keyframes scaleLeave-data-v-81948efe{0%{-webkit-transform:scaleX(1) scaleY(1);transform:scaleX(1) scaleY(1)}60%{-webkit-transform:scaleX(1.18) scaleY(1.18);transform:scaleX(1.18) scaleY(1.18);opacity:.2}to{-webkit-transform:scaleX(1.15) scaleY(1.18);transform:scaleX(1.15) scaleY(1.18);opacity:0}}@keyframes slideRightScaleEnter-data-v-81948efe{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideRightTranslateEnter-data-v-81948efe{0%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}60%{-webkit-transform:translateX(2px);transform:translateX(2px)}}@keyframes slideLeftScaleEnter-data-v-81948efe{0%{-webkit-transform:scaleX(0);transform:scaleX(0)}60%{-webkit-transform:scaleX(1.08);transform:scaleX(1.08)}}@keyframes slideLeftTranslateEnter-data-v-81948efe{0%{-webkit-transform:translateX(6px);transform:translateX(6px)}60%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}}.c-nav[data-v-81948efe]{transition:height 5s ease-in-out;color:#333}.c-header[data-v-81948efe]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-webkit-box-align:center;-ms-flex-align:center;align-items:center;border-bottom:1px solid #dadada;padding:3px 0}.c-arrow-layout[data-v-81948efe]{min-width:26px}.c-arrow-layout[data-v-81948efe],.c-arrow[data-v-81948efe]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0;padding:0}.c-arrow[data-v-81948efe]{font-size:1.6rem;transition:fill-opacity .3s ease-in-out;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.c-arrow[data-v-81948efe]:hover{fill-opacity:.5}.c-title[data-v-81948efe]{font-weight:500;transition:all .25s ease-in-out}.c-table-cell[data-v-81948efe],.c-title[data-v-81948efe]{font-size:.9rem;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.c-table-cell[data-v-81948efe]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%;position:relative;font-weight:400;background-color:#fff;transition:all .1s ease-in-out}.c-table-cell[data-v-81948efe]:hover{background-color:#f0f0f0}.c-disabled[data-v-81948efe]{opacity:.2;cursor:not-allowed;pointer-events:none}.c-disabled[data-v-81948efe]:hover{background-color:transparent}.c-active[data-v-81948efe]{background-color:#f0f0f0;font-weight:600}.c-indicators[data-v-81948efe]{position:absolute;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;bottom:5px;width:100%;transition:all .1s ease-in-out}.c-indicators .c-indicator[data-v-81948efe]{width:5px;height:5px;border-radius:50%}.c-indicators .c-indicator[data-v-81948efe]:not(:first-child){margin-left:3px}.c-table[data-v-81948efe]{table-layout:fixed;width:100%;border-collapse:collapse}.c-table tr td[data-v-81948efe]{border:1px solid #dadada;width:60px;height:34px}.c-table tr td[data-v-81948efe]:first-child{border-left:0}.c-table tr td[data-v-81948efe]:last-child{border-right:0}.c-table tr:first-child td[data-v-81948efe]{border-top:0}.c-table tr:last-child td[data-v-81948efe]{border-bottom:0}.indicators-enter-active[data-v-81948efe],.indicators-leave-active[data-v-81948efe]{transition:all .1s ease-in-out}.indicators-enter[data-v-81948efe],.indicators-leave-to[data-v-81948efe]{opacity:0}.svg-icon[data-v-12e91ab4]{display:inline-block;stroke:currentColor;stroke-width:0}.svg-icon path[data-v-12e91ab4]{fill:currentColor}.date-label[data-v-6c331e62]{text-align:center}.days-nights[data-v-6c331e62]{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;margin-top:3px}.days-nights .days[data-v-6c331e62],.days-nights .nights[data-v-6c331e62],.days-nights[data-v-6c331e62]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.days-nights .days[data-v-6c331e62],.days-nights .nights[data-v-6c331e62]{font-weight:700}.days-nights .days[data-v-6c331e62]:not(:first-child),.days-nights .nights[data-v-6c331e62]:not(:first-child){margin-left:13px}.days-nights .vc-moon-o[data-v-6c331e62],.days-nights .vc-sun-o[data-v-6c331e62]{margin-right:5px;width:16px;height:16px}.days-nights .vc-sun-o[data-v-6c331e62]{color:#ffb366}.days-nights .vc-moon-o[data-v-6c331e62]{color:#4d4d64}
</style>
@endsection