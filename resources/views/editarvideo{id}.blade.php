@extends('layouts.app')

@section('content')
    <div class="container">


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
        @if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('admin') )


            <div>Sube tu video aqui</div><br>
            <div class="subir_video_p">
                <form method="POST" action="{{ route('editado') }}" enctype="multipart/form-data">
                    @csrf
                    <label>Nombre del video</label>
                    <input type="text" name="title" value="{{old('title',$note->title)}}">
                    <label>Descripcion</label>
                    <input type="text" name="descripcion" value="{{old('descripcion',$note->descripcion)}}">
                    <input type="hidden" name="id" value="{{old('title',$note->id)}}">
                    <input type="submit" name="subir" value="editar">
                </form>
            </div>

        @else

            <div>No puedes subir videos</div>
        @endif
    </div>

@endsection
