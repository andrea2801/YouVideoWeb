@extends('layouts.app')

@section('content')



                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if(Auth::user()->hasRole('admin'))
                            <h4 class="Bienvenida">Bienvenido <b>{{ auth()->user()->name }}</b>  </h4>
                            <a class="editar_users" href="{{ route('editarUsers') }}"> <buttom>Editar usuarios</buttom></a>
                            <a class="perfil" href="{{ route('perfil') }}"> <buttom>Perfil de usuario</buttom></a>
                            <a class="subir_videos" href="{{ route('publicar') }}"> <buttom>subir videos</buttom></a>

                        @else
                            @if(Auth::user()->hasRole('editor'))
                                <h4 class="Bienvenida">Bienvenido <b>{{ auth()->user()->name }}</b>  </h4>
                                <a class="perfil" href="{{ route('perfil') }}"> <buttom>Perfil de usuario</buttom></a>


                                <a class="subir_videos" href="{{ route('publicar') }}"> <buttom>subir videos</buttom></a>

                            @else
                                <h4 class="Bienvenida">Bienvenido <b>{{ auth()->user()->name }}</b>  </h4>
                                <a class="perfil" href="{{ route('perfil') }}"> <buttom>Perfil de usuario</buttom></a>


                            @endif
                        @endif
                        <div class="contenerdor_videos">
                            <form  class="buscar_video" method="POST" action="{{ route('buscar') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="buscar"  placeholder="Buscar">
                                <input type="submit" name="subir" value="Buscar">
                            </form>
                            <h1 class="titulo_Users">Usarios editores</h1>
                            <div class="contenedor_users">

                            @foreach ($users as $user)

                                    <a href="{{route('viewuser',$user->id)}}"> <p>{{ $user->name }}</p></a>

                            @endforeach
                            </div>
                            <h1 class="titulo_videos">Videos</h1>
                            @if (count($videos) >= 1)
                                @foreach ($videos as $video)
                                    <div class="video_block">
                                        <video width="400"  height="240" controls>
                                            <source src="{{asset('storage/'.$video->url)}}" type="video/mp4">
                                        </video>

                                       <a href="{{route('video.id',$video->id)}}"><h1>{{ $video->title }}</h1></a>
                                        <p class="nombre_user_video">{{ $video->name }}</p>
                                        <!-- <p>//$video->id_user->user()->name </p>-->
                                        <p class="fecha_subida">{{ $video->fechaSubida }}</p>
                                    </div>

                                @endforeach
                            @else
                                <p class="error_no_videos">Ningun video publicado</p>
                            @endif
                        </div>





@endsection
