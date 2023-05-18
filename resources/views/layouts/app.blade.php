<html>

<head>
    <title> @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('headStack')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @bukStyles
</head>

<body>
    {{-- Menu Desktop --}}
    <header class="nav-menu">
        <div class="container-menu">

            <!-- Navbar items -->
            <div class="nav-links">
                <div class="logo-menu">
                        <img src="http://localhost:8000/assets/img/logo-fondo-transparente.png" width="20%" alt="logo">
                </div>

                <a href=''>Inicio</a>
                <a href={{ route('destinos.index') }}>Destinos</a>
                <a href={{ route('capacidad.index') }}>Capacidades</a>
                {{-- <button class="loginBtn">Login</button> --}}
            
            </div>

        </div>

        {{-- Menu Responsive --}}
    <div class="menu-responsive">

        <div class="logo-menu-responsive">
            <img src="http://localhost:8000/assets/img/logo-fondo-transparente.png" width="20%" alt="logo">
        </div>

        <div class="icono-menu">
            <img src='http://localhost:8000/assets/img/filter-left-custom.svg' type="img/svg" alt="abrir menu" id="icono-menu">        
        </div>

        <div class="cont-menu active" id="menu">
            <ul>
                <li><a href=''>Inicio</a></li>
                <li><a href={{route('destinos.index')}}>Destinos</a></li>
                <li><a href={{route('capacidad.index')}}>Capacidades</a></li>
                {{-- <button class="loginBtn">Login</button> --}}          
            </ul>
        </div>

    </div>
        
    </header>


    <div class="container">
        @yield('content')
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    <script>
        function youSure() {
            if (!confirm("¿Segurx que querés borrar esto?"))
                event.preventDefault();
        }
    </script>
    @bukScripts
</body>

</html>
