<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Blog Website</title>
    <link href="{{asset('Backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('Backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('Backend/css/sb-admin.css')}}" rel="stylesheet">
    <style>
        /* Custom styles inspired by Sigurd Lewerentz */
        body {
            background-color: #f5f5f5;
        }
        .login-panel {
            margin-top: 50px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .panel-heading {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 24px;
        }
        .form-control {
            border-radius: 0;
        }
        .btn-success {
            background-color: #333;
            border: none;
            border-radius: 0;
        }
        .btn-success:hover {
            background-color: #222;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" required>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <button class="btn btn-block btn-success">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
