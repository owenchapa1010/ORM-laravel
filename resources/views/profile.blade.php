<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Configuración de codificación y responsividad -->
    <meta charset="utf-8"> <!-- Codificación en UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Para hacer la página responsive -->

    <!-- Título dinámico que muestra el nombre del usuario -->
    <title>{{ $user->name }}</title>

    <!-- Enlace a Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
</head>
<body>
    <!-- Contenedor principal -->
    <div class="container">
        <div class="row">
            <div class="col-12 my-3 pt-3 shadow">
                <!-- Imagen del usuario, con clases para alineación y estilo -->
                <img src="{{ $user->image->url }}" class="float-left rounded mr-2" > 
                <!-- Nombre y correo del usuario -->
                <h1 class="text-dark">{{ $user->name }}</h1> <!-- Nombre del usuario -->
                <h3 class="text-dark">{{ $user->email }}</h3> <!-- Correo del usuario -->

                <!-- Redes sociales y perfil del usuario -->
                <p class="text-dark"> 
                    <strong>Instagram</strong>: {{ $user->profile->instagram }}<br>
                    <strong>GitHub</strong>: {{ $user->profile->github }}<br>
                    <strong>Web</strong>: {{ $user->profile->web }}<br> <!-- Enlaces a sus redes -->
                </p>

                <!-- Información sobre el país y nivel del usuario -->
                <p class="text-dark">
                    <strong>País</strong>: {{ $user->location->country }}<br> <!-- Muestra el país -->
                    <strong>Nivel</strong>: 
                    @if($user->level)
                        <!-- Si el usuario tiene un nivel, lo muestra con enlace -->
                        <a href="{{route('level',$user->level->id)}}" class="text-dark"> 
                            {{ $user->level->name }}</a>
                    @else
                        <!-- Si no tiene nivel, muestra tres guiones -->
                        ---
                    @endif
                    <br>
                </p>
                <hr>

                <!-- Grupos a los que pertenece el usuario -->
                <p class="text-dark"> 
                    <strong>Grupos</strong>:
                    <!-- Bucle que recorre los grupos del usuario -->
                    @forelse ($user->groups as $group)
                        <span class="badge bg-primary text-dark">{{ $group->name }}</span> 
                    @empty
                        <!-- Si no pertenece a ningún grupo, muestra un mensaje -->
                        <em>No pertenece a algún grupo</em>
                    @endforelse
                </p>
                <hr>

                <!-- Sección de publicaciones del usuario -->
                <h3 class="text-dark">Posts</h3> 

                <div class="row">
                    <!-- Bucle que recorre las publicaciones ($posts) -->
                    @foreach ($posts as $post)
                        <div class="col-6">
                            <!-- Tarjeta para cada post -->
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <!-- Imagen del post -->
                                        <img src="{{ $post->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                          <!-- Título del post -->
                                          <h5 class="card-title text-dark">{{ $post->name }}</h5> 
                                          <!-- Categoría y número de comentarios -->
                                          <h6 class="card-subtitle text-dark"> 
                                            {{ $post->category->name }} |
                                            {{ $post->comments_count }}
                                            {{ str()->plural('comentario', $post->comments_count) }} <!-- Pluraliza 'comentario' -->
                                          </h6>
                                          <!-- Etiquetas (tags) del post -->
                                          <p class="card-text small">
                                            @foreach ($post->tags as $tag )
                                            <span class="badge bg-light text-dark"> 
                                                #{{ $tag->name }} <!-- Muestra cada etiqueta como badge -->
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

                <!-- Sección de videos del usuario -->
                <h3 class="text-dark">Videos</h3> 

                <div class="row">
                    <!-- Bucle que recorre los videos ($videos) -->
                    @foreach ($videos as $video)
                        <div class="col-6">
                            <!-- Tarjeta para cada video -->
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <!-- Imagen del video -->
                                        <img src="{{ $video->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                           <!-- Título del video -->
                                           <h5 class="card-title text-dark">{{ $video->name }}</h5> 
                                           <!-- Categoría y número de comentarios -->
                                           <h6 class="card-subtitle text-dark"> 
                                            {{ $video->category->name }} |
                                            {{ $video->comments_count }}
                                            {{ str()->plural('comentario', $video->comments_count) }} <!-- Pluraliza 'comentario' -->
                                          </h6>
                                          <!-- Etiquetas (tags) del video -->
                                          <p class="card-text small">
                                            @foreach ($video->tags as $tag )
                                            <span class="badge bg-light text-dark"> 
                                                #{{ $tag->name }} <!-- Muestra cada etiqueta como badge -->
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