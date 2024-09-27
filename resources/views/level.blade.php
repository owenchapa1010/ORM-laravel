<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Metadatos del documento HTML -->
    <meta charset="utf-8"> <!-- Establece la codificación de caracteres en UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Asegura que la página sea responsive -->

    <!-- Título de la página, muestra el nombre del nivel -->
    <title>Usuarios de {{ $level->name }}</title>

    <!-- Incluye el CSS de Bootstrap desde CDN para estilos rápidos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

    <!-- Estilos personalizados -->
    <style>
        body {
            color: black; /* Color del texto del cuerpo */
        }
        .badge {
            color: #003366; /* Color del texto dentro de las insignias */
        }
        .badge.bg-light {
            background-color: #f8f9fa; /* Color de fondo claro para las insignias */
        }
    </style>
</head>

<body>
    <!-- Contenedor principal -->
    <div class="container">
        <div class="row">
            <div class="col-12 my-3 pt-3 shadow">
               
                <!-- Título de la sección de contenido de usuarios con el nivel actual -->
                <h3>Contenido de usuarios nivel {{ $level->name }} </h3>
                <hr>
                <div class="row">
                    <!-- Bucle que recorre cada publicación ($posts) -->
                    @foreach ($posts as $post)
                        <div class="col-6"> <!-- Columna que ocupa la mitad del ancho de la fila -->
                            <div class="card mb-3"> <!-- Cada publicación se muestra en una tarjeta -->
                                <div class="row no-gutters"> <!-- Evita los márgenes entre las columnas internas -->
                                    <div class="col-md-4">
                                        <!-- Imagen de la publicación -->
                                        <img src="{{ $post->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                          <!-- Título de la publicación -->
                                          <h5 class="card-title">{{ $post->name }}</h5>
                                          <!-- Categoría de la publicación y contador de comentarios -->
                                          <h6 class="card-subtitle">
                                            {{ $post->category->name }} |
                                            {{ $post->comments_count }} 
                                            {{ str()->plural('comentario', $post->comments_count) }} <!-- Pluraliza 'comentario' -->
                                          </h6>
                                          <!-- Muestra las etiquetas (tags) de la publicación -->
                                          <p class="card-text small">
                                            @foreach ($post->tags as $tag )
                                            <span class="badge bg-light">
                                                #{{ $tag->name }} <!-- Cada etiqueta con estilo de badge -->
                                            </span>
                                            @endforeach
                                          </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sección de videos -->
                <h3>Contenido de video de usuarios nivel {{ $level->name }} </h3>
                <hr>

                <div class="row">
                    <!-- Bucle que recorre cada video ($videos) -->
                    @foreach ($videos as $video)
                        <div class="col-6"> <!-- Cada video ocupa la mitad del ancho -->
                            <div class="card mb-3"> <!-- Tarjeta para mostrar cada video -->
                                <div class="row no-gutters"> <!-- Sin márgenes entre columnas -->
                                    <div class="col-md-4">
                                        <!-- Imagen del video -->
                                        <img src="{{ $video->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                           <!-- Título del video -->
                                           <h5 class="card-title">{{ $video->name }}</h5>
                                           <!-- Categoría del video y número de comentarios -->
                                           <h6 class="card-subtitle">
                                            {{ $video->category->name }} |
                                            {{ $video->comments_count }} 
                                            {{ str()->plural('comentario', $video->comments_count) }} <!-- Pluraliza 'comentario' -->
                                          </h6>
                                          <!-- Muestra las etiquetas (tags) del video -->
                                          <p class="card-text small">
                                            @foreach ($video->tags as $tag )
                                            <span class="badge bg-light">
                                                #{{ $tag->name }} <!-- Cada etiqueta en forma de insignia -->
                                            </span>
                                            @endforeach
                                         </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>