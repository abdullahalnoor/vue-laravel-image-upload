<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Laravel</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>
    <div id="app">
        <nav class="nav justify-content-center|justify-content-end">

            <router-link to="/" class="nav-link">Add Image</router-link>
            <router-link to="/product" class="nav-link">Add Product</router-link>
        </nav>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/app.js')}}"></script>

</body>

</html>