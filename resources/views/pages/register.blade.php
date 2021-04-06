<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  
</head>
<body class="main-bg">
        <div class="login-container text-c animated flipInX">
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                </div>
                    <h3 class="text-whitesmoke">Sign In Template</h3>
                    <p class="text-whitesmoke">Đăng ký</p>
                <div class="container-content">
                    <form action = "{{route('postregister')}}" method = "POST"class="margin-t">
                    @csrf
                        <div class="form-group">
                            <input type="text" name = "username" class="form-control" placeholder="Tên người dùng" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name ="password" class="form-control" placeholder="Mật khẩu" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name ="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" required="">
                        </div>
                        </div>
                        <button type="submit" class="form-button button-l margin-b">Sign up</button>
                        <a class="text-darkyellow" href="{{route('login')}}"><small>về trang đăng nhập</small>
                    </form>
                    <p class="margin-t text-whitesmoke"><small> Your Name &copy; 2018</small> </p>
                </div>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors -> all() as $error)
                {{$error}}<br>
                @endforeach
            </div>
            @endif
</body>
</html>

