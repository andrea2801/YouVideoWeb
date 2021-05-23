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
    <div class="contenerdor_videos_id">
        @foreach ($videos as $video)

            <div class="video_block_id">
                <video class="video_id" controls>
                    <source src="{{asset('storage/'.$video->url)}}" type="video/mp4">
                </video>

                <a href="{{route('video.id',$video->id)}}"><h1>{{ $video->title }}</h1></a>
                <p class="nombre_user_video">{{ $video->name }}</p>
                <!-- <p>//$video->id_user->user()->name </p>-->
                <p class="fecha_subida">{{ $video->fechaSubida }}</p>
                <p class="nombre_user_video">{{ $video->descripcion }}</p>
            </div>

        @endforeach


    </div>
    <div class="videos_lateral">
        @foreach ($videos2 as $video)

            <div class="video_block">
                <video width="400" controls>
                    <source src="{{asset('storage/app/'.$video->url)}}" type="video/mp4">
                </video>

                <a href="{{route('video.id',$video->id)}}"><h1>{{ $video->title }}</h1></a>
                <p class="nombre_user_video">{{ $video->name }}</p>
                <!-- <p>//$video->id_user->user()->name </p>-->
                <p class="fecha_subida">{{ $video->fechaSubida }}</p>
            </div>

        @endforeach

    </div>





@endsection
