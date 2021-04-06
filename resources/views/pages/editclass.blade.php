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
    <h2>sửa thông tin Lớp</h2>
    
  <form action="{{route('class.update',$class['id'])}}" method="post">
  @method('put')
  @csrf
    <div class="form-group">
    
      <label for="malop">Mã lớp :</label>
      <input type="text" class="form-control" value="{{ $class['id'] }}" id="malop" placeholder="mã lớp" name="malop" disabled>
    </div>
    <div class="form-group">
        <label for="tenlop">Tên lớp :</label>
        <input type="text" class="form-control" id="classname" value="{{ $class['classname'] }}" placeholder="Tên lớp" name="classname">
      </div>
      
    <button type="submit" class="btn btn-default" name="btn_update">Lưu</button>
    <a href = "{{ route('class.index') }}"><button type="button" class="btn btn-primary">Hủy</button><a> </a>
    </form>
    
    @if(count($errors) > 0)
      <div class="alert alert-danger">
        @foreach($errors -> all() as $error)
          {{$error}}<br>
        @endforeach
      </div>
    @endif
    
    
  @if(session('notification'))
    <div class="alert alert-success">
      {{session('notification')}}
    </div>
  @endif
  @endsection