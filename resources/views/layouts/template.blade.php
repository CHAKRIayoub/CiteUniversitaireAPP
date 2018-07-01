
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cité Universitaire</title>

  <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("css/animate.min.css")}}" rel="stylesheet" type="text/css" />
  <!-- Custom styling plus plugins -->
  <link href="{{ asset("css/custom.css")}}" rel="stylesheet">
  <link href="{{ asset("css/green.css")}}" rel="stylesheet">
  
  <script src="{{ asset("js/jquery.min.js")}}"></script>


<style>  
.loading-mask,.modal-mask{position:fixed;z-index:9998;top:57px;left: 230px;;width:100%;height:100%;transition:opacity .3s ease}*{box-sizing:border-box}.modal-mask{background-color:rgba(0,0,0,.5)}.loading-mask{background-color:#f7f7f7}.modal-container{width:350px;margin:150px 40% 60% 27%;padding:20px 30px;background-color:#fff;border-radius:2px;box-shadow:0 2px 8px rgba(0,0,0,.33);transition:all .3s ease}.modal-header h3{margin-top:0;color:#42b983}.modal-body{margin:20px 0}.text-right{text-align:right}.form-label{display:block;margin-bottom:1em}.form-label>.form-control{margin-top:.5em}.form-control{display:block;width:100%;padding:.5em 1em;line-height:1.5;border:1px solid #ddd}.modal-enter,.modal-leave-active{opacity:0}.modal-enter .modal-container,.modal-leave-active .modal-container{-webkit-transform:scale(1.1);transform:scale(1.1)}.loader{position:absolute;left:40%;top:40%;z-index:1;margin:-75px 0 0 -75px;border:16px solid #fff;border-radius:50%;border-top:16px solid #3498db;width:120px;height:120px;-webkit-animation:spin .6s linear infinite;animation:spin .6s linear infinite}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}} body{font-family:calibri light;}tr td a{font-size:16px;}tr th{cursor:pointer;background-color:#2a3f54; color:white;font-size:larger;font-weight:unset;}.drpdn ul{font-size: 15px;}.drpdn button{width: 150px;}tr th:hover{background-color: #4c5f76;}.nav-tabs{ border-bottom: 2px solid #DDD;}.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }.nav-tabs > li > a { border: none; color: #666; }.nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }.nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }.tab-pane { padding: 15px 0; } .inputerror { box-shadow : 0px 0px 3px 1px red; } form div div div span {  font-size: 11px; color: red; float: none;" }
</style>

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

     @include('layouts.sidebar') 

      <!-- top navigation -->
      
      @include('layouts.header') 
      
      <!-- /top navigation -->

      <!-- page content -->

      @yield('content')

      <!-- /page content -->
    </div>

  </div>
 
  <script src="{{ asset("js/bootstrap.min.js")}}"></script>
  <script src="{{ asset("js/progressbar/bootstrap-progressbar.min.js")}}"></script>
  <script src="{{ asset("js/nicescroll/jquery.nicescroll.min.js")}}"></script>
  <script src="{{ asset("js/icheck/icheck.min.js")}}"></script>
  <script src="{{ asset("js/custom.js")}}"></script>
  <script src="{{ asset("js/pace/pace.min.js")}}"></script>

</body>

</html>
