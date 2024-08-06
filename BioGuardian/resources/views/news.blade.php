@extends('layouts.plantillanews')

@section('contenido')

@if(session()->has('confirmacion'))
<div class="alert alert-primary alert-dismissible fade show text-center mx-auto mt-4" style="max-width: 400px;" role="alert">
  <strong> {{ session('confirmacion') }} </strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show text-center mx-auto mt-4" style="max-width: 400px;" role="alert">
  <strong> {{ $error }} </strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif

<div class="news-container">
    <div class="news-header text-center">
        <h1>Artículos sobre el Medio Ambiente</h1>
    </div>

    @if (is_array($articles) && count($articles) > 0)
        <div class="row news-list">
            @foreach ($articles as $article)
                <div class="col-md-6 news-item">
                    <div class="news-content">
                        @if (!empty($article['urlToImage']))
                            <img src="{{ $article['urlToImage'] }}" alt="{{ $article['title'] }}" class="news-image">
                        @endif
                        <div class="news-details">
                            <h2 class="news-title">{{ $article['title'] }}</h2>
                            <p class="news-description">{{ $article['description'] }}</p>
                            <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Leer más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No se encontraron artículos.</p>
    @endif
</div>

<style>
body {
    background-image: url('https://static.vecteezy.com/system/resources/previews/025/870/841/non_2x/green-nature-on-blur-backgroud-beautiful-nature-as-spring-wallpaper-generative-ai-free-photo.jpeg');
    font-family: 'Roboto', sans-serif;
}

.navbar {
    background-color: #28a745;
}

.navbar-brand img {
    width: 46px;
    border-radius: 50%;
}

.news-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

.news-header {
    margin-bottom: 20px;
}

.news-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Space between items */
    justify-content: space-between;
}

.news-item {
    padding: 15px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%; /* Full width of its column */
    max-width: 500px; /* Set a max-width for better control */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
    display: flex;
    flex-direction: column;
}

.news-image {
    width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 10px;
}

.news-title {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 10px;
}

.news-description {
    font-size: 1rem;
    color: #555;
    margin-bottom: 10px;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-top: auto; /* Push button to the bottom of the card */
}

.btn-primary:hover {
    background-color: #0056b3;
}

.news-content {
    display: flex;
    flex-direction: column;
    height: 100%; /* Ensure it takes full height of the parent */
}

.news-details {
    display: flex;
    flex-direction: column;
}

body, html {
    padding: 0;
    margin: 0;
}

.news-container {
    max-width: 1200px; /* Limit the max width of the container */
    margin: 0 auto; /* Center the container */
}
</style>

<script src="{{ mix('js/app.js') }}"></script>

@endsection