@extends('layouts.classmaster')
@section('classmaster')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" >

</head>
<body>

<div class="container">
        
  <h2>Danh sách lớp đã đăng ký của sinh viên @foreach($sv as $row)
          {{$row->hoten}}
        @endforeach </h2>
  
  
        <a href="{{route('class.index')}}"><button type="button" class="btn btn-default" name="bttxt">Về Trang Chính</button></a>
        

  
          
  <table class="table table-striped">
  <thead>
      <tr>
      <th>ID lớp</th>
        <th>Tên lớp</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
  <tbody>
        


        @foreach($sv as $row)
        
            @foreach($row->Classmodel as $row)
        <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->classname }}</td>
        
        
        </tr>
        
            @endforeach
        @endforeach
        
        
        
    </tbody>
  </table>
  @if(session('notification'))
    <div class="alert alert-success">
      {{session('notification')}}
    </div>
  @endif
  
</div>

</body>
</html>

@endsection


