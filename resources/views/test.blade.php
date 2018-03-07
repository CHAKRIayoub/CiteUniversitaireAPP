<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


 
<br><hr>
 {!! Form::open(array('url'=>'upl','files'=>true,'class'=>'register-form')) !!}
 		{{ csrf_field() }}
        {!! Form::file('img') !!}
        <input type="submit" value="send">
        

{!! Form::close() !!}


</body>
</html>