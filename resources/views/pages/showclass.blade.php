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
        
  <h2>Danh sách lớp @foreach($class as $row)
          {{$row->classname}}
        @endforeach </h2>
  
  
        <a href="{{route('class.index')}}"><button type="button" class="btn btn-default" name="bttxt">Về Trang Chính</button></a>
        

  
          
  <table class="table table-striped">
  <thead>
      <tr>
      <th>Họ tên</th>
        <th>Mã số sinh viên</th>
        <th>Ngày sinh</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
  <tbody>
        


        @foreach($class as $row)
        {{ $malop = $row->id }}
            @foreach($row->Student as $row)
        <tr>
        <td>{{ $row->hoten }}</td>
        <td>{{ $row->mssv }}</td>
        <td>{{ $row->ngaysinh }}</td>
        
        <td>
        
        <form action="../cancel/{$row['id']}/{$malop}" method="GET">
          <a href = "{{ route('classhome.edit', $row['id']) }}"><button type="button" class="btn btn-primary">sửa</button><a> </a>
          @csrf
          <a onclick="return confirm('Bạn có chắc muốn xóa thông tin này')">
          <button type="submit" class="btn btn-primary">xóa</button></a>
        </form>
        </td>
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


