
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
.loading-mask,.modal-mask{position:fixed;z-index:9998;top:57px;left: 240px;;width:100%;height:100%;transition:opacity .3s ease}*{box-sizing:border-box}.modal-mask{background-color:rgba(0,0,0,.5)}.loading-mask{background-color:#f7f7f7}.modal-container{width:350px;margin:40px auto 0;padding:20px 30px;background-color:#fff;border-radius:2px;box-shadow:0 2px 8px rgba(0,0,0,.33);transition:all .3s ease;font-family:Helvetica,Arial,sans-serif}.modal-header h3{margin-top:0;color:#42b983}.modal-body{margin:20px 0}.text-right{text-align:right}.form-label{display:block;margin-bottom:1em}.form-label>.form-control{margin-top:.5em}.form-control{display:block;width:100%;padding:.5em 1em;line-height:1.5;border:1px solid #ddd}.modal-enter,.modal-leave-active{opacity:0}.modal-enter .modal-container,.modal-leave-active .modal-container{-webkit-transform:scale(1.1);transform:scale(1.1)}.loader{position:absolute;left:40%;top:40%;z-index:1;margin:-75px 0 0 -75px;border:16px solid #fff;border-radius:50%;border-top:16px solid #3498db;width:120px;height:120px;-webkit-animation:spin .6s linear infinite;animation:spin .6s linear infinite}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}} body{ font-family:calibri light;}
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
