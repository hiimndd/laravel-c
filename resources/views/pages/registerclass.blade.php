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
  <link rel="stylesheet" href="{{asset('css/styledrop.css')}}">
</head>
<body>

<div class="container">

    
    <h2>ĐĂNG KÝ LỚP HỌC</h2>
    <a href="{{route('class.index')}}"><button type="button" class="btn btn-default" name="bttxt">Về Trang Chính</button></a> 
    
  <form action="{{route('classhome.store')}}" method="POST">
  @csrf
    <div class="form-group">
    
      <label for="hoten">Mã số sinh viên :</label>
      <input type="text" class="form-control" id="mssv"  value="" placeholder="Mã số sinh viên" name="mssv">
      @if($errors->has('mssv'))
        <div class="form-row">
        <div class="alert alert-danger">
          {{$errors->first('mssv')}}
        </div>
        </div>
      @endif 
    </div>

    <div class="form-group">
        <label for="classname">Tên lớp :</label>
        <div class="form-row">
        
        <select name="classname" class="form-control formselect required" placeholder="Select Category"
            id="sub_category_name">
            <option   value="0" disabled selected>Chọn lớp học</option>
                @foreach($class as $categories)
                    <option  value="{{ $categories->id }}">
                        {{ ucfirst($categories->classname) }}
                    </option>
                @endforeach
        </select>
        @if($errors->has('classname'))
        <div class="form-row">
        <div class="alert alert-danger">
          {{$errors->first('classname')}}
        </div>
        </div>
        @endif
        
        </div>
      
      </div>


    
    
          
    
    <button type="submit" class="btn btn-default" name="btn_insert">Đăng ký</button>
    

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
  @if(session('notificationer'))
    <div class="alert alert-danger">
      {{session('notificationer')}}
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




                                      
