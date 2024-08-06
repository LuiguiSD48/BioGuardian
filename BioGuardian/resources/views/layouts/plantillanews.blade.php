<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://illustoon.com/photo/3126.png" width="50"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js'])
    <style>
        .searchable {
            display: none;
        }
        .searchable.visible {
            display: block;
        }
    </style>
</head>
<body style='background-image: url(https://wallpapers.com/images/hd/1920-x-1080-nature-desktop-27uczyqacd94zw3s.jpg)'>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo.png') }}" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Crear Publicacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/mapa') }}">Mapa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" id="searchForm">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="searchInput">
                    <button class="btn btn-primary" type="button" id="searchButton">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div id="content">
        @yield('contenido')
    </div>

    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const elements = document.querySelectorAll('.searchable');

            elements.forEach(element => {
                if (element.textContent.toLowerCase().includes(query)) {
                    element.classList.add('visible');
                } else {
                    element.classList.remove('visible');
                }
            });
        });
    </script>
</body>
</html>
