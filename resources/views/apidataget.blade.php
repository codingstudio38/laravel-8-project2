<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <style>
        a {
            text-decoration: none !important;
        }

        .w-5 {
            width: 25px;
        }

        .h-5 {
            width: 25px;
        }

        .cursor-default {
            color: rgb(0, 0, 0);
        }


        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }


        #all_inputs input,
        select {
            padding: 5px;
            margin: 5px;
            text-align: center;
        }

    </style>
    <x-header comName="api" />
    <div class="container">
        <br>
        <br>
        <br>
        <h1>API RESPONSE</h1>
        @if (session()->has('response'))
            @php
                print_r(session()->get('response'));
            @endphp
        @endif
        <h1>API REGISTER</h1>

        <form action="apiregister" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <input name="name" type="text" class="form-control" placeholder="First name" required>
            </div>
            <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="First email" required>
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SEND" name="UPLOAD" style="width: 100%;">
            </div>
        </form>

        <h1>API LOGIN</h1>
        @php
            print_r(session('api_response'));
        @endphp
        <form action="apilogin" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="First email" required>
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SEND" name="UPLOAD" style="width: 100%;">
            </div>
        </form>
        <h1>GET API DATA</h1>
        <form action="getapidata" method="GET" autocomplete="off">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SEND" style="width: 100%;">
            </div>
        </form>
        <h1>LOGOUT API </h1>
        <form action="logpotapidata" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SEND" style="width: 100%;">
            </div>
        </form>
    </div>
    <br> <br> <br> <br>


</body>

</html>
