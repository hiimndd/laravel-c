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
  



  <h2>Danh sách lớp</h2>
  
  
  
        

  
          
  <table class="table table-striped">
  <thead>
      <tr>
        <th>Mã lớp</th>
        <th>Tên lớp</th>
        <th>Số sinh viên </th>
        <th><th>
        <th><th>
      </tr>
    </thead>
  <tbody>
        


        @foreach($class as $row)
        <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->classname }}</td>
        <td>{{ count($row->Student) }}</td>
        <td>
        
        <form action="{{route('class.destroy',$row->id)}}" method="post">
          
        <a href = "{{ route('class.show', $row->id) }}"><button type="button" class="btn btn-primary">chi tiết</button><a> </a>
          <a href = "{{ route('class.edit', $row->id) }}"><button type="button" class="btn btn-primary">sửa</button><a> </a>
          @csrf
          @method('DELETE')
          <a onclick="return confirm('Bạn có chắc muốn xóa thông tin này')">
          <button type="submit" class="btn btn-primary">xóa</button></a>
        </form>
        </td>
        </tr>
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


