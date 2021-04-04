@extends('layouts.master')
@section('noidung')
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

    
    <h2>THÊM SINH VIÊN</h2>
    <a href="{{route('home.index')}}"><button type="button" class="btn btn-default" name="bttxt">Về Trang Chính</button></a> 
    
  <form action="{{route('home.store')}}" method="POST">
  @csrf
    <div class="form-group">
    
      <label for="hoten">Họ Tên :</label>
      
      <input type="text" class="form-control" id="hoten"  value="" placeholder="Họ tên sinh viên" name="hoten">
      @if($errors->has('hoten'))
        <div class="form-row">
        <div class="alert alert-danger">
          {{$errors->first('hoten')}}
        </div>
        </div>
      @endif 
    </div>
    
    <div class="form-group">
        <label for="mssv">Mã số sinh viên :</label>
        <input type="text" class="form-control" id="mssv" value="" placeholder="mã số sinh viên" name="mssv">
        @if($errors->has('mssv'))
        <div class="form-row">
        <div class="alert alert-danger">
          {{$errors->first('mssv')}}
        </div>
        </div>
      @endif
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh" value="" name="ngaysinh">
        @if($errors->has('ngaysinh'))
        <div class="form-row">
        <div class="alert alert-danger">
          {{$errors->first('ngaysinh')}}
        </div>
        </div>
      @endif
      </div>
    <button type="submit" class="btn btn-default" name="btn_insert">Thêm sinh viên</button>
    

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
</html>
@endsection




                                      
