<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Media Library</title>

    <!--Boostrap 4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Boostrap-select.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Material Icons Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Ico -->
    <link rel="icon" type="image/ico" href="{{ asset('png/favicon.png') }}" />

    <!-- EveryAngle Custom Colors -->
    <link rel="stylesheet" type="text/css" href="/css/everyangle.css"/>

    <!-- JQuery 3.5.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 @yield('head')
</head>


<body class="bc">
    <div id="app">
        <nav class="navbar navbar-light navbar-expand-lg text-white navc">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img class="img-responsive" src="{{ asset('images/everyangle_logo_white.png') }}" alt="{{ config('app.name', 'Media Library') }}">
                </a>
                <div class="navbar-nav flex-grow-0">
                    <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>    
                <div class="collapse navbar-collapse justify-content-end" id="nav">
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item navbar-text">
                            <a class="nav-link text-white" href="{{ url('/') }}">Inicio</a>
                        </li>                           
                        <li class="nav-item navbar-text">
                            <a class="nav-link text-white" href="route('items.index')">Items</a>
                        </li>
                        <li class="nav-item navbar-text">
                            <a class="nav-link text-white" href="route('categories.index')">Categories</a>
                        </li>
                        <li class="nav-item navbar-text">
                            <a class="nav-link text-white" href="route('mediafiles.index')">Media Files</a>
                        </li>
                        <li class="nav-item navbar-text">
                            <a class="nav-link text-white" href="route('users.index')">Users</a>
                        </li>                        
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
	 @yield('script')
</body>
</html>
