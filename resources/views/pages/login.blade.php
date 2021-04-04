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
                    <p class="text-whitesmoke">Đăng nhập</p>
                <div class="container-content">
                    <form action ="{{route('postlogin')}}" method ="POST" class="margin-t" >
                    @csrf
                        <div class="form-group">
                            <input type="text" name ="username" class="form-control" placeholder="Tên người dùng" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name ="password" class="form-control" placeholder="Mật khẩu" required="">
                        </div>
                        <button  type="submit" class="form-button button-l margin-b">Sign In</button>
        
                        <p class="text-whitesmoke text-center"><small>Muốn tạo tài khoản hok?</small></p>
                        <a class="text-darkyellow" href="{{route('register')}}"><small>Sign Up</small></a>
                    </form>
                    @if(session('notification'))
                        <div class="alert alert-success">
                        {{session('notification')}}
                        </div>
                    @endif
                    <p class="margin-t text-whitesmoke"><small> Your Name &copy; 2018</small> </p>
                </div>
            </div>
</body>
</html>

