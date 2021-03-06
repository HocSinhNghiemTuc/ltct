<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!------ Include the above in your HEAD tag ---------->
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 370px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 2px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
</head>
<body>
<div id="editAcc">
    <h3 class="text-center text-white pt-5">Edit your Account </h3>
    <div class="container">
        @if(session()->has('FailUpdate'))
            <div class="alert alert-success">
                {{ session()->get('FailUpdate') }}
            </div>
        @endif
            @if(session()->has('Success'))
                <div class="alert alert-success">
                    {{ session()->get('Success') }}
                </div>
            @endif
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form action="{{ route('updateAcc', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   placeholder="Nhập tên"
                                   value="{{ $user->name }}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"
                                   class="form-control"
                                   name="email"
                                   placeholder="Nhập username"
                                   value="{{ $user->email }}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password"
                                   class="form-control"
                                   name="password"
                                   placeholder="Nhập password"

                            >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                    <br>
                    <a href="/"> <button type="submit" class="btn btn-primary">Back to Home</button> </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>


