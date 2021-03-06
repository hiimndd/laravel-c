@extends('layouts.classmaster')
@section('classmaster')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    
    <h2>THÊM LỚP</h2>
    <a href="{{route('class.index')}}"><button type="button" class="btn btn-default" name="bttxt">Về Trang Chính</button></a> 
    
  <form action="{{route('class.store')}}" method="POST">
  @csrf
    <div class="form-group">
    
      <label for="hoten">Tên lớp :</label>
      
      <input type="text" class="form-control" id="classname"  value="" placeholder="Tên lớp" name="classname">
      @if($errors->has('classname'))
        <div class="form-row">
        <div class="alert alert-danger">
          {{$errors->first('classname')}}
        </div>
        </div>
      @endif 
    </div>
    
    
    <button type="submit" class="btn btn-default" name="btn_insert">Thêm Lớp</button>
    

  </form>
  
  <!-- @if(count($errors) > 0)
      <div class="alert alert-danger">
        @foreach($errors -> all() as $error)
          {{$error}}<br>
        @endforeach
      </div>
  @endif -->
  @if(session('notification'))
    <div class="alert alert-success">
      {{session('notification')}}
    </div>
  @endif
</div>

    
</body>
<script>

$(document).click(function(event) {
  if(
    $('.toggle > input').is(':checked') &&
    !$(event.target).parents('.toggle').is('.toggle')
  ) {
    $('.toggle > input').prop('checked', false);
  }
})
</script>
</html>
@endsection




                                      
